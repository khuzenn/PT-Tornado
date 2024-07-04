<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Riwayat_produk_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getAllHistory()
	{
		$this->db->select('tb_produk_history.*, tb_produk.produk as nama_produk');
        $this->db->from('tb_produk_history');
        $this->db->join('tb_produk', 'tb_produk_history.id_produk = tb_produk.id_produk', 'left');
        $this->db->order_by('tb_produk_history.id_history', 'DESC');

        return $this->db->get();
	}
}