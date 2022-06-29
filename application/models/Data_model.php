<?php defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    private $_table = "tbl_user";

    public $nip;
    public $nama_pegawai;
    public $golongan;
    public $jabatan;
    public $password;
    public $role_id;



    public function rules()
    {
        return [
            [
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'required|trim|numeric'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idpegawai)
    {
        return $this->db->get_where($this->_table, ["nip" => $idpegawai])->row();
    }

    public function getPeg()
    {
        $query = "SELECT * FROM tbl_user WHERE role_id = '2'
                ";
        return $this->db->query($query)->result_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nip = $post["nip"];
        $this->nama_pegawai = $post["nama_pegawai"];
        $this->golongan = $post["golongan"];
        $this->jabatan = $post["jabatan"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->role_id = ($post['role_id'] = 2);
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nip = $post["nip"];
        $this->nama_pegawai = $post["nama_pegawai"];
        $this->golongan = $post["golongan"];
        $this->jabatan = $post["jabatan"];
        $this->role_id = ($post['role_id'] = 2);
        $this->db->update($this->_table, $this, array('nip' => $post['nip']));
    }

    public function delete($idpegawai)
    {
        return $this->db->delete($this->_table, array("nip" => $idpegawai));
    }
}
