<!-- <?php var_dump($classes);?> -->
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
                            <input type="hidden" name="classid" value="<?= $classes['CLASSID']?>">
                            <label for="classid">Class ID</label>  
                            <!-- <input type="out" 
                            class="form-control" 
                            id="kode" 
                            value="<?= $bearer['KODE']?>" 
                            name="kode"> -->
                            <h4 class="form-control"><?=$classes['CLASSID']?></h4>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="class_name" value="<?= $classes['CLASS_NAME']?>">
                            <label for="class_name">Class Name</label>  
                            <input type="text" 
                            id="class_name" 
                            class="form-control" 
                            value="<?= $classes['CLASS_NAME']?>" 
                            name="class_name">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="program_std" value="<?= $classes['PROGRAM_STD']?>">
                            <label for="program_std">Study Program</label>  
                            <input type="text" 
                            id="year" 
                            class="form-control" 
                            value="<?= $classes['PROGRAM_STD']?>" 
                            name="program_std">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>