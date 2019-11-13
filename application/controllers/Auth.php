<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function login()
	{
		$valid = $this->form_validation;
		$valid->set_rules(
			'username',
			'Username',
			'required',
			array('required' => 'Username Harus diisi dong')
		);


		$valid->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'Password Harus diisi dong')
		);

		if ($valid->run() === false) {
			$data = array('title' => 'Halaman Login');
			$this->load->view('login', $data);
		} else {
			$username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = $this->db->get_where('users', ['username' => $username,'password' => $password])->row_array();
			
			if (!empty($data)) {
				if ($data['username'] === $username) {
					switch ($data['role']) {
						case 'admin':
							$this->session->set_userdata('username', $username);
							$this->session->set_userdata('data', $data);
							$this->session->set_flashdata('sukses', '<script>swal("Success","Anda berhasil login sebagai admin","success")</script>');
							redirect(base_url('user'), 'refresh');
							break;
						case 'user':
							$this->session->set_userdata('username', $username);
							$this->session->set_userdata('data', $data);
							$this->session->set_flashdata('sukses', '<script>swal("Success","Anda berhasil login sebagai user","success")</script>');
							redirect(base_url('home'), 'refresh');
							break;
						default:
							break;
					}
				}else{
					$this->session->set_flashdata('sukses', '<script>swal("Error","Username dan password tidak cocok !","error")</script>');
					redirect(base_url('auth/login'), 'refresh');
				}
			} else {
				$this->session->set_flashdata('sukses', '<script>swal("Error","Username dan password tidak ada !","error")</script>');
				redirect(base_url('auth/login'), 'refresh');
			}
		}
    }
    
    public function registrasi()
    {
        $valid = $this->form_validation;
		$valid->set_rules(
			'username',
			'Username',
			'required',
			array('required' => 'Username Harus diisi')
		);


		$valid->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'Password Harus diisi')
        );
        if ($valid->run() === false) {
			$data = array('title' => 'Halaman Registrasi');
			$this->load->view('registrasi', $data);
		} else {
            
            $data = [
                'username' 		=> $this->input->post('username'),
				'password' 		=> $this->input->post('password'),
				'role'			=> 'user',	
                'created_at' 	=> time()
            ];

            $query = $this->db->insert('users', $data);
            $query = $this->db->affected_rows();

            if($query === 0){
                $this->session->set_flashdata('sukses', '<script>swal("Error","Tidak berhasil submit data","error")</script>');
				redirect(base_url('auth/registrasi'), 'refresh');
            }else{
                $this->session->set_flashdata('sukses', '<script>swal("Success","Data berhasil tersimpan, silahkan login !","success")</script>');
				redirect(base_url('auth/login'), 'refresh');
            }
		}
	}
	
	

	public function logout($role)
	{
		if ($role === 'admin') {
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('data');
			$this->session->set_flashdata('sukses', '<script>swal("Success","Anda berhasil logout, silahkan login !","success")</script>');
			redirect(base_url('auth/login'), 'refresh');
		}

		if ($role === 'user') {
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('data');
			$this->session->set_flashdata('sukses', '<script>swal("Success","Anda berhasil logout, silahkan login !","success")</script>');
			redirect(base_url('/'), 'refresh');
		}
		
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */