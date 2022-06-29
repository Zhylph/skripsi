        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Pengajuan Berkas</h1>

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
                        <div class="card-body">
                            <form action="<?= base_url('user/pengajuan'); ?>" method="post">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control" name="id_berkas">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control" name="nip" placeholder="ID" value="<?= ($_SESSION['nip']) ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Jenis Pengajuan</label>
                                    <div class="col-sm-4">
                                        <select name="id_jenis_pengajuan" id="id_jenis_pengajuan" class="form-control">
                                            <option value="">Pilih Jenis Pengajuan</option>
                                            <?php foreach ($jpengajuan as $jp) : ?>
                                                <option value="<?= $jp['id_jenis_pengajuan']; ?>"><?= $jp['jenis_pengajuan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="class row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->