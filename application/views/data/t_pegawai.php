        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Tambah Data Pegawai</h1>

            <div class="row">
                <div class="col-lg-8">

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('data/addpegawai'); ?>" method="post">
                        <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nip" placeholder="NIP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isi" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_pegawai" placeholder="Nama Lengkap"></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-2 col-form-label">Golongan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="golongan" placeholder="Golongan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="class row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->