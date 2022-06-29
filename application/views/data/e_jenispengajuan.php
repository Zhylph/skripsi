        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit Data Jenis Pengajuan</h1>

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
                            <a href="<?php echo site_url('data/jenispengajuan/') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('data/editjpengajuan'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <input type="hidden" name="id_jenis_pengajuan" value="<?php echo $jenisp->id_jenis_pengajuan ?>" />

                                <div class="form-group">
                                    <label for="nama_berkas">Jenis Pengajuan</label>
                                    <input class="form-control <?php echo form_error('jenis_pengajuan') ? 'is-invalid' : '' ?>" type="text" name="jenis_pengajuan" value="<?php echo $jenisp->jenis_pengajuan ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jenis_pengajuan') ?>
                                    </div>
                                </div>
                                <input class="btn btn-facebook" type="submit" name="btn" value="Save" />
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->