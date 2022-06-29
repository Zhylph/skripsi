<?php

function is_logged_in() //function untuk memblok untuk orang yg tau link admin
{
    $ci = get_instance(); //untuk memanggil liblary CI, supaya bisa menggunakan seperti $this ($ci)
    if (!$ci->session->userdata('nip')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id'); //userdata('role_id') diambil dari session
        $menu = $ci->uri->segment(1); // untuk pemilihan segment bisa liat di dokumen website CI search 'segment'

        $queryMenu = $ci->db->get_where('tbl_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('tbl_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $result = $ci->db->get_where('tbl_access_menu', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
