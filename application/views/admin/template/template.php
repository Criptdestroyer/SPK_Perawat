<?php 

$this->load->view('admin/template/title', $title);
$this->load->view('admin/template/sidebar', $username, $active);
$this->load->view('admin/template/navbar');
$this->load->view($content);
$this->load->view('admin/template/footer');

?>