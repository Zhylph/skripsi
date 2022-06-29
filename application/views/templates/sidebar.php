    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src='' alt="" width="80%" class="img img-responsive"> </div>
            <div class="sidebar-brand-text mx-3">DISKOMINFO </div>

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">


        <!--Query menu-->
        <?php /* perhatikan tanda (') beda dengan (`) */
        $role_id = $this->session->userdata('role_id'); /* 4. mmengambil data role_id yg ada di session */
        $queryMenu = "SELECT `tbl_menu`.`id`, `menu` /* 1. pilihan untuk di join kan */
                        FROM `tbl_menu` JOIN `tbl_access_menu` /*2.  tabel user_menu menjoin ke user_access_menu */
                          ON `tbl_menu`.`id` = `tbl_access_menu`.`menu_id` /* 3. mengunci user_menu.id (primary key) dengan user_accers_menu_id.menu_id(foreign key) */
                       WHERE `tbl_access_menu`.`role_id` = $role_id /* 5. sesuai dengan role_id yg ada di session  */
                    ORDER BY `tbl_access_menu`.`menu_id` ASC /* 6. mengurutkan sesuai menu_id dari angka terendah dari atas */ 
                      ";
        $menu = $this->db->query($queryMenu)->result_array();
        //var_dump($menu);
        //die
        ?>

        <!-- LOOPING menu -->
        <?php foreach ($menu as $m) : ?>
            <div class="sidebar-heading">
                <?= $m['menu']; ?>
            </div>

            <!-- SIAPKAN SUB-MENU SESUAI MENU-->
            <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT * /* tanda bintang untuk menampilkan semua */
                               FROM `tbl_sub_menu` JOIN `tbl_menu`
                                 ON `tbl_sub_menu`.`menu_id` = `tbl_menu`.`id`
                              WHERE `tbl_sub_menu`.`menu_id` = $menuId
                                AND `tbl_sub_menu`.`is_active` = 1
                            ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <?php foreach ($subMenu as $sm) : ?>

                <!--validasi untuk warna aktif saat di klik-->
                <?php if ($title == $sm['title']) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>

                    <!--akhir validasi-->

                    <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span><?= $sm['title']; ?></span></a>
                    </li>
                <?php endforeach; ?>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

            <?php endforeach; ?>





            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

    </ul>
    <!-- End of Sidebar -->