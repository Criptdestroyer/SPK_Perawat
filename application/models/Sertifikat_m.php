<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat_m extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'sertifikat';
        $this->data['primary_key'] = 'id_sertifikat';
    }
}

/* End of file Admin.php */
