<div class="box">
        <div class="box-body">
                <div class="btn-group">

                <a href="<?php echo base_url('data/approve5/' . $b['id_penyesuaian']) ?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                <a href="<?php echo base_url('data/cetakkartu').$kartu[0]['kode_pasien'];?>"/>
                  <button class="btn-success btn">
                    Cetak</button>
                    </a>

                </div>
                <br>
                <br>
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">



                    <?php
                    if(isset($kartu)){
                        $no=0; foreach ($kartu as $isi): $no++;
                            # code...

                    ?>  

                    <tr>
                    <td>Kode Pasien</td>
                    <td><?php echo $isi->kode_pasien?></td>
                    </tr>
                    <tr>
                    <td>Nama Pasien</td>
                    <td><?php echo $isi->nama_pasien?></td>
                    </tr>
                    <tr>
                    <td>Email Pasien</td>
                    <td><?php echo $isi->email_pasien?></td>
                    </tr>
                    <tr>
                    <td>Alamat Pasien</td>
                    <td><?php echo $isi->alamat_pasien?></td>
                    </tr>
                    <tr>
                    <td>Tanggal Lahir</td>
                    <td><?php echo $isi->tanggal_lahir?></td>
                    </tr>
                    <tr>
                    <td>Umur</td>
                    <td><?php echo $isi->umur?></td>
                    </tr>
                    <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $isi->kode_jk?></td>
                    </tr>
                    <tr>
                    <td>No. Telp</td>
                    <td><?php echo $isi->no_telp?></td>
                    </tr>

                <?php endforeach;}?>

                </table>

                </div>
        </div>
        </div>