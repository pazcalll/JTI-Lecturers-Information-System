<div class="col-md-12 mt-5">
    <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
</div>
<div class="container d-flex justify-content-md-center mt-md-5">
    <div class="col">
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>Lecturer Code</th>
                <th>Subject Name</th>
                <th>Subject ID</th>
                <th>Study Program</th>
                <th>Level/Grade</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no =1;
                foreach ($contracts as $row => $value) {
                    foreach($value as $val => $key){
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $key->username;?></td>
                <td><?= $key->nama_matkul;?></td>
                <td><?= $key->kode_matkul;?></td>
                <td><?= $key->prodi;?></td>
                <td><?= $key->tingkat;?></td>
                <td>
                    <a href="<?= base_url()?>/contractcontroller/getadmincontract/<?= base64_encode($key->nama_matkul);?>/<?= $key->kode_matkul;?>/<?= $key->prodi;?>/<?= $key->tingkat;?>/<?= $key->username;?>" class="btn btn-info rounded border-0">Detail</a>
                    <a href="<?= base_url()?>/contractcontroller/downloadadmincontract/<?= base64_encode($key->nama_matkul);?>/<?= $key->kode_matkul;?>/<?= $key->prodi;?>/<?= $key->tingkat;?>/<?= $key->username;?>" class="btn btn-success rounded border-0">Download</a>
                    <a href="<?= base_url()?>/contractcontroller/deleteadmincontract/<?= base64_encode($key->nama_matkul);?>/<?= $key->kode_matkul;?>/<?= $key->prodi;?>/<?= $key->tingkat;?>/<?= $key->username;?>" class="btn btn-danger rounded border-0">Delete</a>
                </td>
            </tr>
            <?php 
                        $no++;
                    }
                }
            ?>
        </tbody>
    </table>
    </div>
</div>