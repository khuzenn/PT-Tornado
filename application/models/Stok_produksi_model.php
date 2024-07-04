<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Stok_produksi_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getAllProduk()
	{
		$this->db->select('tb_produk.*, IFNULL(tb_stok_produksi.stok, 0) as stok');
		$this->db->from("tb_produk");
		$this->db->join('tb_stok_produksi', 'tb_produk.id_produk = tb_stok_produksi.produk_id', 'left');

		return $this->db->get();
	}
}