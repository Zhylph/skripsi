<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        //echo 'Selamat datang user ' . $data['user']['name'];  //validasi memanggil sesson menampilkan nama si login

        $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('newadmin/index', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/footer');
    }
}
