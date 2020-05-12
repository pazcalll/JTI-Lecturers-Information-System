<!-- <?php var_dump($subjects);?> -->
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
                            <input type="hidden" name="nama_matkul" value="<?= $subjects['nama_matkul']?>">
                            <label for="nama_matkul">Subject Name</label>  
                            <input type="text" 
                            class="form-control" 
                            id="nama_matkul" 
                            value="<?= $subjects['nama_matkul']?>" 
                            name="nama_matkul">
                            <!-- <h4 class="form-control"><?=$subjects['CLASSID']?></h4> -->
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="kode_matkul" value="<?= $subjects['kode_matkul']?>">
                            <label for="kode_matkul">Subject Code</label>  
                            <input type="text" 
                            id="kode_matkul" 
                            class="form-control" 
                            value="<?= $subjects['kode_matkul']?>" 
                            name="kode_matkul">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="prodi" value="<?= $subjects['prodi']?>">
                            <label for="prodi">Study Program</label>  
                            <input type="text" 
                            id="prodi" 
                            class="form-control" 
                            value="<?= $subjects['prodi']?>" 
                            name="prodi">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="tingkat" value="<?= $subjects['tingkat']?>">
                            <label for="tingkat">Level</label>  
                            <input type="text" 
                            id="tingkat" 
                            class="form-control" 
                            value="<?= $subjects['tingkat']?>" 
                            name="tingkat">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="semester" value="<?= $subjects['semester']?>">
                            <label for="semester">Semester</label>  
                            <input type="text" 
                            id="semester" 
                            class="form-control" 
                            value="<?= $subjects['semester']?>" 
                            name="semester">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="sks" value="<?= $subjects['SKS']?>">
                            <label for="sks">Credit</label>  
                            <input type="text" 
                            id="sks" 
                            class="form-control" 
                            value="<?= $subjects['SKS']?>" 
                            name="sks">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jam" value="<?= $subjects['jam']?>">
                            <label for="jam">Hours</label>  
                            <input type="text" 
                            id="jam" 
                            class="form-control" 
                            value="<?= $subjects['jam']?>" 
                            name="jam">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>