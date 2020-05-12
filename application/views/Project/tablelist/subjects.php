<!-- Example single danger button -->
<div class="container" style="margin-top:20px;">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
        <div class="btn-group">
            <button type="button" class="btn btn-warning border-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            PDF Management
            </button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url()?>/pdf/rps">RPS</a>
            <a class="dropdown-item" href="<?= base_url()?>/pdf/sap">SAP</a>
        </div>
    </div><br><br>
    <table class="table table-striped table-bordered" id="list_smt" style="overflow-x: scroll; white-space: nowrap;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>Study Program</th>
                <th>Level</th>
                <th>Semester</th>
                <th>Credit</th>
                <th>Hours</th>
                <?php
                if($level != 'user'){
                ?>
                <th>Action</th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach($subjects as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['nama_matkul'];?><?php $encode=base64_encode($smt['nama_matkul']);?></td>
                        <td><?= $smt['kode_matkul'];?></td>
                        <td><?= $smt['prodi'];?></td>
                        <td><?= $smt['tingkat'];?></td>
                        <td><?= $smt['semester'];?></td>
                        <td><?= $smt['SKS'];?></td>
                        <td><?= $smt['jam'];?></td>
                        <?php
                        if($level != 'user'){
                        ?>
                        <td>
                            <a class="btn btn-outline-primary" 
                            href="<?= base_url();?>edit/subjects/<?=$encode?>/<?=$smt['kode_matkul']?>/<?=$smt['prodi']?>/<?=$smt['tingkat']?>/<?=$smt['semester']?>/<?=$smt['SKS']?>/<?=$smt['jam']?>">Edit</a>
                            <a class="btn btn-outline-danger" 
                            href="<?= base_url();?>deleterow/deletesubjects/<?=$encode?>/<?=$smt['kode_matkul']?>/<?=$smt['prodi']?>/<?=$smt['tingkat']?>/<?=$smt['semester']?>/<?=$smt['SKS']?>/<?=$smt['jam']?>" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                        </td>
                        <?php }?>
                    </tr>
                
            <?php } ?>
        </tbody>
    </table>
    </div></div>