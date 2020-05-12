<!-- <?php var_dump($researcher);?> -->
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
                            <input type="hidden" name="kode" value="<?= $researcher['KODE']?>">
                            <label for="kode">Kode</label>  
                            <input type="text" 
                            class="form-control" 
                            id="kode" 
                            value="<?= $researcher['KODE']?>" 
                            name="kode">
                            <!-- <h4 class="form-control"><?=$researcher['CLASSID']?></h4> -->
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="rsid" value="<?= $researcher['RSID']?>">
                            <label for="rsid">Research ID</label>  
                            <input type="number" 
                            id="rsid" 
                            class="form-control" 
                            value="<?= $researcher['RSID']?>" 
                            name="rsid">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="tingkat" value="<?= $researcher['TINGKAT']?>">
                            <label for="tingkat">Level</label>  
                            <input type="text" 
                            id="tingkat" 
                            class="form-control" 
                            value="<?= $researcher['TINGKAT']?>" 
                            name="tingkat">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>