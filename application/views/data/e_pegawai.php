        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit Data Pegawai</h1>

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
                            <a href="<?php echo site_url('data') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('data/editpeg/'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <input type="hidden" name="nip" value="<?php echo $peg->nip ?>" readonly />

                                <div class="form-group">
                                    <label for="nama_berkas">Nama Pegawai</label>
                                    <input class="form-control <?php echo form_error('nama_pegawai') ? 'is-invalid' : '' ?>" type="text" name="nama_pegawai" value="<?php echo $peg->nama_pegawai ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_pegawai') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="golongan">Golongan</label>
                                    <input class="form-control <?php echo form_error('golongan') ? 'is-invalid' : '' ?>" type="text" name="golongan" value="<?php echo $peg->golongan ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('golongan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input class="form-control <?php echo form_error('jabatan') ? 'is-invalid' : '' ?>" type="text" name="jabatan" value="<?php echo $peg->jabatan ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jabatan') ?>
                                    </div>
                                    <input type="hidden" name="password" value="<?php echo $peg->nip ?>" readonly />
                                </div>

                                <input class="btn btn-facebook" type="submit" name="btn" value="Save" />
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->