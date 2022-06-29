<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Cuti_model extends CI_Model
{
    private $_table = "tbl_cuti";


    public $id_cuti;
    public $nip;
    public $perihal;
    public $tempat;
    public $lama;
    public $lampiran;
    public $id_jenis_pengajuan;
    public $tanggal_pengajuan;
    public $penyetujuan;

    public function rules()
    {
        return [

            [
                'field' => 'perihal',
                'label' => 'Perihal Cuti',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tempat',
                'label' => 'Tempat Cuti',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'lama',
                'label' => 'Lama Cuti',
                'rules' => 'required|trim'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idc)
    {
        return $this->db->get_where($this->_table, ["id_cuti" => $idc])->row();
    }


    public function getPengajuan()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getKP()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP1' AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getKG()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP2' AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getP()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP3' AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getC()
    {
        $query = "SELECT `tbl_cuti`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`, `tbl_user`.`golongan`, `tbl_user`.`jabatan`
                  FROM `tbl_cuti` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_cuti`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_cuti`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_cuti`.`id_jenis_pengajuan` = 'JP4' AND `tbl_cuti`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getC2($idc)
    {
        $query = "SELECT `tbl_cuti`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`, `tbl_user`.`golongan`, `tbl_user`.`jabatan`
                  FROM `tbl_cuti` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_cuti`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_cuti`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_cuti`.`id_jenis_pengajuan` = 'JP4' AND `tbl_cuti`.`penyetujuan` = 0 WHERE id_cuti='$idc'
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPI()
    {
        $query = "SELECT `tbl_penyesuaian`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`, `tbl_user`.`golongan`, `tbl_user`.`jabatan`
                  FROM `tbl_penyesuaian` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_penyesuaian`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_penyesuaian`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_penyesuaian`.`id_jenis_pengajuan` = 'JP5' AND `tbl_penyesuaian`.`penyetujuan` = 0
                ";
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

    public function view($idpen)
{
   $query = $this->db->query("SELECT * FROM tbl_penyesuaian where id_penyesuaian='$idpen' LIMIT 1");
   return $query->result_array();
}

    public function getPengajuanKP($id_pengajuan)
    {
        $query = "SELECT `tbl_berkas`.*, `tbl_pengajuan`.`tanggal_pengajuan`, `tbl_jenis_berkas`.`nama_berkas`
                  FROM `tbl_berkas` JOIN `tbl_pengajuan`
                  ON `tbl_berkas`.`nip` = `tbl_pengajuan`.`nip` JOIN  `tbl_jenis_berkas` ON `tbl_berkas`.`id_jenis_berkas` = `tbl_jenis_berkas`.`id_jenis_berkas` 
                  OR `tbl_berkas`.`id_jenis_berkas` = 'SK1' OR `tbl_berkas`.`id_jenis_berkas` = 'SK2' AND `tbl_pengajuan`.`id_pengajuan` = '$id_pengajuan'
                ";
        return $this->db->query($query)->result_array();
    }

  

    public function save()
    {
        $post = $this->input->post();
        $this->id_cuti = $post["id_cuti"];
        $this->nip = $post["nip"];
        $this->perihal = $post["perihal"];
        $this->tempat = $post["tempat"];
        $this->lama = $post["lama"];
        $this->lampiran = $post["lampiran"];
        $this->id_jenis_pengajuan = ($post["id_jenis_pengajuan"] = 'JP4');
        $this->tanggal_pengajuan = time($post["tanggal_pengajuan"]);
        $this->penyetujuan = ($post['penyetujuan'] = 0);
        $this->db->insert($this->_table, $this);
    }


    function approve($id_cuti)
    {
        // $idkaryawan = $this->input->post('idkaryawan');
        $data = array(
            'penyetujuan' => '1'
        );  
        return $this->db->update('tbl_cuti', $data, array('id_cuti' => $id_cuti));
    }

    public function delete($idjp)
    {
        return $this->db->delete($this->_table, array("id_jenis_pengajuan" => $idjp));
    }
}
