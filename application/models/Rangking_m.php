<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rangking_m extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'rangking';
        $this->data['primary_key'] = 'no';
    }
}

/* End of file Admin.php */
