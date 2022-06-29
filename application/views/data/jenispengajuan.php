        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg-6">

                    <?= form_error('jenisb', '<div class="alert alert-danger" role="alert">', '</div>') ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="<?= base_url('data/addjpengajuan'); ?>" class="btn btn-primary mb-3" data-toggle="" data-target=""><i class="fas fa-fw fa-plus"></i></a>
                    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Jenis Pengajuan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jenisp as $jp) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td>
                                        <?php echo $jp->jenis_pengajuan ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('data/editjpengajuan/' . $jp->id_jenis_pengajuan) ?>" class="btn btn-small"><i class="fas fa-edit"></i> </a>
                                        <a onclick="deleteConfirm('<?php echo site_url('data/deletejpengajuan/' . $jp->id_jenis_pengajuan) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>