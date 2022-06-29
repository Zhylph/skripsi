        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit Data Berkas</h1>

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
                            <a href="<?php echo site_url('user/upberkas') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('user/editberkas'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <input type="hidden" name="id_berkas" value="<?php echo $berkas->id_berkas ?>" readonly />
                                <input type="hidden" name="nip" value="<?php echo $berkas->nip ?>" readonly />

                                <div class="form-group row">
                                    <label for="nip" class="col-sm-2 col-form-label">Nama Berkas</label>
                                    <div class="col-sm-4">
                                        <select name="id_jenis_berkas" id="id_jenis_berkas" class="form-control">
                                            <option value="">Nama Berkas</option>
                                            <?php foreach ($jberkas as $b) : ?>
                                                <option value="<?= $b['id_jenis_berkas']; ?>"><?= $b['nama_berkas']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-2 col-form-label">Jenis Pengajuan</label>
                                    <div class="col-sm-4">
                                        <select name="id_jenis_pengajuan" id="id_jenis_pengajuan" class="form-control">
                                            <option value="">Jenis pengajuan</option>
                                            <?php foreach ($jpengajuan as $b) : ?>
                                                <option value="<?= $b['id_jenis_pengajuan']; ?>"><?= $b['jenis_pengajuan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file_berkas" class="col-sm-2 col-form-label">Berkas</label>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input class="file-input" <?php echo form_error('file_berkas') ? 'is-invalid' : '' ?> type="file" name="file_berkas" />
                                            <input type="hidden" name="old_file" value="<?php echo $berkas->file_berkas ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('file_berkas') ?>
                                                <label class="custom-file-label" for="file_berkas">Pilih file</label>
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