    <!-- Page Heading -->
 <?php $this->view('message') ?>
    
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
            </div>
                 <div class="card-body">
                 <div class="my-2">
                    <a href="<?php echo site_url('pembayaran/add') ?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                    </a>
                </div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                         <thead>
                         <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>&nbsp&nbsp Tagihan &nbsp&nbsp&nbsp&nbsp</th>
                                <th>Actions</th>
                         </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row->result()as $key =>$data) { ?>
                    <tr>
                        <td><?php echo $no++?>.</td>
                        <td><?php echo  $data->nama?></td>
                        
                        <td><?php echo $data->tanggal_pembayaran?></td>
                        <td><img src="<?= base_url('uploads/'.$data->image) ?>"width="64"></td>
                        <td>
                        <?php if($data->status_bayar == 1) {
				                echo "Belum Bayar";
                        }elseif($data->status_bayar == 2) {
                        echo "Menunggu Konfirmasi";
                        }elseif($data->status_bayar == 3) {
                        echo "Lunas";
				        }?>

                        </td>
                        <?php
                                if (empty($data->tanggal_tagihan)){
                                    $waktuawal  = date_create($data->tanggal_pemasangan);
                                }else{
                                   $waktuawal  = date_create($data->tanggal_tagihan);
                                } 

                                 //waktu di setting
                                $waktuakhir = date_create(); // waktu sekarang

                                $diff  = date_diff($waktuawal, $waktuakhir);?>
                                <?php if ($diff->m == 0){
                                    $total = $data->jumlah_tv * 50000;
                                }else{
                                    $total = ($data->jumlah_tv * 50000 * $diff->m)+( $diff->m * $data->denda);
                                }?>
                        <td>
                        
                        <?php echo "Rp. " . number_format($total, 0, ".", ".");  ?>
                        </td>
                        
                        <td class="text-center" width="160px">
                            <form action="<?php echo site_url('pembayaran/del')?>"method="post">
                                <a href="<?php echo site_url('pembayaran/edit/'.$data->pembayaran_id) ?>" class="btn btn-primary btn-circle btn-sm">
                                <i class="fas fa-edit"></i> 
                                </a>
                            
                                <a href="<?php echo site_url('pembayaran/del/'.$data->pembayaran_id)?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    <?php
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
    </div>
</div>
<!-- /.container-fluid -->