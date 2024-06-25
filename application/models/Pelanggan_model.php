<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getAllPelanggan()
	{
		$this->db->from("tb_pelanggan");
        $this->db->order_by('id_pelanggan', 'DESC'); 

		return $this->db->get();
	}

    public function getPelanggan($id_pelanggan)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->select('*');
        $this->db->from('tb_pelanggan');

        $query = $this->db->get();
        $res = $query->result();
        return $res[0];
    }

    function getDetailPelanggan($id_pelanggan)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->from('view_pelanggan');
        $query = $this->db->get();

        return $query->row();
    }

    public function addPelanggan($data)
    {
        $this->db->insert('tb_pelanggan', $data);
    }

	public function updatePelanggan($data, $condition)
	{
		$this->db->where($condition);
		$this->db->update('tb_pelanggan', $data);
	}

	public function deletePelanggan($condition)
	{
		$this->db->where($condition);
		$this->db->delete('tb_pelanggan');
	}
}
