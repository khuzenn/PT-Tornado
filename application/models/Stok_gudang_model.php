<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Stok_gudang_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getAllProduk()
	{
		$this->db->from("view_stok_gudangg");

		return $this->db->get();
	}

	public function addProdukStok($data)
	{
		$this->db->trans_start();

		// Check if the product already has stock
		$this->db->select('stok');
		$this->db->from('tb_stok_gudang');
		$this->db->where('produk_id', $data['produk_id']);
		$query = $this->db->get();
		$stok_gudang = $query->row();

		if ($stok_gudang) {
			// Update existing stock
			$previous_stock_gudang = $stok_gudang->stok;
			$new_stock_gudang = $previous_stock_gudang + $data['stok'];

			$this->db->set('stok', 'stok + ' . (int)$data['stok'], FALSE);
			$this->db->where('produk_id', $data['produk_id']);
			$this->db->update('tb_stok_gudang');
		} else {
			// Insert new stock
			$previous_stock_gudang = 0;
			$new_stock_gudang = $data['stok'];

			$this->db->insert('tb_stok_gudang', $data);
		}

		if ($this->db->affected_rows() > 0) {
			$history_data_gudang = array(
				'id_produk' => $data['produk_id'],
				'change_type' => 'Stok Gudang',
				'quantity_change' => $data['stok'],
				'previous_stock' => $previous_stock_gudang,
				'new_stock' => $new_stock_gudang,
				'change_timestamp' => date('Y-m-d H:i:s')
			);
			$this->db->insert('tb_produk_history', $history_data_gudang);
		} else {
			log_message('error', 'Failed to update stock in tb_stok_gudang');
		}

		$this->db->trans_complete();

		return $this->db->trans_status() !== FALSE;
	}

	public function getAllProdukAdd()
	{
		$this->db->from("tb_produk");

		$query = $this->db->get();
   	 	return $query->result();
	}

	public function updateStokGudang($id_stok_gudang, $data)
	{
		$this->db->trans_start();

		// Retrieve the current stock before updating
		$this->db->select('stok, produk_id');
		$this->db->from('tb_stok_gudang');
		$this->db->where('id_stok_gudang', $id_stok_gudang);
		$query = $this->db->get();
		$stok_gudang = $query->row();

		if ($stok_gudang) {
			$previous_stock = $stok_gudang->stok;
			$new_stock = $data['stok'];

			// Update the stock
			$this->db->where('id_stok_gudang', $id_stok_gudang);
			$this->db->update('tb_stok_gudang', $data);

			if ($this->db->affected_rows() > 0) {
				// Log the stock change in tb_produk_history
				$history_data = array(
					'id_produk' => $stok_gudang->produk_id,
					'change_type' => 'Update Stok Gudang',
					'quantity_change' => $new_stock - $previous_stock,
					'previous_stock' => $previous_stock,
					'new_stock' => $new_stock,
					'change_timestamp' => date('Y-m-d H:i:s')
				);
				$this->db->insert('tb_produk_history', $history_data);
			} else {
				log_message('error', 'Failed to update stock in tb_stok_gudang');
			}
		} else {
			log_message('error', 'Stock not found for id_stok_gudang: ' . $id_stok_gudang);
		}

		$this->db->trans_complete();

		return $this->db->trans_status() !== FALSE;
	}

	public function getDataStokGudang($id_stok_gudang)
	{
		$this->db->where('id_stok_gudang', $id_stok_gudang);
		$this->db->from('tb_stok_gudang');
		$query = $this->db->get();

		return $query->row();
	}

	public function getAllProdukName()
	{
		$this->db->from("tb_produk");

		$query = $this->db->get();
   	 	return $query->result();
	}
}