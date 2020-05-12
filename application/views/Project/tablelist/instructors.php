<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
    </div>
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Class Name</th>
                <th>Subject Name</th>
                <th>Credit</th>
                <th>Subject Code</th>
                <?php
                if($level != 'user'){
                ?>
                <th>Action</th>
                <?php }?>
                <!-- <th>Credit</th>
                <th>Hours</th>
                <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach($instructors as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['KODE']?></td>
                        <td><?= $smt['nama_kelas']?><?php $encode1= base64_encode($smt['nama_kelas'])?></td>
                        <td><?= $smt['nama_matkul']?><?php $encode2= base64_encode($smt['nama_matkul'])?></td>
                        <td><?= $smt['SKS']?></td>
                        <td><?= $smt['kode_matkul']?></td>
                        <!-- <td><?= $smt->SKS;?></td> -->
                        <!-- <td><?= $smt->jam;?></td> -->
                        <?php
                        if($level != 'user'){
                        ?>
                        <td>
                            <a class="btn btn-outline-primary" 
                            href="<?= base_url();?>edit/instructors/<?=$smt['KODE']?>/<?=$encode1?>/<?=$encode2?>/<?=$smt['SKS']?>/<?=$smt['kode_matkul']?>">Edit</a>
                            <a class="btn btn-outline-danger" 
                            href="<?=base_url();?>deleterow/deleteinstructors/<?=$smt['KODE']?>/<?=$encode1?>/<?=$encode2?>/<?=$smt['SKS']?>/<?=$smt['kode_matkul']?>"
                            onclick="return confirm('Are you sure to delete this?')">Delete</a>
                        </td>
                        <?php }?>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>