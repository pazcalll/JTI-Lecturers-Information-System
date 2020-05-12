<!-- <?php var_dump($jabatan);?> -->
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
                            <input type="hidden" name="jabatanid" value="<?= $jabatan['JABATANID']?>">
                            <label for="jabatanid">Class ID</label>  
                            <input type="text" 
                            class="form-control" 
                            id="jabatanid" 
                            value="<?= $jabatan['JABATANID']?>" 
                            name="jabatanid">
                            <!-- <h4 class="form-control"><?=$jabatan['CLASSID']?></h4> -->
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jabatan_name" value="<?= $jabatan['JABATAN_NAME']?>">
                            <label for="jabatan_name">Class Name</label>  
                            <input type="text" 
                            id="jabatan_name" 
                            class="form-control" 
                            value="<?= $jabatan['JABATAN_NAME']?>" 
                            name="jabatan_name">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>