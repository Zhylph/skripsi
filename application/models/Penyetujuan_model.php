<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Penyetujuan_model extends CI_Model
{
    private $_table = "tbl_penyesuaian";


    public $id_penyesuaian;
    public $nip;
    public $tempat;
    public $jurusan;
    public $fakultas;
    public $tahun;
    public $id_jenis_pengajuan;
    public $tanggal_pengajuan;
    public $penyetujuan;

    public function rules()
    {
        return [

            [
                'field' => 'tempat',
                'label' => 'Tempat Pendidikan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'jurusan',
                'label' => 'Jurusan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'fakultas',
                'label' => 'Fakultas',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'tahun',
                'label' => 'Tahun Pendidikan',
                'rules' => 'required|trim'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idp)
    {
        return $this->db->get_where($this->_table, ["id_penyesuaian" => $idp])->row();
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
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP4' AND `tbl_pengajuan`.`penyetujuan` = 0
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
        $this->id_penyesuaian = $post["id_penyesuaian"];
        $this->nip = $post["nip"];
        $this->tempat = $post["tempat"];
        $this->jurusan = $post["jurusan"];
        $this->fakultas = $post["fakultas"];
        $this->tahun = $post["tahun"];
        $this->id_jenis_pengajuan = ($post["id_jenis_pengajuan"] = 'JP5');
        $this->tanggal_pengajuan = time($post["tanggal_pengajuan"]);
        $this->penyetujuan = ($post['penyetujuan'] = 0);
        $this->db->insert($this->_table, $this);
    }


    function approve($id_penyesuaian)
    {
        // $idkaryawan = $this->input->post('idkaryawan');
        $data = array(
            'penyetujuan' => '1'
        );
        return $this->db->update('tbl_penyesuaian', $data, array('id_penyesuaian' => $id_penyesuaian));
    }

    public function delete($idjp)
    {
        return $this->db->delete($this->_table, array("id_jenis_pengajuan" => $idjp));
    }
}
