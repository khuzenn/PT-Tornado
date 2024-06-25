<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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

			$this->data['link_active'] = 'Pesanan';

			//buat permission
			if (!$this->tank_auth->permit($this->data['link_active'])) {
				redirect('Pesanan');
			}

			$this->load->model("Showmenu_model");
			$this->data['ShowMenu'] = $this->Showmenu_model->getShowMenu();

			$OpenShowMenu = $this->Showmenu_model->getOpenShowMenu($this->data);

			$this->data['openMenu'] = $this->Showmenu_model->getDataOpenMenu($OpenShowMenu->id_menu_parent);

			$this->load->model("Menu_model");
            $this->load->model("Pesanan_model");
            $this->load->helper("rupiah");
		}
	}
 
	public function index()
	{
		$this->data['title'] = 'Pesanan';

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Pesanan',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('Pesanan')
		];

        $this->data['listPesanan'] = $this->Pesanan_model->getAllPesanan();

		$this->load->view('components/header', $this->data);
		$this->load->view('components/sidebar', $this->data);
		$this->load->view('components/navbar', $this->data);
		$this->load->view('pesanan/views', $this->data);
		$this->load->view('components/footer', $this->data);
	}

    public function getDetailPesanan($pesanan_id)
    {
        $this->data['title'] = 'Pesanan';

		$this->data['breadcrumbs'] = [];

		$this->data['breadcrumbs'][] = [
			'active' => FALSE,
			'text' => 'Pesanan',
			'class' => 'breadcrumb-item pe-3 text-gray-400',
			'href' => site_url('Pesanan')
		];

        $detail_pesanan = $this->Pesanan_model->getDetailPesanan($pesanan_id);

        $this->data['nama_pelanggan'] = $detail_pesanan->nama_pelanggan;
        $this->data['produk'] = $detail_pesanan->produk;
        $this->data['quantity'] = $detail_pesanan->quantity;
        $this->data['sell_price'] = $detail_pesanan->sell_price;
        $this->data['sell_price_total'] = $detail_pesanan->sell_price_total;
        $this->data['paid'] = $detail_pesanan->paid;
        $this->data['unpaid'] = $detail_pesanan->unpaid;
        $this->data['status'] = $detail_pesanan->status;
        $this->data['order_date'] = $detail_pesanan->order_date;
        $this->data['note'] = $detail_pesanan->note;

		$this->data['list_produk'] = $this->Pesanan_model->getAllProduk();
		$this->data['list_pelanggan'] = $this->Pesanan_model->getAllPelanggan();

		$this->load->view('components/header', $this->data);
		$this->load->view('components/sidebar', $this->data);
		$this->load->view('components/navbar', $this->data);
		$this->load->view('pesanan/detail', $this->data);
		$this->load->view('components/footer', $this->data);
    }

    public function add()
	{ 
		$this->form_validation->set_rules('name', 'Pelanggan', 'required');
		$this->form_validation->set_rules('produk', 'Produk', 'required');
		$this->form_validation->set_rules('quantity', 'Jumlah', 'required');
		$this->form_validation->set_rules('sell_price', 'Harga', 'required');
		$this->form_validation->set_rules('paid', 'Sudah Dibayar', 'required');
		$this->form_validation->set_rules('sell_price_total', 'Total Harga');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('note', 'Catatan', 'required');

		if ($this->form_validation->run() == TRUE) {

			// Hitung total harga
			$sell_price_total = $this->input->post('quantity') * $this->input->post('sell_price');

			// Hitung unpaid
			$unpaid = $sell_price_total - $this->input->post('paid');

			$data = array(
				'id_pelanggan' => decrypt_url($this->input->post('name')),
				'id_produk' => decrypt_url($this->input->post('produk')),
				'quantity' => $this->input->post('quantity'),
				'sell_price' => $this->input->post('sell_price'),
				'paid' => $this->input->post('paid'),
				'sell_price_total' => str_replace(['.', ','], '', $this->input->post('sell_price_total')),
				'status' => $this->input->post('status'),
				'note' => $this->input->post('note'),
				'unpaid' => $unpaid
			);

			$this->Pesanan_model->addPesanan($data);
			
			redirect('Pesanan');
		} else {
			$this->data['selected_pelanggan'] = $this->input->post('name');
			$this->data['selected_produk'] = $this->input->post('produk');
			$this->data['quantity'] = $this->input->post('quantity');
			$this->data['sell_price'] = $this->input->post('sell_price');
			$this->data['paid'] = $this->input->post('paid');
			$this->data['sell_price_total'] = $this->input->post('sell_price_total');
			$this->data['status'] = $this->input->post('status');
			$this->data['note'] = $this->input->post('note');

			$this->data['listPesanan'] = $this->Pesanan_model->getAllPesanan();
			$this->data['list_produk'] = $this->Pesanan_model->getAllProduk();
			$this->data['list_pelanggan'] = $this->Pesanan_model->getAllPelanggan(); 

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('Pesanan/add');
			$this->data['url'] = site_url('Pesanan');
			$this->data['title'] = "Pesanan";
	
			$this->data['breadcrumbs'] = [];
	
			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Pesanan / ',
				'class' => 'breadcrumb-item pe-3',
				'href' => ''
			];
	
			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Tambah Pesanan',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('Pesanan/add')
			];

			$this->load->view('components/header', $this->data);
			$this->load->view('components/sidebar', $this->data);
			$this->load->view('components/navbar', $this->data);
			$this->load->view('pesanan/form', $this->data);
			$this->load->view('components/footer', $this->data);
		}
	}

	public function update($id)
	{
		$this->form_validation->set_rules('name', 'Pelanggan', 'required');
		$this->form_validation->set_rules('produk', 'Produk', 'required');
		$this->form_validation->set_rules('quantity', 'Jumlah', 'required');
		$this->form_validation->set_rules('sell_price', 'Harga', 'required');
		$this->form_validation->set_rules('paid', 'Sudah Dibayar', 'required');
		$this->form_validation->set_rules('sell_price_total', 'Total Harga');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('note', 'Catatan', 'required');

		if ($this->form_validation->run() == TRUE) {

			// Hitung total harga
			$sell_price_total = $this->input->post('quantity') * $this->input->post('sell_price');

			// Hitung unpaid
			$unpaid = $sell_price_total - $this->input->post('paid');

			$data = array(
				'id_pelanggan' => decrypt_url($this->input->post('name')),
				'id_produk' => decrypt_url($this->input->post('produk')),
				'quantity' => $this->input->post('quantity'),
				'sell_price' => $this->input->post('sell_price'),
				'paid' => $this->input->post('paid'),
				'sell_price_total' => str_replace(['.', ','], '', $this->input->post('sell_price_total')),
				'status' => $this->input->post('status'),
				'note' => $this->input->post('note'),
				'unpaid' => $unpaid
			);

			$result = $this->Pesanan_model->updatePesanan($id, $data);

			if ($result) {
				$this->session->set_flashdata('msg', 'Anda berhasil menyunting data produk');

				redirect('pesanan');
			}
		} else {
			$this->data['selected_pelanggan'] = $this->input->post('id_pelanggan');
			$this->data['selected_produk'] = $this->input->post('id_produk');
			$this->data['quantity'] = $this->input->post('quantity');
			$this->data['sell_price'] = $this->input->post('sell_price');
			$this->data['paid'] = $this->input->post('paid');
			$this->data['sell_price_total'] = $this->input->post('sell_price_total');
			$this->data['status'] = $this->input->post('status');
			$this->data['note'] = $this->input->post('note');

			$this->data['listPesanan'] = $this->Pesanan_model->getAllPesanan();
			$this->data['list_produk'] = $this->Pesanan_model->getAllProduk();
			$this->data['list_pelanggan'] = $this->Pesanan_model->getAllPelanggan();

			$value_pesanan = $this->Pesanan_model->getDataPesanan($id);

			$this->data['id'] = $id;
			$this->data['selected_pelanggan'] = $value_pesanan->id_pelanggan;
			$this->data['selected_produk'] = $value_pesanan->id_produk;
			$this->data['quantity'] = $value_pesanan->quantity;
			$this->data['sell_price'] = $value_pesanan->sell_price;
			$this->data['paid'] = $value_pesanan->paid;
			$this->data['sell_price_total'] = $value_pesanan->sell_price_total;
			$this->data['status'] = $value_pesanan->status;
			$this->data['note'] = $value_pesanan->note;

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('pesanan/update/' . $id);
			$this->data['url'] = site_url('pesanan');
			$this->data['title'] = "Pesanan";

			$this->data['breadcrumbs'] = [];

			$this->data['breadcrumbs'][] = [
				'active' => FALSE,
				'text' => 'Pesanan / ',
				'class' => 'breadcrumb-item pe-3',
				'href' => ''
			];

			$this->data['breadcrumbs'][] = [
				'active' => TRUE,
				'text' => 'Edit Pesanan',
				'class' => 'breadcrumb-item pe-3 text-gray-400',
				'href' => site_url('pesanan')
			];

			$this->load->view('components/header', $this->data);
			$this->load->view('components/sidebar', $this->data);
			$this->load->view('components/navbar', $this->data);
			$this->load->view('pesanan/edit', $this->data);
			$this->load->view('components/footer');
		}
	}

	public function delete($id)
	{
		$condition['id'] = $id;

		$this->Pesanan_model->deletePesanan($condition);

		redirect('Pesanan');
	}

	public function fetch_data() {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        
        $data['result'] = $this->pegawai_model->get_data($start_date, $end_date);
        
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}