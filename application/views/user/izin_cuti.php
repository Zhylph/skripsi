        <!-- Begin Page Content -->
        <?php error_reporting(0); ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Pengajuan Izin Cuti</h1>

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
                           
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('user/izin_cuti'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->

                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nip" placeholder="ID" value="<?= ($_SESSION['nip']) ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                 <label for="tempat" class="col-sm-3 col-form-label">Perihal</label>
                                    <div class="col-sm-6">
                                         <input type="text" class="form-control" name="perihal" ></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                 <label for="jurusan" class="col-sm-3 col-form-label">Tempat</label>
                                    <div class="col-sm-6">
                                         <input type="text" class="form-control" name="tempat" ></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                 <label for="fakultas" class="col-sm-3 col-form-label">Lama Cuti</label>
                                    <div class="col-sm-6">
                                         <input type="text" class="form-control" name="lama" ></input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                 <label for="tahun" class="col-sm-3 col-form-label">Lampiran</label>
                                    <div class="col-sm-2">
                                         <input type="text" class="form-control" name="lampiran" ></input>
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