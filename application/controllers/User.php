<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model("berkas_model");
        $this->load->model("jberkas_model");
        $this->load->model("pengajuan_model");
        $this->load->model("penyetujuan_model");
        $this->load->model("cuti_model");
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        //echo 'Selamat datang user ' . $data['user']['name'];  //validasi memanggil sesson menampilkan nama si login

        $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('user/index', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/footer');
    }

    public function changePassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        //echo 'Selamat datang user ' . $data['user']['name'];  //validasi memanggil sesson menampilkan nama si login

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('user/changepassword', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nip', $this->session->userdata('nip'));
                    $this->db->update('tbl_user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function upberkas()
    {
        $data['title'] = 'Upload Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['upberkas'] = $this->berkas_model->getUpberkas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/upberkas', $data);
        $this->load->view('templates/footer');
    }

    public function addberkas()
    {
        $data['title'] = 'Upload Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jberkas'] = $this->db->get('tbl_jenis_berkas')->result_array();
        $data['jpengajuan'] = $this->db->get('tbl_jenis_pengajuan')->result_array();

        $berkas = $this->berkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($berkas->rules());

        if ($validation->run()) {
            $berkas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('user/upberkas');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("user/t_berkas");
        $this->load->view('templates/footer');
    }

    public function editberkas($idberkas = null)
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jberkas'] = $this->db->get('tbl_jenis_berkas')->result_array();
        $data['jpengajuan'] = $this->db->get('tbl_jenis_pengajuan')->result_array();

        $berkas = $this->berkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($berkas->rules());

        if ($validation->run()) {
            $berkas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('user/upberkas');
        }

        $data["berkas"] = $berkas->getById($idberkas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("user/e_berkas", $data);
        $this->load->view('templates/footer');
    }

    public function deleteberkas($idberkas = null)
    {
        if (!isset($idberkas)) show_404();

        if ($this->berkas_model->delete($idberkas)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('user/upberkas'));
        }
    }

    public function pengajuan()
    {
        $data['title'] = 'Ajukan Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jpengajuan'] = $this->db->get('tbl_jenis_pengajuan')->result_array();

        $pengajuan = $this->pengajuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuan->rules());

        if ($validation->run()) {
            $pengajuan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('user/upberkas');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("user/pengajuan");
        $this->load->view('templates/footer');
    }

    public function penyesuaian()
    {
        $data['title'] = 'Penyesuaian Ijazah';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jpengajuan'] = $this->db->get('tbl_jenis_pengajuan')->result_array();

        $penyetujuan = $this->penyetujuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($penyetujuan->rules());

        if ($validation->run()) {
            $penyetujuan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('user/upberkas');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("user/penyesuaian");
        $this->load->view('templates/footer');
    }
    
    public function izin_cuti()
    {
        $data['title'] = 'Izin Cuti';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jpengajuan'] = $this->db->get('tbl_jenis_pengajuan')->result_array();

        $cuti = $this->cuti_model;
        $validation = $this->form_validation;
        $validation->set_rules($cuti->rules());

        if ($validation->run()) {
            $cuti->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('user/upberkas');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("user/izin_cuti");
        $this->load->view('templates/footer');
    }
}
