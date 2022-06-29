<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubmenu()
    {
        $query = "SELECT `tbl_sub_menu`.*, `tbl_menu`.`menu`
                  FROM `tbl_sub_menu` JOIN `tbl_menu`
                  ON `tbl_sub_menu`.`menu_id` = `tbl_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
}
