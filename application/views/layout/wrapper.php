<?php

if ($this->session->userdata('username') == "") {
	$this->session->set_flashdata('sukses', '<script>swal("Error","Anda harus login dahulu","error")</script>');
	redirect(base_url('auth/login'));
}

$data = $this->session->userdata('data');
if ($data['role'] == 'user') {
	$this->session->set_flashdata('sukses', '<script>swal("Error","Anda bukan admin","error")</script>');
	redirect(base_url('home'));
}



include 'header.php';
include 'nav.php';
include 'content.php';
include 'footer.php';
?>