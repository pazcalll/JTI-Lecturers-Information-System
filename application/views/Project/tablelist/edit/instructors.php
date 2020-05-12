<!-- <?php var_dump($instructors);?> -->
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
                            <input type="hidden" name="kode" value="<?= $instructors['KODE']?>">
                            <label for="kode">Kode</label>  
                            <input type="text" 
                            class="form-control" 
                            id="kode" 
                            value="<?= $instructors['KODE']?>" 
                            name="kode">
                            <!-- <h4 class="form-control"><?=$instructors['CLASSID']?></h4> -->
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="nama_kelas" value="<?= $instructors['nama_kelas']?>">
                            <label for="nama_kelas">Class Name</label>  
                            <input type="text" 
                            id="nama_kelas" 
                            class="form-control" 
                            value="<?= $instructors['nama_kelas']?>" 
                            name="nama_kelas">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="nama_matkul" value="<?= $instructors['nama_matkul']?>">
                            <label for="nama_matkul">Subject Name</label>  
                            <input type="text" 
                            id="nama_matkul" 
                            class="form-control" 
                            value="<?= $instructors['nama_matkul']?>" 
                            name="nama_matkul">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="sks" value="<?= $instructors['SKS']?>">
                            <label for="sks">Credit</label>  
                            <input type="text" 
                            id="sks" 
                            class="form-control" 
                            value="<?= $instructors['SKS']?>" 
                            name="sks">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="kode_matkul" value="<?= $instructors['kode_matkul']?>">
                            <label for="kode_matkul">Subject Code</label>  
                            <input type="text" 
                            id="kode_matkul" 
                            class="form-control" 
                            value="<?= $instructors['kode_matkul']?>" 
                            name="kode_matkul">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>