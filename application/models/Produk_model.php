<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produk_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getAllProduk()
	{
		$this->db->from("tb_produk");

		return $this->db->get();
	}

    public function getProduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->select('*');
        $this->db->from('tb_produk');

        $query = $this->db->get();
        $res = $query->result();
        return $res[0];
    }

    function getAllKategoriProduk()
	{
		$this->db->from('tb_kategori_produk');
		$query = $this->db->get();

		return $query->result();
	}

    function getDataProduk($id_produk)
	{
		$this->db->where('id_produk', $id_produk);
		$this->db->from('view_produk');
		$query = $this->db->get();

		return $query->row();
	}

    function addProduk($data)
	{
		$this->db->insert('tb_produk', $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	function updateProduk($id_produk, $data)
	{
		$this->db->where('id_produk', $id_produk);
		$query = $this->db->update('tb_produk', $data);

		return $query;
	}

	public function deleteProduk($condition)
	{
		$this->db->where($condition);
		$this->db->delete('tb_produk');
	}
}
