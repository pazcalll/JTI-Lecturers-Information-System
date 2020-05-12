<!-- <?php var_dump($bearer);?> -->
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Editing Form</h5>
                <div class="card-body">
                    <?php if (validation_errors()) {?>
                        <div class="alert alert-danger" aria-label="close">
                            <?= validation_errors();?>
                        </div>
                    <?php }?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="kode" value="<?= $bearer['KODE']?>">
                            <label for="kode">Kode</label>  
                            <!-- <input type="out" 
                            class="form-control" 
                            id="kode" 
                            value="<?= $bearer['KODE']?>" 
                            name="kode"> -->
                            <h4 class="form-control"><?=$bearer['KODE']?></h4>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jabatanid" value="<?= $bearer['JABATANID']?>">
                            <label for="jabatanid">Jabatan ID</label>  
                            <input type="text" 
                            id="jabatanid" 
                            class="form-control" 
                            value="<?= $bearer['JABATANID']?>" 
                            name="jabatanid">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="year" value="<?= base64_decode($bearer['YEAR'])?>">
                            <label for="year">Year</label>  
                            <input type="text" 
                            id="year" 
                            class="form-control" 
                            value="<?= $bearer['YEAR']?>" 
                            name="year">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>