<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Add Jabatan Form</h5>
                <div class="card-body">
                    <?php if(validation_errors()):?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors()?>
                    </div>
                    <?php endif;?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="jabatanid">Jabatan ID</label>
                            <input type="number" class="form-control" id="jabatanid" name="jabatanid">
                        </div>
                        <div class="form-group">
                            <label for="jabatan_name">Jabatan Name</label>
                            <input type="text" class="form-control" id="jabatan_name" name="jabatan_name">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>