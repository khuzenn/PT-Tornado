<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_Gudang extends CI_Controller
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

			$this->data['link_active'] = 'Stok_Gudang';

			//buat permission
			if (!$this->tank_auth->permit($this->data['link_active'])) {
				redirect('Stok_Gudang');
			}

			$this->load->model("Showmenu_model");
			$this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

			$OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

			$this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

			$this->load->model("Menu_model");
            $this->load->model("Stok_gudang_model");

			$this->load->model("Dashboard_model");
			$low_stock_items = $this->Dashboard_model->getLowStockItems();
        	$this->data['low_stock_items'] = $low_stock_items;
		}
	}
 
	public function index()
	{
        $this->data['list_produk'] = $this->Stok_gudang_model->getAllProduk();

		$this->load->view('components/header', $this->data);
		$this->load->view('components/sidebar', $this->data);
		$this->load->view('components/navbar', $this->data);
		$this->load->view('stok_produk/stok_gudang', $this->data);
		$this->load->view('components/footer', $this->data);
	}

	public function addStok()
	{
        $this->form_validation->set_rules('produk', 'Produk', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

		if($this->form_validation->run() == TRUE) {
			$data = array(
                'produk_id' => decrypt_url($this->input->post('produk')),
                'stok' => $this->input->post('stok')
            );

            $this->Stok_gudang_model->addProdukStok($data);

            redirect('Stok_Gudang');
		} else {
			$this->data['selected_produk'] = $this->input->post('produk');
            $this->data['stok'] = $this->input->post('stok');

            $this->data['listProduk'] = $this->Stok_gudang_model->getAllProdukAdd();

            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['action'] = site_url('Stok_Gudang/addStok');
            $this->data['url'] = site_url('Stok_Gudang');
            $this->data['title'] = "Stok Gudang";

			$this->load->view('components/header', $this->data);
            $this->load->view('components/sidebar', $this->data);
            $this->load->view('components/navbar', $this->data);
            $this->load->view('stok_produk/add_stok_gudang', $this->data);
            $this->load->view('components/footer');
		}
	}

	public function editStok($id_stok_gudang)
	{
		$this->form_validation->set_rules('produk', 'Produk', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

		if ($this->form_validation->run() == TRUE) {
			$value_stok_gudang_update = $this->Stok_gudang_model->getDataStokGudang($id_stok_gudang);

			$data = array(
				'produk_id' => decrypt_url($this->input->post('produk')),
				'stok' => $this->input->post('stok')
			);

			$result = $this->Stok_gudang_model->updateStokGudang($id_stok_gudang, $data);

			if ($result) {
				$this->session->set_flashdata('message', 'Berhasil Edit Stok Gudang');

				redirect('Stok_Gudang');
			} else {
				$this->session->set_flashdata('message', 'Gagal Edit Stok Gudang');

				redirect('Stok_Gudang/editStok');
			}
		} else {
			$this->data['selected_produk'] = $this->input->post('produk');
			$this->data['stok'] = $this->input->post('stok');

			$this->data['list_produk_name'] = $this->Stok_gudang_model->getAllProdukName();

			$value_stok_gudang = $this->Stok_gudang_model->getDataStokGudang($id_stok_gudang);

			$this->data['id_stok_gudang'] = $id_stok_gudang;
			$this->data['selected_produk'] = $value_stok_gudang->produk_id;
			$this->data['stok'] = $value_stok_gudang->stok;

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('Stok_Gudang/editStok/' . $id_stok_gudang);
			$this->data['url'] = site_url('Stok_Gudang');
			$this->data['title'] = "Stok Gudang";

			$this->load->view('components/header', $this->data);
			$this->load->view('components/sidebar', $this->data);
			$this->load->view('components/navbar', $this->data);
			$this->load->view('stok_produk/edit_stok_gudang', $this->data);
			$this->load->view('components/footer');
		}
	}
}