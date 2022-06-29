<!DOCTYPE html>
<html><head>
    <title></title>
            <style type="text/css">


           .disp {
                float: right;
                text-align: center;
                padding: 1.5rem 0;
                margin-bottom: .5rem;
            }
            .logo {
                float: left;
                position: relative;
                width: 110px;
                height: 110px;
                margin: 0 0 0 1rem;
            }

            .status {
                font-size: 17px!important;
                font-weight: normal;
                margin-bottom: -.1rem;
                }

            .disp {
                float: right;
                text-align: center;
                margin: -.5rem 0;
                }

            .logo {
                float: left;
                position: relative;
                width: 50px;
                height: 50px;
                margin: .5rem 0 0 .5rem;
                }

            .up {
                text-transform: uppercase;
                margin: 0;
                line-height: 1.5rem;
                font-size: 1.5rem;
                }

            .status {
                margin: 0;
                font-size: 1.3rem;
                margin-bottom: .5rem;
                }

            #alamat {
                margin-top: -15px;
                font-size: 13px;
                }

            i {
                color: blue;
            }

            #alamat {
                font-size: 16px;
                }

            .separator {
                border-bottom: 2px solid #616161;
                margin: -1.3rem 0 1.5rem;
                border-color: rgb(0,0,0);
                }

            #lead {
                width: auto;
                position: relative;
                margin: 25px 0 0 60%;
            }
            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }

        </style>
</head><body>

        <div class="disp">
            <img class="logo" src="./assets/kominfo.png">
            <h6 class="up">PEMERINTAH KABUPATEN BARITO KUALA</h6>
            <h5 class="up" id="nama">DINAS KOMUNIKASI DAN INFORMATIKA</h5>
            <span id="alamat">JL. Jendral Sudirman Komp. Perkantoran No. 74 Marabahan Kabupaten Barito Kuala</span>
            <h6 class="status">Telp :(0511)6701895 Fax :(0511)6701255 <i>, e-mail : diskominfo@baritokualakab.go.id</i></h6>
            <div class="separator"></div>
        </div>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Bidang</th>
            <th>Judul Dokumen</th>
            <th>Penjelasan Singkat</th>
            <th>Tanggal Unggah</th>
            <th>Nama File</th>
        </tr>

        <?php
        $no = 1;
        foreach ($rfk1 as $f1) : ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $f1['nama_bidang']; ?></td>
                <td><?= $f1['jdl_file']; ?></td>
                <td><?= $f1['penj_sing']; ?></td>
                <td><?= $f1['tgl_upld']; ?></td>
                <td><?= $f1['file_upld']; ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

        <div id="lead">
                <p align="center">Kepala Dinas</p>
            <div style="height: 50px;"></div>

                    <p class="lead" align="center">AHMAD WAHYUNI,S.Sos,M.IP</p>
                    <p align="center">NIP. 19650501 198602 1 007</p>

            </div>
        </div>

</body></html>