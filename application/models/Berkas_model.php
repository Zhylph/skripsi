<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Berkas_model extends CI_Model
{

    private $_table = "tbl_berkas";

    public $nip;
    public $id_jenis_berkas;
    public $id_jenis_pengajuan;
    public $file_berkas;
    public $tanggal_upload;

    public function rules()
    {
        return [
            [
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'required'
            ],
            [
                'field' => 'id_jenis_berkas',
                'label' => 'Jenis Berkas',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idberkas)
    {
        return $this->db->get_where($this->_table, ["id_berkas" => $idberkas])->row();
    }


    public function getAllBerkas()
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
        $this->nip = $post["nip"];
        $this->id_jenis_berkas = $post["id_jenis_berkas"];
        $this->id_jenis_pengajuan = $post["id_jenis_pengajuan"];
        $this->file_berkas = $this->_uploadfile();
        $this->tanggal_upload = time($post["tanggal_upload"]);
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_berkas = $post["id_berkas"];
        $this->nip = $post["nip"];
        $this->id_jenis_berkas = $post["id_jenis_berkas"];
        $this->id_jenis_pengajuan = $post["id_jenis_pengajuan"];

        if (!empty($_FILES["file_berkas"]["name"])) {
            $this->file_berkas = $this->_uploadfile();
        } else {
            $this->file_berkas = $post["old_file"];
        }
        $this->tanggal_upload = time($post["tanggal_upload"]);
        $this->db->update($this->_table, $this, array('id_berkas' => $post['id_berkas']));
    }

    public function delete($idberkas)
    {
        $this->_deletefile($idberkas);
        return $this->db->delete($this->_table, array("id_berkas" => $idberkas));
    }

    public function getJBerkas()
    {
        $query = "SELECT `tbl_berkas`.*, `tbl_jenis_berkas`.`nama_berkas`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_berkas` JOIN `tbl_jenis_berkas`
                  ON `tbl_berkas`.`id_jenis_berkas` = `tbl_jenis_berkas`.`id_jenis_berkas` JOIN  `tbl_user` ON `tbl_berkas`.`nip` = `tbl_user`.`nip` 
                ";
        return $this->db->query($query)->result_array();
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

    public function getPengajuanPI($nip)
    {
        $query = "SELECT * FROM `tbl_berkas` WHERE `id_jenis_pengajuan` = 'JP5' AND `nip` = $nip";
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

        if (!$this->upload->do_upload('file_berkas')) {
            $data['error'] = $this->upload->display_errors();
        } else {
            return $this->upload->data("file_name");
        }
    }

    private function _deletefile($idberkas)
    {
        $berkas = $this->getById($idberkas);
        $filename = explode(".", $berkas->file_berkas)[0];
        return array_map('unlink', glob(FCPATH . "upload/berkas/$filename.*"));
    }
}
