    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelanggan</h6>
        </div>
        <div class="card-body">
            <div class="my-2">
                <a href="<?php echo site_url('pelanggan/') ?>" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-undo"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
            </div>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="ol col-lg-6">

                        <form action="" method="post">
                            <div class="form-group">
                                <label>NIK *</label>
                                <input type="hidden" name="pelanggan_id" value="<?= $row->pelanggan_id ?>">
                                <input type="text" name="nik" value="<?= $this->input->post('nik') ?? $row->nik ?>" class="form-control <?= form_error('nik') ? 'is-invalid' : null ?>">
                                <?= form_error('nik') ?>
                            </div>
                            <div class="form-group">
                                <label>Name *</label>
                                <input type="text" name="fullname" value="<?= $this->input->post('fullname') ?? $row->nama ?>" class="form-control <?= form_error('fullname') ? 'is-invalid' : null ?>">
                                <?= form_error('fullname') ?>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control"><?= $this->input->post('address') ?? $row->address ?></textarea>
                                <?= form_error('address') ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><small>Kelurahan : </small></label>
                                <select name="kelurahan_id" id="kelurahan_id" class="form-control selectpicker show-tick" data-live-search="true">
                                    <?php foreach ($kelurahan as $d) { ?>
                                        <?php if ($d['kelurahan_id'] == ($this->input->post('kelurahan_id') ?? $row->kelurahan_id)) { ?>
                                            <option value="<?php echo $d['kelurahan_id'] ?>" selected><?php echo $d['nama_kelurahan'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $d['kelurahan_id'] ?>"><?php echo $d['nama_kelurahan'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label>Telepon *</label>
                                <input type="text" name="telepon" value="<?= $this->input->post('telepon') ?? $row->no_telp ?>" class="form-control <?= form_error('telepon') ? 'is-invalid' : null ?>">
                                <?= form_error('telepon') ?>
                            </div>
                            <div class="form-group ">
                                <label>Username *</label>
                                <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>">
                                <?= form_error('username') ?>
                            </div>
                            <div class="form-group ">
                                <label>Password</label><small> (Biarkan kosong jika tidak diganti)</small>
                                <input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>">
                                <?= form_error('password') ?>
                            </div>
                            <div class="form-group ">
                                <label>Password Confirmation</label>
                                <input type="password" name="passconf" value="<?= $this->input->post('passconf') ?>" class="form-control <?= form_error('passconf') ? 'is-invalid' : null ?>">
                                <?= form_error('passconf') ?>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane"></i> Save
                                </button>
                                <button type="reset" class="btn btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->