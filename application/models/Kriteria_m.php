<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_m extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'kriteria';
        $this->data['primary_key'] = 'id';
    }
}

/* End of file Admin.php */
