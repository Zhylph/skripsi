        <!-- Begin Page Content -->
        <?php error_reporting(0); ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Tambah Data Surat Masuk</h1>

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
                            <form action="<?= base_url('data/addsmasuk'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->

                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nomor Surat</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat">
                                    </div>
                                </div>
                              <!--  <div class="form-group row">
                                    <label for="nip" class="col-sm-2 col-form-label">Jenis Surat</label>
                                    <div class="col-sm-4">
                                        <select name="id_jenis_surat" id="id_jenis_surat" class="form-control">
                                            <option value="">Jenis Surat</option>
                                            <?php foreach ($jsurat as $js) : ?>
                                                <option value="<?= $js['id_jenis_surat']; ?>"><?= $js['jenis_surat']; ?></option>
                                            <?php endforeach; ?>
                                            <?= form_error('jenis_surat', '<small class="text-danger pl-3">', '</small>'); ?></small>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label for="perihal" class="col-sm-2 col-form-label">Perihal Surat</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="perihal" placeholder="Perihal Surat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tanggal_surat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_diterima" class="col-sm-2 col-form-label">Tanggal Diterima</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tanggal_diterima">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="asal_surat" class="col-sm-2 col-form-label">Asal Surat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="asal_surat" placeholder="Asal Surat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tujuan_surat" class="col-sm-2 col-form-label">Tujuan Surat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tujuan_surat" placeholder="Tujuan Surat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file_surat" class="col-sm-2 col-form-label">File Surat</label>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_surat" name="file_surat">
                                            <label class="custom-file-label" for="image">Pilih file</label>
                                            <?= form_error('file_surat', '<small class="text-danger pl-3">', '</small>'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="class row">
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
        </div>
        <!-- End of Main Content -->