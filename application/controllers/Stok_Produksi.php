<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_Produksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$this->data['dataUser'] = $this->session->userdata('data_ldap');

			$this->data['user_id'] = $this->tank_auth->get_user_id();
			$this->data['username'] = $this->tank_auth->get_username();
			$this->data['email'] = $this->tank_auth->get_email();

			$profile = $this->tank_auth->get_user_profile($this->data['user_id']);

			$this->data['profile_name'] = $profile['name'];
			$this->data['profile_foto'] = $profile['foto'];

			foreach ($this->tank_auth->get_roles($this->data['user_id']) as $val) {
				$this->data['role_id'] = $val['role_id'];
				$this->data['role'] = $val['role'];
				$this->data['full_name_role'] = $val['full'];
			}

			$this->data['link_active'] = 'Stok_Produksi';

			//buat permission
			if (!$this->tank_auth->permit($this->data['link_active'])) {
				redirect('Stok_Produksi');
			}

			$this->load->model("Showmenu_model");
			$this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

			$OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

			$this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

			$this->load->model("Menu_model");
			$this->load->model("Stok_produksi_model");

			$this->load->model("Dashboard_model");
			$low_stock_items = $this->Dashboard_model->getLowStockItems();
        	$this->data['low_stock_items'] = $low_stock_items;
		}
	}
 
	public function index()
	{
		$this->data['list_produk'] = $this->Stok_produksi_model->getAllProduk();

		$this->load->view('components/header', $this->data);
		$this->load->view('components/sidebar', $this->data);
		$this->load->view('components/navbar', $this->data);
		$this->load->view('stok_produk/stok_produksi', $this->data);
		$this->load->view('components/footer', $this->data);
	}
}