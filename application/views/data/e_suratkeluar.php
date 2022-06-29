        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit Data Surat Keluar</h1>

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
                            <a href="<?php echo site_url('data/suratkeluar') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('data/editskeluar'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <input type="hidden" name="id_surat_keluar" value="<?php echo $skeluar->id_surat_keluar ?>" readonly />

                                <div class="form-group">
                                    <label for="no_surat">No. Surat</label>
                                    <input class="form-control col-sm-4 <?php echo form_error('no_surat') ? 'is-invalid' : '' ?>" type="text" name="no_surat" value="<?php echo $skeluar->no_surat ?>" readonly />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('no_surat') ?>
                                    </div>
                                </div>
                                <input type="hidden" name="id_jenis_surat" value="<?php echo $skeluar->id_jenis_surat ?>" readonly />
                                <div class="form-group">
                                    <label for="perihal">Perihal Surat</label>
                                    <input class="form-control col-sm-6 <?php echo form_error('perihal') ? 'is-invalid' : '' ?>" type="text" name="perihal" value="<?php echo $skeluar->perihal ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('perihal') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="klasifikasi">Klasifikasi Surat</label>
                                    <input class="form-control col-sm-6 <?php echo form_error('klasifikasi') ? 'is-invalid' : '' ?>" type="text" name="klasifikasi" value="<?php echo $skeluar->klasifikasi ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('klasifikasi') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lampiran">Lampiran Surat</label>
                                    <input class="form-control col-sm-6 <?php echo form_error('lampiran') ? 'is-invalid' : '' ?>" type="text" name="lampiran" value="<?php echo $skeluar->lampiran ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('lampiran') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="isi">Isi Surat</label>
                                    <input class="form-control col-sm-8  <?php echo form_error('isi') ? 'is-invalid' : '' ?>" type="textarea" name="isi" value="<?php echo $skeluar->isi ?>" >
                                    <div class="invalid-feedback">
                                        <?php echo form_error('isi') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_surat">Tanggal Surat</label>
                                    <input class="form-control col-sm-4 <?php echo form_error('tanggal_surat') ? 'is-invalid' : '' ?>" type="date" name="tanggal_surat" value="<?php echo $skeluar->tanggal_surat ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggal_surat') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tujuan_surat">Tujuan Surat</label>
                                    <input class="form-control col-sm-8 <?php echo form_error('tujuan_surat') ? 'is-invalid' : '' ?>" type="text" name="tujuan_surat" value="<?php echo $skeluar->tujuan_surat ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tujuan_surat') ?>
                                    </div>
                                </div>
                                <input class="btn btn-facebook" type="submit" name="btn" value="Save" />
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
        <!-- End of Main Content -->