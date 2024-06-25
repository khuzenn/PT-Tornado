<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->load->helper('rupiah');
		

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

			$this->data['link_active'] = 'Pembelian';

			//buat permission
			if (!$this->tank_auth->permit($this->data['link_active'])) {
				redirect('Pembelian');
			}

			$this->load->model("Showmenu_model");
			$this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

			$OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

			$this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

			$this->load->model("Menu_model");
            $this->load->model("Pembelian_model");
		}
	}
 
	public function index()
	{
		$this->data['title'] = 'Pembelian';

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Pembelian',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('Pembelian')
		];

        $this->data['listPembelian'] = $this->Pembelian_model->getAllPembelian();

		$this->load->view('components/header', $this->data);
		$this->load->view('components/sidebar', $this->data);
		$this->load->view('components/navbar', $this->data);
		$this->load->view('pembelian/views', $this->data);
		$this->load->view('components/footer', $this->data);
	}

    public function getDetailPembelian($id_pembelian)
    {
        $this->data['title'] = 'Pembelian';

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Pembelian',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('Pembelian')
		];

        $detail_pembelian = $this->Pembelian_model->getDetailPembelian($id_pembelian);

        $this->data['nama_barang'] = $detail_pembelian->nama_barang;
        $this->data['tanggal_pembelian'] = $detail_pembelian->tanggal_pembelian;
        $this->data['status'] = $detail_pembelian->status;
        $this->data['harga_barang'] = $detail_pembelian->harga_barang;

		$this->load->view('components/header', $this->data);
		$this->load->view('components/sidebar', $this->data);
		$this->load->view('components/navbar', $this->data);
		$this->load->view('pembelian/detail', $this->data);
		$this->load->view('components/footer', $this->data);
    }

    public function add()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('tanggal_pembelian', 'Tanggal Pembelian', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');

		if ($this->form_validation->run() == TRUE) {

			$data = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
				'status' => $this->input->post('status'),
				'harga_barang' => str_replace(['.', ','], '', $this->input->post('harga_barang'))
			);

			$this->Pembelian_model->addPembelian($data);

			redirect('Pembelian');
		} else {
			$this->data['nama_barang'] = $this->input->post('nama_barang');
			$this->data['tanggal_pembelian'] = $this->input->post('tanggal_pembelian');
			$this->data['status'] = $this->input->post('status');
			$this->data['harga_barang'] = $this->input->post('harga_barang');

			$this->data['listPembelian'] = $this->Pembelian_model->getAllPembelian();

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('Pembelian/add');
			$this->data['url'] = site_url('Pembelian');
			$this->data['title'] = "Pembelian";
	
			$this->data['breadcrumbs'] = [];
	
			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Pembelian / ',
				'class' => 'breadcrumb-item pe-3',
				'href' => ''
			];
	
			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Tambah Pembelian',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('Pembelian/add')
			];

			$this->load->view('components/header', $this->data);
			$this->load->view('components/sidebar', $this->data);
			$this->load->view('components/navbar', $this->data);
			$this->load->view('pembelian/form', $this->data);
			$this->load->view('components/footer');
		}
	}

	public function update($id_pembelian)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('tanggal_pembelian', 'Tanggal Pembelian', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
				'status' => $this->input->post('status'),
				'harga_barang' => str_replace(['.', ','], '', $this->input->post('harga_barang'))
			);
			$condition['id_pembelian'] = $id_pembelian;

			$this->Pembelian_model->updatePembelian($data, $condition);

			redirect('Pembelian');
		} else {
			$this->data['nama_barang'] = $this->input->post('nama_barang');
			$this->data['tanggal_pembelian'] = $this->input->post('tanggal_pembelian');
			$this->data['status'] = $this->input->post('status');
			$this->data['harga_barang'] = $this->input->post('harga_barang');

			$this->data['listPembelian'] = $this->Pembelian_model->getAllPembelian();

			$pembelian = $this->Pembelian_model->getPembelian($id_pembelian);

			$this->data['nama_barang'] = $pembelian->nama_barang;
			$this->data['tanggal_pembelian'] = $pembelian->tanggal_pembelian;
			$this->data['status'] = $pembelian->status;
			$this->data['harga_barang'] = $pembelian->harga_barang;

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('Pembelian/update/' . $id_pembelian);
			$this->data['url'] = site_url('Pembelian');
			$this->data['title'] = "Pembelian";
	
			$this->data['breadcrumbs'] = [];
	
			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Pembelian / ',
				'class' => 'breadcrumb-item pe-3',
				'href' => ''
			];
	
			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Edit Pembelian',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('Pembelian')
			];

			$this->load->view('components/header', $this->data);
			$this->load->view('components/sidebar', $this->data);
			$this->load->view('components/navbar', $this->data);
			$this->load->view('pembelian/edit', $this->data);
			$this->load->view('components/footer', $this->data);
		}
	}

	public function delete($id_pembelian)
	{
		$condition['id_pembelian'] = $id_pembelian;

		$this->Pembelian_model->deletePembelian($condition);

		redirect('Pembelian');
	}
}
