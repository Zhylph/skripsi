        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit Data Surat Masuk</h1>

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
                            <a href="<?php echo site_url('data/suratmasuk') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('data/editsmasuk'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <input type="hidden" name="id_surat_masuk" value="<?php echo $smasuk->id_surat_masuk ?>" readonly />

                                <div class="form-group">
                                    <label for="no_surat">No. Surat</label>
                                    <input class="form-control col-sm-4 <?php echo form_error('no_surat') ? 'is-invalid' : '' ?>" type="text" name="no_surat" value="<?php echo $smasuk->no_surat ?>" readonly/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('no_surat') ?>
                                    </div>
                                </div>
                                <input type="hidden" name="id_jenis_surat" value="<?php echo $smasuk->id_jenis_surat ?>" readonly />
                                <div class="form-group">
                                    <label for="perihal">Perihal Surat</label>
                                    <input class="form-control col-sm-6 <?php echo form_error('perihal') ? 'is-invalid' : '' ?>" type="text" name="perihal" value="<?php echo $smasuk->perihal ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('perihal') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_surat">Tanggal Surat</label>
                                    <input class="form-control col-sm-4 <?php echo form_error('tanggal_surat') ? 'is-invalid' : '' ?>" type="date" name="tanggal_surat" value="<?php echo $smasuk->tanggal_surat ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggal_surat') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_diterima">Tanggal Diterima</label>
                                    <input class="form-control col-sm-4 <?php echo form_error('tanggal_diterima') ? 'is-invalid' : '' ?>" type="date" name="tanggal_diterima" value="<?php echo $smasuk->tanggal_diterima ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggal_diterima') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="asal_surat">Asal Surat</label>
                                    <input class="form-control col-sm-8 <?php echo form_error('asal_surat') ? 'is-invalid' : '' ?>" type="text" name="asal_surat" value="<?php echo $smasuk->asal_surat ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('asal_surat') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tujuan_surat">Tujuan Surat</label>
                                    <input class="form-control col-sm-8 <?php echo form_error('tujuan_surat') ? 'is-invalid' : '' ?>" type="text" name="tujuan_surat" value="<?php echo $smasuk->tujuan_surat ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tujuan_surat') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file_surat" class="col-form-label">File Surat</label>
                                    <div>
                                        <div class="custom-file">
                                            <input class="file-input" <?php echo form_error('file_surat') ? 'is-invalid' : '' ?> type="file" name="file_surat" />
                                            <input type="hidden" name="old_file" value="<?php echo $smasuk->file_surat ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('file_surat') ?>
                                                <label class="custom-file-label" for="file_surat">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-facebook" type="submit" name="btn" value="Save" />
                            </form>
                        </div>
                    </div>

                    #File Tidak Boleh Lebih dari 5 mb
                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
        <!-- End of Main Content -->