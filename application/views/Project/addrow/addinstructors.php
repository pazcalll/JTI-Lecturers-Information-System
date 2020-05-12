<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Add Instuctors Form</h5>
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
                            <label for="nama_kelas">Class Name</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
                        </div>
                        <div class="form-group">
                            <label for="nama_matkul">Subject Name</label>
                            <input type="text" class="form-control" id="nama_matkul" name="nama_matkul">
                        </div>
                        <div class="form-group">
                            <label for="sks">Credit</label>
                            <input type="number" class="form-control" id="sks" name="sks">
                        </div>
                        <div class="form-group">
                            <label for="kode_matkul">Subject Code</label>
                            <input type="text" class="form-control" id="kode_matkul" name="kode_matkul">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>