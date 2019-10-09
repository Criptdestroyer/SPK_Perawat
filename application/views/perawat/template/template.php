<?php 

$this->load->view('perawat/template/title', $title);
$this->load->view('perawat/template/sidebar', $username, $active);
$this->load->view('perawat/template/navbar');
$this->load->view($content);
$this->load->view('perawat/template/footer');

?>