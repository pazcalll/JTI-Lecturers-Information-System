<div class="col-md-12 mt-5">
    <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
</div>
<div class="container d-flex justify-content-md-center mt-md-5">
    <div class="col">
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
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
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $value->nama_matkul;?></td>
                <td><?= $value->kode_matkul;?></td>
                <td><?= $value->prodi;?></td>
                <td><?= $value->tingkat;?></td>
                <td>
                    <a href="<?= base_url()?>/contractcontroller/getmycontract/<?= base64_encode($value->nama_matkul);?>/<?= $value->kode_matkul;?>/<?= $value->prodi;?>/<?= $value->tingkat;?>" class="btn btn-info rounded border-0">Detail</a>
                    <a href="<?= base_url()?>/contractcontroller/downloadcontract/<?= base64_encode($value->nama_matkul);?>/<?= $value->kode_matkul;?>/<?= $value->prodi;?>/<?= $value->tingkat;?>" class="btn btn-success rounded border-0">Download</a>
                    <a href="<?= base_url()?>/contractcontroller/deletecontract/<?= base64_encode($value->nama_matkul);?>/<?= $value->kode_matkul;?>/<?= $value->prodi;?>/<?= $value->tingkat;?>" class="btn btn-danger rounded border-0">Delete</a>
                </td>
            </tr>
            <?php 
                    $no++;
                }
            ?>
        </tbody>
    </table>
    </div>
</div>