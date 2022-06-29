<?php defined('BASEPATH') or exit('No direct script access allowed');

class JSurat_model extends CI_Model
{
    private $_table = "tbl_jenis_surat";

    public $id_jenis_surat;
    public $jenis_surat;


    public function rules()
    {
        return [

            [
                'field' => 'jenis_surat',
                'label' => 'Jenis Surat',
                'rules' => 'required|trim'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idjs)
    {
        return $this->db->get_where($this->_table, ["id_jenis_surat" => $idjs])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_jenis_surat = $post["id_jenis_surat"];
        $this->jenis_surat = $post["jenis_surat"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jenis_surat = $post["id_jenis_surat"];
        $this->jenis_surat = $post["jenis_surat"];
        $this->db->update($this->_table, $this, array('id_jenis_surat' => $post['id_jenis_surat']));
    }

    public function delete($idjs)
    {
        return $this->db->delete($this->_table, array("id_jenis_surat" => $idjs));
    }
}
