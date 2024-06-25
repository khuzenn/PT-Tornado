<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produksi_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getAllProduksi()
	{
		$this->db->from("view_produksi");
		$this->db->order_by('id_produksi', 'DESC');

		return $this->db->get();
	}

	function getAllPegawai()
	{
		$this->db->from('user_profiles');
		$query = $this->db->get();

		return $query->result();
	}

	function getAllProduk()
	{
		$this->db->from('view_produk');
		$query = $this->db->get();

		return $query->result();
	}

    public function getProduksi($id_produksi)
    {
        $this->db->where('id_produksi', $id_produksi);
        $this->db->select('*');
        $this->db->from('tb_produksi');

        $query = $this->db->get();
        $res = $query->result();
        return $res[0];
    }

	function getDataProduksi($id_produksi)
	{
		$this->db->where('id_produksi', $id_produksi);
		$this->db->from('view_produksi');
		$query = $this->db->get();

		return $query->row();
	}

    public function addProduksi($data)
    {
        $this->db->insert('tb_produksi', $data);
    }

	public function updateProduksi($data, $condition)
	{
		$this->db->where($condition);
		$this->db->update('tb_produksi', $data);
	}

	public function deleteProduksi($condition)
	{
		$this->db->where($condition);
		$this->db->delete('tb_produksi');
	}
}
