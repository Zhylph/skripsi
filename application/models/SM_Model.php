<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class SM_model extends CI_Model
{

    private $_table = "tbl_surat_masuk";

    public $no_surat;
    public $id_jenis_surat;
    public $perihal;
    public $tanggal_surat;
    public $tanggal_diterima;
    public $asal_surat;
    public $tujuan_surat;
    public $file_surat;

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

    public function getById($idsuratmasuk)
    {
        return $this->db->get_where($this->_table, ["id_surat_masuk" => $idsuratmasuk])->row();
    }

    public function getSMasuk()
    {
        $query = "SELECT `tbl_surat_masuk`.*, `tbl_jenis_surat`.`jenis_surat`
                  FROM `tbl_surat_masuk` JOIN `tbl_jenis_surat`
                  ON `tbl_surat_masuk`.`id_jenis_surat` = `tbl_jenis_surat`.`id_jenis_surat`
                  AND `tbl_surat_masuk`.`id_jenis_surat` = 'SM' ";
        return $this->db->query($query)->result_array();
    }


    public function getAllSmasuk()
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

    public function save()
    {
        $post = $this->input->post();
        $this->no_surat = $post["no_surat"];
        $this->id_jenis_surat = ($post["id_jenis_surat"] = 'SM');
        $this->perihal = $post["perihal"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->tanggal_diterima = $post["tanggal_diterima"];
        $this->asal_surat = $post["asal_surat"];
        $this->tujuan_surat = $post["tujuan_surat"];
        $this->file_surat = $this->_uploadfile();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_surat_masuk = $post["id_surat_masuk"];
        $this->no_surat = $post["no_surat"];
        $this->id_jenis_surat = $post["id_jenis_surat"];
        $this->perihal = $post["perihal"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->tanggal_diterima = $post["tanggal_diterima"];
        $this->asal_surat = $post["asal_surat"];
        $this->tujuan_surat = $post["tujuan_surat"];

        if (!empty($_FILES["file_surat"]["name"])) {
            $this->file_surat = $this->_uploadfile();
        } else {
            $this->file_surat = $post["old_file"];
        }
        $this->db->update($this->_table, $this, array('id_surat_masuk' => $post['id_surat_masuk']));
    }

    public function delete($idsuratmasuk)
    {
        $this->_deletefile($idsuratmasuk);
        return $this->db->delete($this->_table, array("id_surat_masuk" => $idsuratmasuk));
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

    private function _deletefile($idsuratmasuk)
    {
        $surat = $this->getById($idsuratmasuk);
        $filename = explode(".", $surat->file_surat)[0];
        return array_map('unlink', glob(FCPATH . "upload/berkas/$filename.*"));
    }
}
