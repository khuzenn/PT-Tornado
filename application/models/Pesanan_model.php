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
        $this->db->insert('tb_pesanan', $data);
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
}
