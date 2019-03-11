<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    /*
    * author Ahmad Emir Alfatah
    */

    class MY_Controller extends CI_Controller
    {
        public $title = '';

        public function __construct()
        {
            parent::__construct();
            // $this->load->library('lib_log');
            date_default_timezone_set("Asia/Jakarta");
        }
    }
?>