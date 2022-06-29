        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800">Berkas Pengajuan</h1>

        	<?php if ($this->session->flashdata('success')) : ?>
        		<div class="alert alert-success" role="alert">
        			<?php echo $this->session->flashdata('success'); ?>
        		</div>
        	<?php endif; ?>

        	<div class="card mb-3">

        		<div class="card-body">
        			<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        				<thead>
        					<tr>
        						<th>#</th>
        						<th>NIP</th>
        						<th>Nama Berkas</th>
        						<th>Tanggal Upload</th>
        						<th>Action</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php $i = 1; ?>
        					<?php foreach ($pengajuan as $b) : ?>
        						<tr>
        							<th scope="row">
        								<?= $i; ?>
        							</th>
        							<td>
        								<?= $b['nip']; ?>
        							</td>
        							<td>
        								<?= $b['file_berkas']; ?>
        							</td>
        							<td>
        								<?= tanggal('d F Y', $b['tanggal_upload']); ?>
        							</td>
        							<td>
        								<a href="<?= base_url('upload/berkas/' . $b['file_berkas']) ?>" target="_blank" class="btn btn-small"><i class="fas fa-download"></i> </a>
        								<a onclick="deleteConfirm('<?php echo site_url('data/deleteberkas/' . $b['id_berkas']) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a>
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