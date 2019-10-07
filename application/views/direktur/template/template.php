<?php 

$this->load->view('direktur/template/title', $title);
$this->load->view('direktur/template/sidebar', $username, $active);
$this->load->view('direktur/template/navbar');
$this->load->view($content);
$this->load->view('direktur/template/footer');

?>