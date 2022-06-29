        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Tambah Data Pengajuan</h1>

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


                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('data/jenisberkas/') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('data/addjpengajuan'); ?>" method="post">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <div class="form-group row">
                                    <label for="id_jenis_berkas" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="id_jenis_pengajuan" placeholder="ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_berkas" class="col-sm-2 col-form-label">Jenis Pengajuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jenis_pengajuan" placeholder="Nama Jenis Pengajuan"></input>
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