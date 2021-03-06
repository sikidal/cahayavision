<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<base href="<?php echo base_url() ?>">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                        <th>NIK</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>No Telepon</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($p as $x) { ?>
                    <tr>
                        <td><?php echo $no++?>.</td>
                        <td><?php echo $x['nik']?></td>
                        <td><?php echo $x['nama']?></td>
                        <td><?php echo $x['address']?></td>
                        <td><?php echo $x['nama_kelurahan']?></td>
                        <td><?php echo $x['no_telp']?></td>
                        <td><?php if ($x['status'] == 1){
                            echo "Belum Terpasang";
                            }else if ($x['status'] == 2){
                                echo "Terpasang";
                            }else if ($x['status'] == 3){
                                echo "Tidak Terjangkau";
                            }else if ($x['status'] == 4){
                                echo "Non Aktif";  
                            }?>
                                
                                
                                </td>
                        
                        

                      
                    </tr>
                    <?php
                    } ?>
                </tbody>
    </table>
    <div class="float-md-left"><p>&nbsp&nbsp&nbsp&nbsp Belum Terpasang : <?php foreach($belum as $p) { ?> <?php echo $p['sum']?> <?php }?>
    <p>&nbsp&nbsp&nbsp&nbsp Terpasang : <?php foreach($sudah as $p) { ?> <?php echo $p['sum']?> <?php }?>
    <p>&nbsp&nbsp&nbsp&nbsp Belum Terjangkau : <?php foreach($tidak as $p) { ?> <?php echo $p['sum']?> <?php }?>
    <p>&nbsp&nbsp&nbsp&nbsp Non Aktif : <?php foreach($non as $p) { ?> <?php echo $p['sum']?> <?php }?></div>
    
    <div class="float-md-right"><strong><p> Pimpinan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></strong></div></br></br></br></br></br></br>
    <div class="float-md-right"><p><?php echo $this->fungsi->pimpinan()->name ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></div>