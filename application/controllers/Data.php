<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model("data_model");
        $this->load->model("berkas_model");
        $this->load->model("sm_model");
        $this->load->model("sk_model");
        $this->load->model("jberkas_model");
        $this->load->model("pengajuan_model");
        $this->load->model("jpengajuan_model");
        $this->load->model("penyetujuan_model");
        $this->load->model("jsurat_model");
        $this->load->model("cuti_model");
        $this->load->database();

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Pegawai';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pegawai'] = $this->data_model->getPeg();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/pegawai', $data);
        $this->load->view('templates/footer');
    }

    public function berkas()
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $data['berkas'] = $this->berkas_model->getJBerkas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/berkas', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan()
    {
        $data['title'] = 'Data Pengajuan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pengajuan'] = $this->pengajuan_model->getPengajuan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function jenisberkas()
    {
        $data['title'] = 'Data Jenis Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['jenisb'] = $this->jberkas_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/jenisberkas', $data);
        $this->load->view('templates/footer');
    }

    public function jenissurat()
    {
        $data['title'] = 'Data Jenis Surat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['jsurat'] = $this->jsurat_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/jenissurat', $data);
        $this->load->view('templates/footer');
    }

    public function jenispengajuan()
    {
        $data['title'] = 'Data Jenis Pengajuan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['jenisp'] = $this->jpengajuan_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/jenispengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function suratmasuk()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['smasuk'] = $this->sm_model->getSMasuk();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/suratmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function suratkeluar()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['skeluar'] = $this->sk_model->getSKeluar();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/suratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function addpegawai()
    {
        $data['title'] = 'Data Pegawai';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $pegawai = $this->data_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_pegawai");
        $this->load->view('templates/footer');
    }

    public function addberkas()
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jberkas'] = $this->db->get('tbl_jenis_berkas')->result_array();
        $data['jpengajuan'] = $this->db->get('tbl_jenis_pengajuan')->result_array();

        $berkas = $this->berkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($berkas->rules());

        if ($validation->run()) {
            $berkas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/berkas');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_berkas", $data);
        $this->load->view('templates/footer');
    }

    public function addsmasuk()
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jsurat'] = $this->db->get('tbl_jenis_surat')->result_array();

        $smasuk = $this->sm_model;
        $validation = $this->form_validation;
        $validation->set_rules($smasuk->rules());

        if ($validation->run()) {
            $smasuk->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/suratmasuk');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_suratmasuk", $data);
        $this->load->view('templates/footer');
    }

    public function addskeluar()
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jsurat'] = $this->db->get('tbl_jenis_surat')->result_array();
        $data['no_surat'] = $this->sk_model->getNS1();
 
        $skeluar = $this->sk_model;
        $validation = $this->form_validation;
        $validation->set_rules($skeluar->rules());

        if ($validation->run()) {
            $skeluar->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/suratkeluar');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_suratkeluar", $data);
        $this->load->view('templates/footer');
    }

    /* public function tambahberkas()
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jberkas'] = $this->db->get('tbl_jenis_berkas')->result_array();
        $data['jpengajuan'] = $this->db->get('tbl_jenis_pengajuan')->result_array();
        $this->load->model('Berkas_model', 'Berkas');

        $this->form_validation->set_rules('nip', 'NIP', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view("data/t_berkas", $data, array('error' => ' '));
            $this->load->view('templates/footer');
        } else {
            $this->load->helper('inflector');
            $file_name = underscore($_FILES['file_var_name']['name']);
            $config['upload_path']          = './upload/berkas/';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 5120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_berkas')) {
            $error = array('error' => $this->upload->display_errors()); //associate view variable $error with upload errors

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view("data/t_berkas", $data, $error);
            $this->load->view('templates/footer');
        } else {
            $data = [

            ]
            return $this->upload->data("file_name");
        }
        }
        
    } */

    public function addjberkas()
    {
        $data['title'] = 'Data Jenis Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $jberkas = $this->jberkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($jberkas->rules());

        if ($validation->run()) {
            $jberkas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_jenisberkas");
        $this->load->view('templates/footer');
    }

    public function addjpengajuan()
    {
        $data['title'] = 'Data Jenis Pengajuan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $jpengajuan = $this->jpengajuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jpengajuan->rules());

        if ($validation->run()) {
            $jpengajuan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_jenispengajuan");
        $this->load->view('templates/footer');
    }

    public function addjsurat()
    {
        $data['title'] = 'Data Jenis Surat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $jsurat = $this->jsurat_model;
        $validation = $this->form_validation;
        $validation->set_rules($jsurat->rules());

        if ($validation->run()) {
            $jsurat->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_jenissurat");
        $this->load->view('templates/footer');
    }

    public function editpeg($idpegawai = null)
    {
        $data['title'] = 'Data Pegawai';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $peg = $this->data_model;
        $validation = $this->form_validation;
        $validation->set_rules($peg->rules());

        if ($validation->run()) {
            $peg->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data');
        }

        $data["peg"] = $peg->getById($idpegawai);
        if (!$data["peg"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_pegawai", $data);
        $this->load->view('templates/footer');
    }

    public function editberkas($idberkas = null)
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jberkas'] = $this->db->get('tbl_jenis_berkas')->result_array();

        $berkas = $this->berkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($berkas->rules());

        if ($validation->run()) {
            $berkas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/berkas');
        }

        $data["berkas"] = $berkas->getById($idberkas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_berkas", $data);
        $this->load->view('templates/footer');
    }

    public function editsmasuk($idsuratmasuk = null)
    {
        $data['title'] = 'Data Surat Masuk';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jsurat'] = $this->db->get('tbl_jenis_surat')->result_array();

        $smasuk = $this->sm_model;
        $validation = $this->form_validation;
        $validation->set_rules($smasuk->rules());

        if ($validation->run()) {
            $smasuk->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/suratmasuk');
        }

        $data["smasuk"] = $smasuk->getById($idsuratmasuk);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_suratmasuk", $data);
        $this->load->view('templates/footer');
    }

    public function editskeluar($idsuratkeluar = null)
    {
        $data['title'] = 'Data Surat Keluar';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jsurat'] = $this->db->get('tbl_jenis_surat')->result_array();

        $skeluar = $this->sk_model;
        $validation = $this->form_validation;
        $validation->set_rules($skeluar->rules());

        if ($validation->run()) {
            $skeluar->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/suratkeluar');
        }

        $data["skeluar"] = $skeluar->getById($idsuratkeluar);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_suratkeluar", $data);
        $this->load->view('templates/footer');
    }

    public function editjberkas($idjb = null)
    {
        $data['title'] = 'Data Jenis Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $jenisb = $this->jberkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenisb->rules());

        if ($validation->run()) {
            $jenisb->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/jenisberkas');
        }

        $data["jenisb"] = $jenisb->getById($idjb);
        if (!$data["jenisb"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_jenisberkas", $data);
        $this->load->view('templates/footer');
    }

    public function editjpengajuan($idjp = null)
    {
        $data['title'] = 'Data Jenis Pengajuan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $jenisp = $this->jpengajuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenisp->rules());

        if ($validation->run()) {
            $jenisp->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/jenispengajuan');
        }

        $data["jenisp"] = $jenisp->getById($idjp);
        if (!$data["jenisp"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_jenispengajuan", $data);
        $this->load->view('templates/footer');
    }

    public function editjsurat($idjs = null)
    {
        $data['title'] = 'Data Jenis Surat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $jsurat = $this->jsurat_model;
        $validation = $this->form_validation;
        $validation->set_rules($jsurat->rules());

        if ($validation->run()) {
            $jsurat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/jenissurat');
        }

        $data["jsurat"] = $jsurat->getById($idjs);
        if (!$data["jsurat"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_jenissurat", $data);
        $this->load->view('templates/footer');
    }

    public function deletepegawai($idpegawai = null)
    {
        if (!isset($idpegawai)) show_404();

        if ($this->data_model->delete($idpegawai)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data'));
        }
    }

    public function deleteberkas($idberkas = null)
    {
        if (!isset($idberkas)) show_404();

        if ($this->berkas_model->delete($idberkas)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/berkas'));
        }
    }

    public function deletesmasuk($idsuratmasuk = null)
    {
        if (!isset($idsuratmasuk)) show_404();

        if ($this->sm_model->delete($idsuratmasuk)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/suratmasuk'));
        }
    }

    public function deleteskeluar($idsuratkeluar = null)
    {
        if (!isset($idsuratkeluar)) show_404();

        if ($this->sk_model->delete($idsuratkeluar)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/suratkeluar'));
        }
    }

    public function deletejberkas($idjb = null)
    {
        if (!isset($idjb)) show_404();

        if ($this->jberkas_model->delete($idjb)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/jenisberkas'));
        }
    }

    public function deletejpengajuan($idjp = null)
    {
        if (!isset($idjp)) show_404();

        if ($this->jpengajuan_model->delete($idjp)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/jenispengajuan'));
        }
    }

    public function deletejsurat($idjs = null)
    {
        if (!isset($idjs)) show_404();

        if ($this->jsurat_model->delete($idjs)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/jenissurat'));
        }
    }

    public function approve1($id_pengajuan)
    {
        $post['pengajuan'] = $this->pengajuan_model->getById($id_pengajuan);

        if ($this->pengajuan_model->approve($id_pengajuan)) { ?>
            <script>
                alert("Post berhasil di Approve");
            </script>
        <?php
            redirect('data/approve_kp', 'refresh');
        } else {
            die("Ada masalah Approve data");
        }
    }

    public function approve2($id_pengajuan)
    {
        $post['pengajuan'] = $this->pengajuan_model->getById($id_pengajuan);

        if ($this->pengajuan_model->approve($id_pengajuan)) { ?>
            <script>
                alert("Post berhasil di Approve");
            </script>
        <?php
            redirect('data/approve_kg', 'refresh');
        } else {
            die("Ada masalah Approve data");
        }
    }

    public function approve3($id_pengajuan)
    {
        $post['pengajuan'] = $this->pengajuan_model->getById($id_pengajuan);

        if ($this->pengajuan_model->approve($id_pengajuan)) { ?>
            <script>
                alert("Post berhasil di Approve");
            </script>
        <?php
            redirect('data/approve_p', 'refresh');
        } else {
            die("Ada masalah Approve data");
        }
    }

    public function approve4($id_cuti)
    {
        $post['cuti'] = $this->pengajuan_model->getById($id_cuti);

        if ($this->cuti_model->approve($id_cuti)) { ?>
            <script>
                alert("Post berhasil di Approve");
            </script>
<?php
            redirect('data/approve_c', 'refresh');
        } else {
            die("Ada masalah Approve data");
        }
    }

    public function approve5($id_penyesuaian)
    {
        $post['penyetujuan'] = $this->penyetujuan_model->getById($id_penyesuaian);

        if ($this->penyetujuan_model->approve($id_penyesuaian)) { ?>
            <script>
                alert("Post berhasil di Approve");
            </script>
<?php
            redirect('data/approve_pi', 'refresh');
        } else {
            die("Ada masalah Approve data");
        }
    }

    public function print()
    {
        $data['user'] = $this->data_model->getAll()->result();
        $this->load->view('p_pegawai', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');
        $data['pegawai'] = $this->data_model->getPeg();
        $this->load->view('laporan/l_pegawai', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Pegawai.pdf", array('Attachment' => 0));
    }

    public function pdfberkas()
    {
        $this->load->library('dompdf_gen');
        $data['berkas'] = $this->berkas_model->getJBerkas();
        $this->load->view('laporan/l_berkas', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Berkas.pdf", array('Attachment' => 0));
    }

    public function pdfsuratmasuk()
    {
        $this->load->library('dompdf_gen');
        $data['berkas'] = $this->sm_model->getSMasuk();
        $this->load->view('laporan/l_suratmasuk', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Berkas.pdf", array('Attachment' => 0));
    }

    public function pdfsuratkeluar()
    {
        $this->load->library('dompdf_gen');
        $data['berkas'] = $this->sk_model->getSKeluar();
        $this->load->view('laporan/l_suratkeluar', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Berkas.pdf", array('Attachment' => 0));
    }

    public function pdfpengajuankp()
    {
        $this->load->library('dompdf_gen');
        $data['pengajuan'] = $this->pengajuan_model->getKP();
        $this->load->view('laporan/l_pengajuankp', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Kenaikan_Pangkat.pdf", array('Attachment' => 0));
    }

    public function pdfpengajuankg()
    {
        $this->load->library('dompdf_gen');
        $data['pengajuan'] = $this->pengajuan_model->getKG();
        $this->load->view('laporan/l_pengajuankg', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Kenaikan_Gaji.pdf", array('Attachment' => 0));
    }

    public function pdfpengajuanpensi()
    {
        $this->load->library('dompdf_gen');
        $data['pengajuan'] = $this->pengajuan_model->getP();
        $this->load->view('laporan/l_pengajuanpensi', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Pensiun.pdf", array('Attachment' => 0));
    }

    public function pdfcuti($idc = null)
    {
        $this->load->library('dompdf_gen');
        $data['cuti'] = $this->cuti_model->getC2($idc);
        $this->load->view('laporan/l_pengajuancuti', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_PenyesuaianIjazah.pdf", array('Attachment' => 0));
    }


    public function pdfpengajuan()
    {
        $this->load->library('dompdf_gen');
        $data['pengajuan'] = $this->pengajuan_model->getPengajuan();
        $this->load->view('laporan/l_pengajuan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Pengajuan.pdf", array('Attachment' => 0));
    }

    public function pdfijazah($idpen = null)
    {
        $this->load->library('dompdf_gen');
        $data['penyesuaian'] = $this->penyetujuan_model->getPI2($idpen);
        $this->load->view('laporan/l_ijazah', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_PenyesuaianIjazah.pdf", array('Attachment' => 0));
    }

    public function pdfsk($idsk = null)
    {
        $this->load->library('dompdf_gen');
        $data['skeluar'] = $this->sk_model->getSK($idsk);
        $this->load->view('laporan/l_suratkeluar', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_PenyesuaianIjazah.pdf", array('Attachment' => 0));
    }

    public function approve_kp()
    {
        $data['title'] = 'Kenaikan Pangkat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pengajuan'] = $this->pengajuan_model->getKP();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/kenaikanpangkat', $data);
        $this->load->view('templates/footer');
    }

    public function approve_kg()
    {
        $data['title'] = 'Kenaikan Gaji';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pengajuan'] = $this->pengajuan_model->getKG();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/kenaikangaji', $data);
        $this->load->view('templates/footer');
    }

    public function approve_p()
    {
        $data['title'] = 'Pensiun';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pengajuan'] = $this->pengajuan_model->getP();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/pensiun', $data);
        $this->load->view('templates/footer');
    }

    public function approve_c()
    {
        $data['title'] = 'Izin Cuti';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        
        $data['cuti'] = $this->cuti_model->getC();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/izincuti', $data);
        $this->load->view('templates/footer');
    }

    public function approve_pi()
    {
        $data['title'] = 'Penyesuaian Ijazah';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['penyetujuan'] = $this->penyetujuan_model->getPI();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/p_ijazah', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_kp($nip)
    {
        $data['title'] = 'Kenaikan Pangkat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanKP($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_kp', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_kg($nip)
    {
        $data['title'] = 'Kenaikan Gaji';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanKG($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_kp', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_pensiun($nip)
    {
        $data['title'] = 'Pensiun';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanP($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_kp', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_cuti($nip)
    {
        $data['title'] = 'Izin Cuti';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanC($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_kp', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_ijazah($nip)
    {
        $data['title'] = 'Penyesuaian Ijazah';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanPI($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_pi', $data);
        $this->load->view('templates/footer');
    }
    
    public function view_ijazah($nip)
    {
        $data['title'] = 'Penyesuaian Ijazah';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanPI($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_pi', $data);
        $this->load->view('templates/footer');
    }
}
