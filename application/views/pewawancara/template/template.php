<?php 

$this->load->view('pewawancara/template/title', $title);
$this->load->view('pewawancara/template/sidebar', $username, $active);
$this->load->view('pewawancara/template/navbar');
$this->load->view($content);
$this->load->view('pewawancara/template/footer');

?>