<?php defined('BASEPATH') or exit('No direct script access allowed');

class JPengajuan_model extends CI_Model
{
    private $_table = "tbl_jenis_pengajuan";

    public $id_jenis_pengajuan;
    public $jenis_pengajuan;


    public function rules()
    {
        return [
            [
                'field' => 'id_jenis_pengajuan',
                'label' => 'ID',
                'rules' => 'required|trim'
            ]
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idjp)
    {
        return $this->db->get_where($this->_table, ["id_jenis_pengajuan" => $idjp])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_jenis_pengajuan = $post["id_jenis_pengajuan"];
        $this->jenis_pengajuan = $post["jenis_pengajuan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jenis_pengajuan = $post["id_jenis_pengajuan"];
        $this->jenis_pengajuan = $post["jenis_pengajuan"];
        $this->db->update($this->_table, $this, array('id_jenis_pengajuan' => $post['id_jenis_pengajuan']));
    }

    public function delete($idjp)
    {
        return $this->db->delete($this->_table, array("id_jenis_pengajuan" => $idjp));
    }
}
