<?php
class Shop_info {
    protected $ci;
    private $get_info;

    function __construct() {
        $this->ci =& get_instance();
        $auth = $this->ci->session->userdata('auth');
        
        if (!empty($auth['branch_id'])) {
            $branch_id = $auth['branch_id'];
            $this->get_info = $this->ci->db->get_where("branches", ["id" => $branch_id])->row();
        } else {
            $this->get_info = $this->ci->db->get("branches")->row();
        }
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