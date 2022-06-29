<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('nip')) { // untuk mengembalikan ke halaman user kalau masih ada session
            redirect('user');
        }
        $this->goToDefaultPage();
        $this->form_validation->set_rules('nip', 'Nip', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['nip' => $nip])->row_array(); //pembacaannya select * from user(tbl) where email = "$email"
        //var_dump($user);
        //die;

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nip' => $user['nip'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('data/approve_kp'); // redirect mengarahkan ke controller Admin.php
                } else {
                    redirect('user/upberkas');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Tidak Ada</div>');
            redirect('auth');
        }
    }

    public function goToDefaultPage()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        } else if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        }
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out</div>');
        redirect('auth');
    }
}
