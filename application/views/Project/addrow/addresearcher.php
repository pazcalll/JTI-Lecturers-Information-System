<!-- <?php var_dump($res);?> -->
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Add Researcher Form</h5>
                <div class="card-body">
                    <?php if(validation_errors()):?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors()?>
                    </div>
                    <?php endif;?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode">
                        </div>
                        <div class="form-group">
                            <label for="rsid">Researcher ID</label>
                            <!-- <input type="number" class="form-control" id="rsid" name="rsid"> -->
                            <select class="form-control" name="rsid" id="rsid">
                                <?php foreach ($res as $key) {?>
                                    <option value="<?= $key['rsid']?>"><?= $key['rsid']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tingkat">Level</label>
                            <input type="text" class="form-control" id="tingkat" name="tingkat">
                            
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>