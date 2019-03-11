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

        protected function template($data, $module = '')
        {
            $data['global_title'] = $this->title;
            $data['module'] = $module;
            if(strlen($module)>0) return $this->load->view($module.'/includes/layout',$data);
            return $this->load->view('includes/layout',$data);
        }

        protected function POST($name)
        {
            return $this->input->post($name);
        }
    }
?>