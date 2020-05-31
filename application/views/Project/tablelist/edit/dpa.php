<!-- <?php var_dump($dpa);?> -->
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
                            <input type="hidden" name="classid" value="<?= $dpa['CLASSID']?>">
                            <label for="classid">Class ID</label>  
                            <input type="text" 
                            class="form-control" style="pointer-events: none;" 
                            id="classid" 
                            value="<?= $dpa['CLASSID']?>" 
                            name="classid">
                            <!-- <h4 class="form-control"><?=$dpa['CLASSID']?></h4> -->
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="kode" value="<?= $dpa['KODE']?>">
                            <label for="kode">KODE</label>  
                            <input type="text" 
                            id="kode" 
                            class="form-control" 
                            value="<?= $dpa['KODE']?>" 
                            name="kode">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="year" value="<?= $dpa['YEAR']?>">
                            <label for="year">Year</label>  
                            <input type="text" 
                            id="year" 
                            class="form-control" 
                            value="<?= $dpa['YEAR']?>" 
                            name="year">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>