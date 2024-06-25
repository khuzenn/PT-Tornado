<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_Produk extends CI_Controller
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

			$this->data['link_active'] = 'Kategori_Produk';

			//buat permission
			if (!$this->tank_auth->permit($this->data['link_active'])) {
				redirect('Kategori_Produk');
			}

			$this->load->model("Showmenu_model");
			$this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

			$OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

			$this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

			$this->load->model("Menu_model");
            $this->load->model("Kategori_produk_model");
		}
	}
 
	public function index()
	{
		$this->data['title'] = 'Kategori Produk';

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Kategori Produk',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('Kategori_Produk')
		];

        $this->data['listKategori'] = $this->Kategori_produk_model->getAllKategori();

		$this->load->view('components/header', $this->data);
		$this->load->view('components/sidebar', $this->data);
		$this->load->view('components/navbar', $this->data);
		$this->load->view('kategori_produk/views', $this->data);
		$this->load->view('components/footer', $this->data);
	}

    public function add()
	{
		$this->form_validation->set_rules('kategori_produk', 'Kategori Produk', 'required');

		if ($this->form_validation->run() == TRUE) {

			$data = array(
				'kategori_produk' => $this->input->post('kategori_produk')
			);

			$this->Kategori_produk_model->addKategori($data);

			redirect('Kategori_Produk');
		} else {
			$this->data['kategori_produk'] = $this->input->post('kategori_produk');

			$this->data['listKategori'] = $this->Kategori_produk_model->getAllKategori();

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('Kategori_Produk/add');
			$this->data['url'] = site_url('Kategori_Produk');
			$this->data['title'] = "Kategori Produk";
	
			$this->data['breadcrumbs'] = [];
	
			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Kategori Produk / ',
				'class' => 'breadcrumb-item pe-3',
				'href' => ''
			];
	
			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Tambah Kategori Produk',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('Kategori_Produk/add')
			];

			$this->load->view('components/header', $this->data);
			$this->load->view('components/sidebar', $this->data);
			$this->load->view('components/navbar', $this->data);
			$this->load->view('kategori_produk/form', $this->data);
			$this->load->view('components/footer');
		}
	}

	public function update($id_kategori_produk)
	{
		$this->form_validation->set_rules('kategori_produk', 'Kategori Produk', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'kategori_produk' => $this->input->post('kategori_produk'),
			);
			$condition['id_kategori_produk'] = $id_kategori_produk;

			$this->Kategori_produk_model->updateKategori($data, $condition);

			redirect('Kategori_Produk');
		} else {
			$this->data['kategori_produk'] = $this->input->post('kategori_produk');

			$this->data['listKategori'] = $this->Kategori_produk_model->getAllKategori();

			$kategori = $this->Kategori_produk_model->getKategori($id_kategori_produk);

			$this->data['kategori_produk'] = $kategori->kategori_produk;

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('Kategori_Produk/update/' . $id_kategori_produk);
			$this->data['url'] = site_url('Kategori_Produk');
			$this->data['title'] = "Kategori Produk";
	
			$this->data['breadcrumbs'] = [];
	
			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Kategori Produk / ',
				'class' => 'breadcrumb-item pe-3',
				'href' => ''
			];
	
			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Edit Kategori Produk',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('Kategori_Produk')
			];

			$this->load->view('components/header', $this->data);
			$this->load->view('components/sidebar', $this->data);
			$this->load->view('components/navbar', $this->data);
			$this->load->view('kategori_produk/edit', $this->data);
			$this->load->view('components/footer', $this->data);
		}
	}

	public function delete($id_kategori_produk)
	{
		$condition['id_kategori_produk'] = $id_kategori_produk;

		$this->Kategori_produk_model->deleteKategori($condition);

		redirect('Kategori_Produk');
	}
}
