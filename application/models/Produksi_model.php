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

	function getAllPelanggan()
	{
		$this->db->from('tb_pelanggan');
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
        $this->db->trans_start();

        $this->db->insert('tb_produksi', $data);

        if ($this->db->affected_rows() > 0) {
            $this->db->select('stok');
            $this->db->from('tb_stok_gudang');
            $this->db->where('produk_id', $data['id_produk']);
            $query = $this->db->get();
            $stok_gudang = $query->row();

            if ($stok_gudang) {
                $previous_stock_gudang = $stok_gudang->stok;
                $new_stock_gudang = $previous_stock_gudang - $data['barang_ditaro'];

                $this->db->set('stok', 'stok - ' . (int)$data['barang_ditaro'], FALSE);
                $this->db->where('produk_id', $data['id_produk']);
                $this->db->update('tb_stok_gudang');

                if ($this->db->affected_rows() > 0) {
                    $history_data_gudang = array(
                        'id_produk' => $data['id_produk'],
                        'change_type' => 'Stok Gudang',
                        'quantity_change' => $data['barang_ditaro'],
                        'previous_stock' => $previous_stock_gudang,
                        'new_stock' => $new_stock_gudang,
                        'change_timestamp' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tb_produk_history', $history_data_gudang);
                } else {
                    log_message('error', 'Failed to update stock in tb_stok_gudang');
                }
            } else {
                $new_stock_gudang = $data['barang_ditaro'];
                $this->db->insert('tb_stok_gudang', array(
                    'produk_id' => $data['id_produk'],
                    'stok' => $new_stock_gudang
                ));
            }

            $this->db->select('stok');
            $this->db->from('tb_stok_produksi');
            $this->db->where('produk_id', $data['id_produk']);
            $query = $this->db->get();
            $stok_produksi = $query->row();

            if ($stok_produksi) {
                $previous_stock_produksi = $stok_produksi->stok;
                $new_stock_produksi = $previous_stock_produksi + $data['packing'];

                $this->db->set('stok', 'stok + ' . (int)$data['packing'], FALSE);
                $this->db->where('produk_id', $data['id_produk']);
                $this->db->update('tb_stok_produksi');

                if ($this->db->affected_rows() > 0) {
                    $history_data_produksi = array(
                        'id_produk' => $data['id_produk'],
                        'change_type' => 'Stok Produksi',
                        'quantity_change' => $data['packing'],
                        'previous_stock' => $previous_stock_produksi,
                        'new_stock' => $new_stock_produksi,
                        'change_timestamp' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tb_produk_history', $history_data_produksi);
                } else {
                    log_message('error', 'Failed to update stock in tb_stok_produksi');
                }
            } else {
                $new_stock_produksi = $data['packing'];
                $this->db->insert('tb_stok_produksi', array(
                    'produk_id' => $data['id_produk'],
                    'stok' => $new_stock_produksi
                ));
            }
        } else {
            log_message('error', 'Failed to insert data into tb_produksi');
        }

        // Complete transaction
        $this->db->trans_complete();

        // Check transaction status
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
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

	public function update_product_stock($id_produk, $quantity_change, $change_type) {
        $product = $this->get_produk($id_produk);
        $previous_stock = $product->stok;
        $new_stock = $previous_stock + $quantity_change;

        $this->db->where('id_produk', $id_produk);
        $this->db->update('tb_produk', ['stok' => $new_stock]);

        $history_data = [
            'id_produk' => $id_produk,
            'change_type' => $change_type,
            'quantity_change' => $quantity_change,
            'previous_stock' => $previous_stock,
            'new_stock' => $new_stock,
            'change_timestamp' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tb_produk_history', $history_data);
    }

    public function get_stok_gudang($id_produk)
    {
        $this->db->where('produk_id', $id_produk);
        $query = $this->db->get('tb_stok_gudang');
        return $query->row();
    }
}
