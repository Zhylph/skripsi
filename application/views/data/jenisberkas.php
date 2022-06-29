        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <div class="card mb-3">
                <div class="card-header">
                    <a href="<?= base_url('data/addjberkas'); ?>" class="btn btn-primary mb-3" data-toggle="" data-target=""><i class="fas fa-fw fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Berkas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jenisb as $jb) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i; ?>
                                    </th>
                                    <td>
                                        <?php echo $jb->nama_berkas ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('data/editjberkas/' . $jb->id_jenis_berkas) ?>" class="btn btn-small"><i class="fas fa-edit"></i> </a>
                                        <a onclick="deleteConfirm('<?php echo site_url('data/deletejberkas/' . $jb->id_jenis_berkas) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a>
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