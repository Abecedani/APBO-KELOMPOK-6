<?php
class Shop_info {
    protected $ci;
    private $get_info;

    function __construct() {
        $this->ci =& get_instance();
        $auth = $this->ci->session->userdata('auth');
        
        // 2. Cek apakah user sudah login dan punya branch_id
        if (!empty($auth['branch_id'])) {
            $branch_id = $auth['branch_id'];
            // Ambil data cabang sesuai user yang login
            $this->get_info = $this->ci->db->get_where("branches", ["id" => $branch_id])->row();
        } else {
            // 3. Fallback: Kalau belum login (misal di halaman depan/login), 
            // ambil data cabang pertama saja sebagai default
            $this->get_info = $this->ci->db->get("branches")->row();
        }

        // 4. Pengaman darurat kalau tabel branches kosong biar web nggak blank
        if (!$this->get_info) {
            $this->get_info = (object) [
                'name' => 'BENGKEL LAS PAK ZAKI',
                'address' => 'Mataram, Lombok'
            ];
        }
    }

    function get_shop_name() {
        return $this->get_info->name ?? 'Bengkel Las';
    }
    
    function get_shop_address() {
        return $this->get_info->address ?? 'Alamat Default';
    }
}