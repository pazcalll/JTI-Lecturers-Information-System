<div class="container">
    <div class="col">
    <div>
        <h3 class="d-flex justify-content-md-center mr-auto ml-auto mt-5">Contract for D3 Subjects</h3><br>
    </div>

    <h4 class="card-title ml-lg-5">1st Class</h4>
    <hr>

    <!-- for MI  -->

    <div class="row mb-2">

        <?php foreach($subjects as $row){
            if ($row['prodi']=='MI') {
                if ($row['tingkat']=='1') {
            ?>
            <br>
            <a class="col-sm-3 mb-lg-3 btn btn-block" href="<?= base_url();?>/contractcontroller/contractform/<?= $row['kode_matkul'];?>/<?= $row['nama_matkul']?>/<?= $row['prodi'];?>/<?= $row['tingkat']?>">
                <div class="card">
                    <div class="card-body btn-dark border-0 rounded" style="min-height: 130px;">
                        <h5 class="card-title"><?= $row['nama_matkul'];?></h5>
                        <p class="card-text"><?= $row['kode_matkul'];?></p>
                        <!-- <a href="#" class="btn btn-primary">Upload</a> -->
                    </div>
                </div>
            </a>
        <?php 
                }
            }
        }?><br><br>
    </div>

    <h4 class="card-title ml-lg-5">2nd Class</h4>
    <hr>
    <div class="row mb-2">

        <?php foreach($subjects as $row){
            if ($row['prodi']=='MI') {
                if ($row['tingkat']=='2') {
                    
            ?>
            <br>
            <a class="col-sm-3 mb-lg-3 btn btn-block" href="<?= base_url();?>/contractcontroller/contractform/<?= $row['kode_matkul'];?>/<?= $row['nama_matkul']?>/<?= $row['prodi'];?>/<?= $row['tingkat']?>">
                <div class="card">
                    <div class="card-body btn-primary border-0 rounded" style="min-height: 130px;">
                        <h5 class="card-title"><?= $row['nama_matkul'];?></h5>
                        <p class="card-text"><?= $row['kode_matkul'];?></p>
                        <!-- <a href="#" class="btn btn-primary">Upload</a> -->
                    </div>
                </div>
            </a>
        <?php 
                }
            }
        }?><br><br>
    </div>

    <h4 class="card-title ml-lg-5">3rd Class</h4>
    <hr>
    <div class="row mb-2">

        <?php foreach($subjects as $row){
            if ($row['prodi']=='MI') {
                if ($row['tingkat']=='3') {
                    
            ?>
            <br>
            <a class="col-sm-3 mb-lg-3 btn btn-block" href="<?= base_url();?>/contractcontroller/contractform/<?= $row['kode_matkul'];?>/<?= $row['nama_matkul']?>/<?= $row['prodi'];?>/<?= $row['tingkat']?>">
                <div class="card">
                    <div class="card-body btn-info border-0 rounded" style="min-height: 130px;">
                        <h5 class="card-title"><?= $row['nama_matkul'];?></h5>
                        <p class="card-text"><?= $row['kode_matkul'];?></p>
                        <!-- <a href="#" class="btn btn-primary">Upload</a> -->
                    </div>
                </div>
            </a>
        <?php 
                }
            }
        }?><br><br><br>
    </div>
    </div>
    <hr>
<!-- ==================================================================================== -->
            <!-- for TI -->
    <div class="col">
    <div>
        <h3 class="d-flex justify-content-md-center mr-auto ml-auto mt-5">Contract for D4 Subjects</h3><br>
    </div>
    <div class="row mb-2">

        <?php foreach($subjects as $row){
            if ($row['prodi']=='TI') {
                if ($row['tingkat']=='1') {
            ?>
            <br>
            <a class="col-sm-3 mb-lg-3 btn btn-block" href="<?= base_url();?>/contractcontroller/contractform/<?= $row['kode_matkul'];?>/<?= $row['nama_matkul']?>/<?= $row['prodi'];?>/<?= $row['tingkat']?>">
                <div class="card">
                    <div class="card-body btn-dark border-0 rounded" style="min-height: 130px;">
                        <h5 class="card-title"><?= $row['nama_matkul'];?></h5>
                        <p class="card-text"><?= $row['kode_matkul'];?></p>
                        <!-- <a href="#" class="btn btn-primary">Upload</a> -->
                    </div>
                </div>
            </a>
        <?php 
                }
            }
        }?><br><br>
    </div>

    <h4 class="card-title ml-lg-5">2nd Class</h4>
    <hr>
    <div class="row mb-2">

        <?php foreach($subjects as $row){
            if ($row['prodi']=='TI') {
                if ($row['tingkat']=='2') {
                    
            ?>
            <br>
            <a class="col-sm-3 mb-lg-3 btn btn-block" href="<?= base_url();?>/contractcontroller/contractform/<?= $row['kode_matkul'];?>/<?= $row['nama_matkul']?>/<?= $row['prodi'];?>/<?= $row['tingkat']?>">
                <div class="card">
                    <div class="card-body btn-primary border-0 rounded" style="min-height: 130px;">
                        <h5 class="card-title"><?= $row['nama_matkul'];?></h5>
                        <p class="card-text"><?= $row['kode_matkul'];?></p>
                        <!-- <a href="#" class="btn btn-primary">Upload</a> -->
                    </div>
                </div>
            </a>
        <?php 
                }
            }
        }?><br><br>
    </div>

    <h4 class="card-title ml-lg-5">3rd Class</h4>
    <hr>
    <div class="row mb-2">

        <?php foreach($subjects as $row){
            if ($row['prodi']=='TI') {
                if ($row['tingkat']=='3') {
                    
            ?>
            <br>
            <a class="col-sm-3 mb-lg-3 btn btn-block" href="<?= base_url();?>/contractcontroller/contractform/<?= $row['kode_matkul'];?>/<?= $row['nama_matkul']?>/<?= $row['prodi'];?>/<?= $row['tingkat']?>">
                <div class="card">
                    <div class="card-body btn-info border-0 rounded" style="min-height: 130px;">
                        <h5 class="card-title"><?= $row['nama_matkul'];?></h5>
                        <p class="card-text"><?= $row['kode_matkul'];?></p>
                        <!-- <a href="#" class="btn btn-primary">Upload</a> -->
                    </div>
                </div>
            </a>
        <?php 
                }
            }
        }?><br><br>
    </div>

    <h4 class="card-title ml-lg-5">4th Class</h4>
    <hr>
    <div class="row mb-2">

        <?php foreach($subjects as $row){
            if ($row['prodi']=='TI') {
                if ($row['tingkat']=='4') {
                    
            ?>
            <br>
            <a class="col-sm-3 mb-lg-3 btn btn-block" href="<?= base_url();?>/contractcontroller/contractform/<?= $row['kode_matkul'];?>/<?= $row['nama_matkul']?>/<?= $row['prodi'];?>/<?= $row['tingkat']?>">
                <div class="card">
                    <div class="card-body btn-info border-0 rounded" style="min-height: 130px;">
                        <h5 class="card-title"><?= $row['nama_matkul'];?></h5>
                        <p class="card-text"><?= $row['kode_matkul'];?></p>
                        <!-- <a href="#" class="btn btn-primary">Upload</a> -->
                    </div>
                </div>
            </a>
        <?php 
                }
            }
        }?><br><br>
    </div>
    </div>

</div>