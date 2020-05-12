<!-- <?php var_dump($research);?> -->
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
                            <input type="hidden" name="rs_name" value="<?= $research['RS_NAME']?>">
                            <label for="rs_name">Research Name</label>  
                            <input type="text" 
                            class="form-control" 
                            id="rs_name" 
                            value="<?= $research['RS_NAME']?>" 
                            name="rs_name">
                            <!-- <h4 class="form-control"><?=$research['CLASSID']?></h4> -->
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="rsid" value="<?= $research['RSID']?>">
                            <label for="rsid">Research ID</label>  
                            <input type="text" 
                            id="rsid" 
                            class="form-control" 
                            value="<?= $research['RSID']?>" 
                            name="rsid">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>