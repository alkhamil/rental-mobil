<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function index()
    {
        $product = $this->db->get('products')->result_array();
        $data = [
            'title'     => 'Halaman Product',
            'isi'       => 'product/list',
            'product'   => $product
        ];
        $this->load->view('layout/wrapper', $data);
    }

    public function add()
    {
        $valid = $this->form_validation;
        $valid->set_rules('name', 'Name', 'required');
        $valid->set_rules('number', 'Number', 'required');
        $valid->set_rules('qty', 'qty', 'required');
        $valid->set_rules('price', 'price', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Tambah Product',
                'isi'       => 'product/add'
            ];
            $this->load->view('layout/wrapper', $data);
        }else{
            $config['upload_path']   = './assets/upload/';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')){
                $data = [
                    'title'     => 'Tambah Product',
                    'isi'       => 'product/add',
                    'error'	    => $this->upload->display_errors()
                ];
                $this->load->view('layout/wrapper', $data);
            }else {
                $upload_data        		= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/upload/'.$upload_data['uploads']['file_name']; 
				$config['new_image']     	= './assets/upload/thumbs/';
				$config['create_thumb']   	= TRUE;
				$config['quality']       	= "100%";
				$config['maintain_ratio']   = TRUE; 
				$config['width']       		= 360; // Pixel
				$config['height']       	= 360; // Pixel
				$config['x_axis']       	= 0;
				$config['y_axis']       	= 0;
				$config['thumb_marker']   	= '';
				$this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $data = [
                    'name'          => $this->input->post('name'),
                    'image'         => $upload_data['uploads']['file_name'],
                    'description'   => $this->input->post('description'),
                    'type'          => $this->input->post('type'),
                    'number'        => $this->input->post('number'),
                    'qty'           => $this->input->post('qty'),
                    'price'         => $this->input->post('price'),
                    'created_at'    => time()
                ];
                $query = $this->db->insert('products', $data);
                $query = $this->db->affected_rows();
    
                if($query === 0){
                    $this->session->set_flashdata('sukses', '<script>swal("Error","Tidak berhasil submit data","error")</script>');
                    redirect(base_url('product'), 'refresh');
                }else{
                    $this->session->set_flashdata('sukses', '<script>swal("Success","Data berhasil tersimpan","success")</script>');
                    redirect(base_url('product'), 'refresh');
                }
    
            }
            
        }
    }

    public function update($id)
    {
        $product = $this->db->get_where('products', ['id'=>$id])->row_array();
        $valid = $this->form_validation;
        $valid->set_rules('name', 'Name', 'required');
        $valid->set_rules('number', 'Number', 'required');
        $valid->set_rules('qty', 'qty', 'required');
        $valid->set_rules('price', 'price', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Update Product',
                'isi'       => 'product/update',
                'product'   => $product
            ];
            $this->load->view('layout/wrapper', $data);
        }else{
            $config['upload_path']   = './assets/upload/';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')){
                if ($product['image'] != '') {
                    unlink('assets/upload/'.$product['image']);
                    unlink('assets/upload/thumbs/'.$product['image']);
                }
                $data = [
                    'title'     => 'Update Product',
                    'isi'       => 'product/update',
                    'product'   => $product
                ];
                //$this->load->view('layout/wrapper', $data);
                $upload_data        		= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/upload/'.$upload_data['uploads']['file_name']; 
				$config['new_image']     	= './assets/upload/thumbs/';
				$config['create_thumb']   	= TRUE;
				$config['quality']       	= "100%";
				$config['maintain_ratio']   = TRUE; 
				$config['width']       		= 360; // Pixel
				$config['height']       	= 360; // Pixel
				$config['x_axis']       	= 0;
				$config['y_axis']       	= 0;
				$config['thumb_marker']   	= '';
				$this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $img = $upload_data['uploads']['file_name'];
            }else {
                $img = $product['image'];
            }

            $data = [
                'id'            => $id,
                'name'          => $this->input->post('name'),
                'image'         => $img,
                'description'   => $this->input->post('description'),
                'type'          => $this->input->post('type'),
                'number'        => $this->input->post('number'),
                'qty'           => $this->input->post('qty'),
                'price'         => $this->input->post('price'),
                'created_at'    => time()
            ];
            $this->db->where('id', $id);
            $query = $this->db->update('products', $data);
            $query = $this->db->affected_rows();

            if($query === 0){
                $this->session->set_flashdata('sukses', '<script>swal("Error","Tidak berhasil submit data","error")</script>');
                redirect(base_url('product'), 'refresh');
            }else{
                $this->session->set_flashdata('sukses', '<script>swal("Success","Data berhasil terupdate","success")</script>');
                redirect(base_url('product'), 'refresh');
            }

            
        }
        
    }

    public function delete($id)
    {
        $product = $this->db->get_where('products', ['id'=>$id])->row_array();
		if ($product['image'] != "") {
			unlink('assets/upload/'.$product['image']);
			unlink('assets/upload/thumbs/'.$product['image']);
		}

		$this->db->delete('products', ['id' => $id]);
		$this->session->set_flashdata('sukses', '<script>swal("Success", "Data telah dihapus", "success")</script>');
		redirect(base_url('product'),'refresh');
    }

}

/* End of file Controllername.php */
