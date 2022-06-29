<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class SK_model extends CI_Model
{

    private $_table = "tbl_surat_keluar";

    public $id_surat_keluar;
    public $no_surat;
    public $id_jenis_surat;
    public $perihal;
    public $tanggal_surat;
    public $tujuan_surat;

    public function rules()
    {
        return [
            [
                'field' => 'no_surat',
                'label' => 'Nomor Surat',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idsuratkeluar)
    {
        return $this->db->get_where($this->_table, ["id_surat_keluar" => $idsuratkeluar])->row();
    }

    public function getSKeluar()
    {
        $query = "SELECT `tbl_surat_keluar`.*, `tbl_jenis_surat`.`jenis_surat`
                  FROM `tbl_surat_keluar` JOIN `tbl_jenis_surat`
                  ON `tbl_surat_keluar`.`id_jenis_surat` = `tbl_jenis_surat`.`id_jenis_surat`
                  AND `tbl_surat_keluar`.`id_jenis_surat` = 'SK' ";
        return $this->db->query($query)->result_array();
    }

    public function getSK($idsk)
    {
        $query = "SELECT `tbl_surat_keluar`.*, `tbl_jenis_surat`.`jenis_surat`
                  FROM `tbl_surat_keluar` JOIN `tbl_jenis_surat`
                  ON `tbl_surat_keluar`.`id_jenis_surat` = `tbl_jenis_surat`.`id_jenis_surat`
                  AND `tbl_surat_keluar`.`id_jenis_surat` = 'SK' WHERE id_surat_keluar='$idsk' ";
        return $this->db->query($query)->result_array();
    }

    public function getPI2($idpen)
    {
        $query = "SELECT `tbl_penyesuaian`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`, `tbl_user`.`golongan`, `tbl_user`.`jabatan`
                  FROM `tbl_penyesuaian` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_penyesuaian`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_penyesuaian`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_penyesuaian`.`id_jenis_pengajuan` = 'JP5' AND `tbl_penyesuaian`.`penyetujuan` = 0 WHERE id_penyesuaian='$idpen'
                ";
        return $this->db->query($query)->result_array();
    }


    public function getAllSkeluar()
    {
        $berkas = array();
        $this->db->select('*');
        $this->db->from('tbl_berkas a');
        $this->db->join('tbl_user b', 'b.nip=a.nip', 'left');
        $this->db->join('tbl_jenis_berkas c', 'c.id_jenis_berkas=a.id_jenis_berkas', 'left');
        $this->db->where('c.id_jenis_berkas');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $berkas = $query->result();
        }
        return $berkas;
    }

    public function getNS1()
    {

        $no_surat = "Diskominfo/2020";
        $query = "SELECT max(no_surat) as ns_auto FROM tbl_surat_keluar";
        $data = $this->db->query($query)->row_array();
        $max_ns = $data['ns_auto'];
        $max_ns2 = (int)substr($max_ns,1,3);
        $nscount = $max_ns2 + 1;
        $ns_auto = sprintf('%03s', $nscount)."/".$no_surat;
        return $ns_auto; 
    }

    public function getNS()
    {

        $no_surat = "NS-Per";
        $query = "SELECT max(no_surat) as ns_auto FROM tbl_surat_keluar";
        $data = $this->db->query($query)->row_array();
        $max_ns = $data['ns_auto'];
        $max_ns2 = (int)substr($max_ns,7,3);
        $nscount = $max_ns2 + 1;
        $ns_auto = $no_surat."-".sprintf('%03s', $nscount);
        return $ns_auto; 
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no_surat = $post["no_surat"];
        $this->id_jenis_surat = ($post["id_jenis_surat"] = 'SK');
        $this->perihal = $post["perihal"];
        $this->klasifikasi = $post["klasifikasi"];
        $this->lampiran = $post["lampiran"];
        $this->isi = $post["isi"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->tujuan_surat = $post["tujuan_surat"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_surat_keluar = $post["id_surat_keluar"];
        $this->no_surat = $post["no_surat"];
        $this->id_jenis_surat = ($post["id_jenis_surat"] = 'SK');
        $this->perihal = $post["perihal"];
        $this->klasifikasi = $post["klasifikasi"];
        $this->lampiran = $post["lampiran"];
        $this->isi = $post["isi"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->tujuan_surat = $post["tujuan_surat"];

       
        $this->db->update($this->_table, $this, array('id_surat_keluar' => $post['id_surat_keluar']));
    }
    public function delete($idsuratkeluar)
    {
        $this->_deletefile($idsuratkeluar);
        return $this->db->delete($this->_table, array("id_surat_keluar" => $idsuratkeluar));
    }



    public function getPengajuan()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                ";
        return $this->db->query($query)->result_array();
    }

    public function show_data_by_id($id)
    {
        $condition = "nip =" . "'" . $id . "'";
        $condition2 = "id_jenis_berkas =" . "'" . 'SK1' . "'";
        $condition3 = "id_jenis_berkas =" . "'" . 'KP1' . "'";
        $condition4 = "id_jenis_berkas =" . "'" . 'KP1' . "'";

        $this->db->select('*');
        $this->db->from('tbl_berkas');
        $this->db->where($condition);
        $this->db->where($condition2);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getPengajuanKP($nip)
    {
        $query = "SELECT * FROM `tbl_berkas` WHERE `id_jenis_pengajuan` = 'JP1' AND `nip` = $nip";
        return $this->db->query($query)->result_array();
    }

    public function getPengajuanKG($nip)
    {
        $query = "SELECT * FROM `tbl_berkas` WHERE `id_jenis_pengajuan` = 'JP2' AND `nip` = $nip";
        return $this->db->query($query)->result_array();
    }

    public function getPengajuanP($nip)
    {
        $query = "SELECT * FROM `tbl_berkas` WHERE `id_jenis_pengajuan` = 'JP3' AND `nip` = $nip";
        return $this->db->query($query)->result_array();
    }

    public function getPengajuanC($nip)
    {
        $query = "SELECT * FROM `tbl_berkas` WHERE `id_jenis_pengajuan` = 'JP4' AND `nip` = $nip";
        return $this->db->query($query)->result_array();
    }

    public function getUpberkas()
    {
        $nip = $this->session->userdata('nip');
        $this->db->where('nip', $nip);
        $this->db->order_by('tanggal_upload', 'desc');
        $query = $this->db->get('tbl_berkas');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }



    private function _uploadfile()
    {
        $this->load->helper('inflector');
        $file_name = underscore($_FILES['file_var_name']['name']);
        $config['upload_path']          = './upload/berkas/';
        $config['allowed_types']        = 'pdf|jpg|docx|doc|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 25120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_surat')) {
            $data = array('error' => $this->upload->display_errors()); //associate view variable $error with upload errors
        } else {
            return $this->upload->data("file_name");
        }
    }

    private function _deletefile($idsuratkeluar)
    {
        $surat = $this->getById($idsuratkeluar);
        $filename = explode(".", $surat->file_surat)[0];
        return array_map('unlink', glob(FCPATH . "upload/berkas/$filename.*"));
    }

}

