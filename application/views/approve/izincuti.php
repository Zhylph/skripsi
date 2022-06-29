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
                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                        <thead>
                            <tr align="center">
                                <th>#</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                                <th>Perihal</th>
                                <th>Tempat</th>
                                <th>Lama Cuti</th>
                                <th>Lampiran </th>
                                <th>Tanggal Pengajuan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($cuti as $b) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i; ?>
                                    </th>
                                    <td>
                                        <?= $b['nip']; ?>
                                    </td>
                                    <td>
                                        <?= $b['nama_pegawai']; ?>
                                    </td>
                                    <td>
                                        <?= $b['golongan']; ?>
                                    </td>
                                    <td>
                                        <?= $b['jabatan']; ?>
                                    </td>
                                    <td>
                                        <?= $b['perihal']; ?>
                                    </td>
                                    <td>
                                        <?= $b['tempat']; ?>
                                    </td>
                                    <td>
                                        <?= $b['lama']; ?>
                                    </td>
                                    <td>
                                        <?= $b['lampiran']; ?>
                                    </td>
                                    <td>
                                        <?= date('d F Y', $b['tanggal_pengajuan']); ?>
                                    </td>
                                    <td align="center">
                                        <a href="<?php echo base_url('data/approve4/' . $b['id_cuti']) ?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                       <!-- <a href="<?php echo base_url('data/cetak_cuti/' . $b['nip']) ?>" class="btn btn-success btn-sm"><i class="fas fa-upload"></i></a> -->
                                        <a href="<?php echo base_url('data/pdfcuti/' . $b['id_cuti']) ?>" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
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