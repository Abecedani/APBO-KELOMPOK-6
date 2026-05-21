<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PDF Library - Versi Paling Simpel & Pasti Jalan
 */

// Kita tembak langsung path-nya pakai FCPATH (Folder Utama Proyek)
$autoload_path = FCPATH . 'vendor/autoload.php';

if (file_exists($autoload_path)) {
    require_once $autoload_path;
} else {
    // Kalau ini muncul, berarti folder vendor kamu letaknya salah atau belum ada
    die("Error: File autoload tidak ditemukan di: " . $autoload_path);
}

use Dompdf\Dompdf;

class Pdf extends Dompdf {
    public function __construct() {
        parent::__construct();
    }

    public function load_view($view, $data = array()) {
        // Matikan error PHP 8.2 biar gak ganggu render PDF
        error_reporting(0);
        ini_set('display_errors', 0);

        $ci =& get_instance();
        $html = $ci->load->view($view, $data, TRUE);
        
        $this->load_html($html);
        $this->render();
        
        // Output ke browser
        $this->stream("laporan.pdf", array("Attachment" => false));
    }
}