<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getAllPesanan()
	{
		$this->db->from("view_pesanan");
		$this->db->order_by('pesanan_id', 'DESC');

		return $this->db->get();
	}

    public function getPesanan($id)
    {
        $this->db->where('id', $id);
        $this->db->select('*');
        $this->db->from('tb_pesanan');

        $query = $this->db->get();
        $res = $query->result();
        return $res[0];
    }

    function getDetailPesanan($pesanan_id)
    {
        $this->db->where('pesanan_id', $pesanan_id);
        $this->db->from('view_pesanan');
        $query = $this->db->get();

        return $query->row();
    }

    public function addPesanan($data)
	{
		$this->db->trans_start();

		$this->db->insert('tb_pesanan', $data);

		$this->db->select('stok');
		$this->db->from('tb_stok_gudang');
		$this->db->where('produk_id', $data['id_produk']);
		$query = $this->db->get();
		$stok_gudang = $query->row();

		if (!$stok_gudang) {
			error_log("Stok Gudang not found for produk_id: " . $data['id_produk']);
			return FALSE;
		}

		$previous_gudang_stock = $stok_gudang->stok;
		$new_gudang_stock = $previous_gudang_stock - $data['quantity'];

		if ($new_gudang_stock < 0) {
			error_log("Insufficient stock for produk_id: " . $data['id_produk'] . ". Current stock: " . $previous_gudang_stock . ", Required: " . $data['quantity']);
			return FALSE;
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function updatePesanan($id, $data)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('tb_pesanan', $data);

		return $query;
	}

	public function deletePesanan($condition)
	{
		$this->db->where($condition);
		$this->db->delete('tb_pesanan');
	}

    function getAllProduk()
	{
		$this->db->from('view_produk');
		$query = $this->db->get();

		return $query->result();
	}

    function getAllPelanggan()
	{
		$this->db->from('tb_pelanggan');
		$query = $this->db->get();

		return $query->result();
	}

    function getDataPesanan($id)
	{
		$this->db->where('id', $id);
		$this->db->from('tb_pesanan');
		$query = $this->db->get();

		return $query->row();
	}

	public function get_data($start_date, $end_date) {
        $this->db->where('order_date >=', $start_date);
        $this->db->where('order_date <=', $end_date);
        $query = $this->db->get('tb_pesanan');
        
        return $query->result_array();
    }

	public function get_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('tb_produk');
        return $query->row();
    }

	public function get_stok_gudang($id_produk)
    {
        $this->db->where('produk_id', $id_produk);
        $query = $this->db->get('tb_stok_gudang');
        return $query->row();
    }
}
