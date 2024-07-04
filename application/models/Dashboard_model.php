<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    public function getAllPendapatan()
    {
        $query = $this->db->select_sum('sell_price_total')->get('tb_pesanan');
        return $query->row()->sell_price_total;
    }

    public function getAllPiutang()
    {
        $query = $this->db->select_sum('unpaid')->get('tb_pesanan');
        return $query->row()->unpaid;
    }

    public function getAllHutang() {
        $this->db->select_sum('harga_barang');
        $this->db->where_not_in('status', ['paid']);
        $query = $this->db->get('tb_pembelian');
        return $query->row()->harga_barang;
    }

    public function getAllPesanan() {
        $this->db->from('tb_pesanan');
        return $this->db->count_all_results();
    }

    public function getMonthlySales() {
        $query = $this->db->query("
            SELECT 
                DATE_FORMAT(order_date, '%b') as month, 
                SUM(sell_price_total) as total_sales 
            FROM view_pesanan 
            GROUP BY month 
            ORDER BY MONTH(order_date)
        ");
    
        $result = $query->result();
    
        $months = [
            'Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0,
            'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0
        ];
    
        foreach ($result as $row) {
            $months[$row->month] = $row->total_sales;
        }
    
        $labels = array_keys($months);
        $data = array_values($months);
    
        return ['labels' => $labels, 'data' => $data];
    }    

    public function getMonthlyHutang() {
        $query = $this->db->query("
            SELECT 
                DATE_FORMAT(tanggal_pembelian, '%b') as month, 
                SUM(harga_barang) as total_unpaid 
            FROM tb_pembelian
            WHERE status NOT IN ('paid')
            GROUP BY DATE_FORMAT(tanggal_pembelian, '%b') 
            ORDER BY MONTH(tanggal_pembelian)
        ");
    
        $result = $query->result();
    
        $months = [
            'Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0,
            'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0
        ];
    
        foreach ($result as $row) {
            $months[$row->month] = $row->total_unpaid;
        }
    
        $labels = array_keys($months);
        $data = array_values($months);
    
        return ['labels' => $labels, 'data' => $data];
    }    

    public function getMonthlyPiutang() {
        $query = $this->db->query("
            SELECT 
                DATE_FORMAT(order_date, '%b') as month, 
                SUM(paid) as total_paid 
            FROM view_pesanan 
            GROUP BY month 
            ORDER BY MONTH(order_date)
        ");
    
        $result = $query->result();
    
        $months = [
            'Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0,
            'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0
        ];
    
        foreach ($result as $row) {
            $months[$row->month] = $row->total_paid;
        }
    
        $labels = array_keys($months);
        $data = array_values($months);
    
        return ['labels' => $labels, 'data' => $data];
    }

    public function getMonthlyPesanan() {
        $query = $this->db->query("
            SELECT 
                DATE_FORMAT(order_date, '%b') as month, 
                COUNT(*) as total_orders
            FROM view_pesanan 
            GROUP BY month 
            ORDER BY MONTH(order_date)
        ");
    
        $result = $query->result();
    
        $months = [
            'Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0,
            'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0
        ];

        foreach ($result as $row) {
            $months[$row->month] = $row->total_orders;
        }
    
        $labels = array_keys($months);
        $data = array_values($months);
    
        return ['labels' => $labels, 'data' => $data];
    }
    
    public function getLowStockItems($threshold = 500)
    {
        $this->db->select('p.produk, s.stok');
        $this->db->from('tb_produk p');
        $this->db->join('tb_stok_gudang s', 'p.id_produk = s.produk_id', 'left');
        $this->db->where('s.stok <=', $threshold);
        $query = $this->db->get();
        
        return $query->result();
    }
}
