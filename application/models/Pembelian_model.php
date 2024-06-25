<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getAllPembelian()
	{
		$this->db->from("tb_pembelian");
        $this->db->order_by('id_pembelian', 'DESC');

		return $this->db->get();
	}

    public function getPembelian($id_pembelian)
    {
        $this->db->where('id_pembelian', $id_pembelian);
        $this->db->select('*');
        $this->db->from('tb_pembelian');

        $query = $this->db->get();
        $res = $query->result();
        return $res[0];
    }

    function getDetailPembelian($id_pembelian)
    {
        $this->db->where('id_pembelian', $id_pembelian);
        $this->db->from('tb_pembelian');
        $query = $this->db->get();

        return $query->row();
    }

    public function addPembelian($data)
    {
        $this->db->insert('tb_pembelian', $data);
    }

	public function updatePembelian($data, $condition)
	{
		$this->db->where($condition);
		$this->db->update('tb_pembelian', $data);
	}

	public function deletePembelian($condition)
	{
		$this->db->where($condition);
		$this->db->delete('tb_pembelian');
	}
}
