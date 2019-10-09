<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawat_m extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'perawat';
        $this->data['primary_key'] = 'id_perawat';
    }
}

/* End of file Admin.php */
