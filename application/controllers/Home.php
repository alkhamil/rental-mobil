<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $product = $this->db->get('products')->result_array();
        $data = [
            'title'     => 'Rental Mobil',
            'isi'       => 'home/list',
            'product'   => $product
        ];
        $this->load->view('frontend/wrapper', $data);
        
    }

    public function sewa($id)
    {   

        $productByID = $this->db->get_where('products', ['id'=>$id])->row_array();
        $data = [
            'title'         => 'Pembayaran',
            'isi'           => 'home/sewa',
            'productByID'   => $productByID
        ];
        $this->load->view('frontend/wrapper', $data);        
    }

    public function lanjut_sewa()
    {
        $productID = $this->input->post('product_id');
        $userID = $this->input->post('user_id');
        $rent = [
            'product_id'    => $productID,
            'user_id'       => $userID,
            'name'          => $this->input->post('name'),
            'sim'           => $this->input->post('sim'),
            'start_date'    => $this->input->post('start_date'),
            'end_date'      => $this->input->post('end_date')
        ];
        
        $query = $this->db->insert('rent', $rent);
        $query = $this->db->affected_rows();
        if ($query === 0) {
            $this->session->set_flashdata('sukses', '<script>swal("Error","Data tidak valid!","error")</script>');
            redirect(base_url('home'), 'refresh');
        }else{
            $this->session->set_flashdata('sukses', '<script>swal("Success","Anda berhasil sewa, silahkan lakukan pembayaran !","success")</script>');
            redirect(base_url('home/bayar/'.$productID.'/'.$userID), 'refresh');
        }
    }

    public function bayar($product_id, $userID)
    {
        $tagihan = $this->db->get_where('products',['id'=>$product_id])->row_array();
        $detail = $this->db->get_where('rent',['user_id'=>$userID])->row_array();
        $data = [
            'title'         => 'Pembayaran',
            'isi'           => 'home/bayar',
            'tagihan'       => $tagihan,
            'detail'        => $detail
        ];
        $this->load->view('frontend/wrapper', $data);
    }

}
