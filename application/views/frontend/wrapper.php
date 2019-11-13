<?php 

if ($this->session->userdata('username') != "") {
	$data = $this->session->userdata('data');
	if ($data['role'] == 'admin') {
		$this->session->set_flashdata('sukses', '<script>swal("Error","Anda bukan user","error")</script>');
		redirect(base_url('user'));
	}
}



require_once 'header.php';
require_once 'nav.php';
require_once 'content.php';
require_once 'footer.php';

?>