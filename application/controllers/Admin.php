<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tbl_login', ['nip' => $this->session->userdata('nip')])->row_array();
        //echo 'Selamat datang user '. $data['user']['name'];  validasi memanggil sesson menampilkan nama si login

        $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('admin/index', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        //echo 'Selamat datang user '. $data['user']['name'];  validasi memanggil sesson menampilkan nama si login

        $data['role'] = $this->db->get('tbl_role')->result_array();

        $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('admin/role', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        //echo 'Selamat datang user '. $data['user']['name'];  validasi memanggil sesson menampilkan nama si login

        $data['role'] = $this->db->get_where('tbl_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1); // ngakalin supaya ceklis admin kd tampil di role admin
        $data['menu'] = $this->db->get('tbl_menu')->result_array();

        $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('admin/role-access', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/footer');
    }

    public function changeAccess() // function untuk insert atau hapus checked
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('tbl_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('tbl_access_menu', $data);
        } else {
            $this->db->delete('tbl_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Change</div>');
    }
}
