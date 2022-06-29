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
        			<a href="<?= base_url('data/addsmasuk'); ?>" class="btn btn-primary mb-3" data-toggle="" data-target=""><i class="fas fa-fw fa-plus"></i></a>
        		</div>
        		<div class="card-body">
        			<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        				<thead>
        					<tr>
        						<th>#</th>
        						<th>Nomor Surat</th>
        						<th>Perihal</th>
        						<th>Tanggal Surat</th>
        						<th>Tanggal Diterima</th>
        						<th>Asal Surat</th>
        						<th>Tujuan Surat</th>
        						<th>Action</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php $i = 1; ?>
        					<?php foreach ($smasuk as $sm) : ?>
        						<tr>
        							<th scope="row">
        								<?= $i; ?>
        							</th>
        							<td>
        								<?= $sm['no_surat']; ?>
        							</td>
        							<td>
        								<?= $sm['perihal']; ?>
        							</td>
        							<td>
        								<?= date('d F Y', strtotime($sm['tanggal_surat'])); ?>
        							</td>
        							<td>
        								<?= date('d F Y', strtotime($sm['tanggal_diterima'])); ?>
        							</td>
        							<td>
        								<?= $sm['asal_surat']; ?>
        							</td>
        							<td>
        								<?= $sm['tujuan_surat']; ?>
        							</td>
        							<td>
        								<a href="<?= base_url('upload/berkas/' . $sm['file_surat']) ?>" target="_blank" class="btn btn-small"><i class="fas fa-download"></i> </a>
        								<a href="<?php echo site_url('data/editsmasuk/' . $sm['id_surat_masuk']) ?>" class="btn btn-small"><i class="fas fa-edit"></i> </a>
        								<a onclick="deleteConfirm('<?php echo site_url('data/deletesmasuk/' . $sm['id_surat_masuk']) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a>
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