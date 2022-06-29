        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg-12">

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?= base_url('data/addpegawai'); ?>" class="btn btn-dark mb-3" data-toggle="" data-target=""><i class="fas fa-fw fa-plus"></i></a>

                    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pegawai as $p) : ?>
                                <tr>
                                    <td>
                                        <?php echo $p['nip'] ?>
                                    </td>
                                    <td>
                                        <?php echo $p['nama_pegawai'] ?>
                                    </td>
                                    <td>
                                        <?php echo $p['golongan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $p['jabatan'] ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('data/editpeg/' . $p['nip']) ?>" class="btn btn-small"><i class="fas fa-edit"></i> </a>
                                        <a onclick="deleteConfirm('<?php echo site_url('data/deletepegawai/' . $p['nip']) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>