<?php defined('BASEPATH') or exit('No direct script access allowed');

class JBerkas_model extends CI_Model
{
    private $_table = "tbl_jenis_berkas";

    public $id_jenis_berkas;
    public $nama_berkas;


    public function rules()
    {
        return [
            [
                'field' => 'id_jenis_berkas',
                'label' => 'ID Berkas',
                'rules' => 'required|trim'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idjb)
    {
        return $this->db->get_where($this->_table, ["id_jenis_berkas" => $idjb])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_jenis_berkas = $post["id_jenis_berkas"];
        $this->nama_berkas = $post["nama_berkas"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jenis_berkas = $post["id_jenis_berkas"];
        $this->nama_berkas = $post["nama_berkas"];
        $this->db->update($this->_table, $this, array('id_jenis_berkas' => $post['id_jenis_berkas']));
    }

    public function delete($idjb)
    {
        return $this->db->delete($this->_table, array("id_jenis_berkas" => $idjb));
    }

    
}
