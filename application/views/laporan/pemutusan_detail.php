<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<base href="<?php echo base_url() ?>">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body onload="print()">
	<center>
		<table>
			<tr>
				<td>
					<img src="<?php echo base_url('assets/') ?>/img/logo-mu.png" style="width: 100px; height: 100px;">
				</td>
				<td>
					<center>
						<h3>PT. Cahaya MU Vision</h3>
					<h5>Jl.Sungai Andai No.07 RT.27 Telepon/Fax(0511)3301345 , (0511)6263302 Banjarmasin, 70122</h5>
					</center>
				</td>
			</tr>
		</table>
		<h4><?php echo strtoupper($title); ?></h4>
	</center>
    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Keluhan</th>
                        <th>Telepon</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Teknisi</th>
                        <th>Status Pelanggan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($p as $x) { ?>
                    <tr>
                        <td><?php echo $no++?>.</td>
                        <td><?php echo $x['nama']?></td>
                        <td><?php echo $x['alasan_pemutusan']?></td>
                        <td><?php echo $x['no_telp']?></td>
                        <td><?php echo $x['tanggal_pemutusan']?></td>
                        <td><?php echo $x['nama_teknisi']?></td>
                       
                        <td>
                        <?php if ($x['status'] == 1) {
                          echo "Tidak Aktif";
                        } elseif ($x['status'] == 2) {
                          echo "Aktif";
                        } elseif ($x['status'] == 3) {
                          echo "Tidak terjangkau";
                        } ?>

                      </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
    </table>