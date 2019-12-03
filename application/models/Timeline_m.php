<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline_m extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'timeline';
        $this->data['primary_key'] = 'id';
    }
}

/* End of file Admin.php */
