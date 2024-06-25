<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
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

			$this->data['link_active'] = 'Pelanggan';

			//buat permission
			if (!$this->tank_auth->permit($this->data['link_active'])) {
				redirect('Pelanggan');
			}

			$this->load->model("Showmenu_model");
			$this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

			$OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

			$this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

			$this->load->model("Menu_model");
            $this->load->model("Pelanggan_model");
		}
	}
 
	public function index()
	{
		$this->data['title'] = 'Pelanggan';

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Pelanggan',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('Pelanggan')
		];

        $this->data['listPelanggan'] = $this->Pelanggan_model->getAllPelanggan(); 

		$this->load->view('components/header', $this->data);
		$this->load->view('components/sidebar', $this->data);
		$this->load->view('components/navbar', $this->data);
		$this->load->view('pelanggan/views', $this->data);
		$this->load->view('components/footer', $this->data);
	}

    public function getDetailPelanggan($id_pelanggan)
    {
        $this->data['title'] = 'Pelanggan';

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Pelanggan',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('Pelanggan')
		];

        $detail_pelanggan = $this->Pelanggan_model->getDetailPelanggan($id_pelanggan);

        $this->data['name'] = $detail_pelanggan->name;
        $this->data['address'] = $detail_pelanggan->address;
        $this->data['phone'] = $detail_pelanggan->phone;
        $this->data['order_date'] = $detail_pelanggan->order_date;
        $this->data['status'] = $detail_pelanggan->status;
        $this->data['quantity'] = $detail_pelanggan->quantity;

		$this->load->view('components/header', $this->data);
		$this->load->view('components/sidebar', $this->data);
		$this->load->view('components/navbar', $this->data);
		$this->load->view('pelanggan/detail', $this->data);
		$this->load->view('components/footer', $this->data);
    }

    public function add()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('phone', 'No HP', 'required');

		if ($this->form_validation->run() == TRUE) {

			$data = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone')
			);

			$this->Pelanggan_model->addPelanggan($data);

			redirect('Pelanggan');
		} else {
			$this->data['name'] = $this->input->post('name');
			$this->data['address'] = $this->input->post('address');
			$this->data['phone'] = $this->input->post('phone');

			$this->data['listPelanggan'] = $this->Pelanggan_model->getAllPelanggan();

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('Pelanggan/add');
			$this->data['url'] = site_url('Pelanggan');
			$this->data['title'] = "Pelanggan";
	
			$this->data['breadcrumbs'] = [];
	
			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Pelanggan / ',
				'class' => 'breadcrumb-item pe-3',
				'href' => ''
			];
	
			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Tambah Pelanggan',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('Pelanggan/add')
			];

			$this->load->view('components/header', $this->data);
			$this->load->view('components/sidebar', $this->data);
			$this->load->view('components/navbar', $this->data);
			$this->load->view('pelanggan/form', $this->data);
			$this->load->view('components/footer');
		}
	}

	public function update($id_pelanggan)
	{
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('phone', 'No HP', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone')
			);
			$condition['id_pelanggan'] = $id_pelanggan;

			$this->Pelanggan_model->updatePelanggan($data, $condition);

			redirect('Pelanggan');
		} else {
			$this->data['name'] = $this->input->post('name');
			$this->data['address'] = $this->input->post('address');
			$this->data['phone'] = $this->input->post('phone');

			$this->data['listPelanggan'] = $this->Pelanggan_model->getAllPelanggan();

			$pelanggan = $this->Pelanggan_model->getPelanggan($id_pelanggan);

			$this->data['name'] = $pelanggan->name;
			$this->data['address'] = $pelanggan->address;
			$this->data['phone'] = $pelanggan->phone;

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('Pelanggan/update/' . $id_pelanggan);
			$this->data['url'] = site_url('Pelanggan');
			$this->data['title'] = "Pelanggan";
	
			$this->data['breadcrumbs'] = [];
	
			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Pelanggan / ',
				'class' => 'breadcrumb-item pe-3',
				'href' => ''
			];
	
			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Edit Pelanggan',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('Pelanggan')
			];

			$this->load->view('components/header', $this->data);
			$this->load->view('components/sidebar', $this->data);
			$this->load->view('components/navbar', $this->data);
			$this->load->view('pelanggan/edit', $this->data);
			$this->load->view('components/footer', $this->data);
		}
	}

	public function delete($id_pelanggan)
	{
		$condition['id_pelanggan'] = $id_pelanggan;

		$this->Pelanggan_model->deletePelanggan($condition);

		redirect('Pelanggan');
	}
}
