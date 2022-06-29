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
        			<a href="<?= base_url('data/addskeluar'); ?>" class="btn btn-primary mb-3" data-toggle="" data-target=""><i class="fas fa-fw fa-plus"></i></a>
        		</div>
        		<div class="card-body">
        			<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        				<thead>
        					<tr>
        						<th>#</th>
        						<th>Nomor Surat</th>
        						<th>Klasifikasi</th>
        						<th>Lampiran</th>
        						<th>Perihal</th>
        						<th>Tujuan Surat</th>
        						<th>Tanggal Surat</th>
        						<th>Action</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php $i = 1; ?>
        					<?php foreach ($skeluar as $sk) : ?>
        						<tr>
        							<th scope="row">
        								<?= $i; ?>
        							</th>
        							<td>
        								<?= $sk['no_surat']; ?>
        							</td>
        							<td>
        								<?= $sk['klasifikasi']; ?>
									</td>
									<td>
        								<?= $sk['lampiran']; ?>
									</td>
									<td>
        								<?= $sk['perihal']; ?>
									</td>
									<td>
        								<?= $sk['tujuan_surat']; ?>
        							</td>
        							<td>
        								<?= date('d F Y', strtotime($sk['tanggal_surat'])); ?>
        							</td>
        							
        							<td>
										<a href="<?php echo base_url('data/pdfsk/' . $sk['id_surat_keluar']) ?>" class="btn btn-sm"><i class="fas fa-print"></i></a>
										<a href="<?php echo site_url('data/editskeluar/' . $sk['id_surat_keluar']) ?>" class="btn btn-small"><i class="fas fa-edit"></i> </a>
        								<a onclick="deleteConfirm('<?php echo site_url('data/deleteskeluar/' . $sk['id_surat_keluar']) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a>
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