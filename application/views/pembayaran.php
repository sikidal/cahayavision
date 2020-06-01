    <!-- Page Heading -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
            </div>
                 <div class="card-body">
                 <div class="my-2">
                    <a href="<?php echo site_url('user/') ?>" class="btn btn-warning btn-icon-split">
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
                                <label>Name *</label>
                                <input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control <?=form_error('fullname')? 'is-invalid' : null?>">
                                <?=form_error('fullname')?>
                            </div>
                            <div class="form-group ">
                                <label>Username *</label>
                                <input type="text" name="username" value="<?=set_value('username')?>"class="form-control <?=form_error('username')? 'is-invalid' : null?>">
                                <?=form_error('username')?>
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