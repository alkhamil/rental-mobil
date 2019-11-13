<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        $user = $this->db->get('users')->result_array();
        $data = [
            'title' => 'Halaman User',
            'isi'   => 'user/list',
            'user'  => $user
        ];
        $this->load->view('layout/wrapper', $data);
        
    }

    public function approve($id)
    {
        $data = [
            'id'        => $id,
            'role'      => 'admin'
        ];
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        $this->db->affected_rows();
        $this->session->set_flashdata('sukses', '<script>swal("Success","Approve berhasil","success")</script>');
        redirect(base_url('user'), 'refresh');
    }

}
