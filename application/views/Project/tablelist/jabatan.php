<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
    </div>
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jabatan ID</th>
                <th>Jabatan Name</th>
                <!-- <th>Tingkat</th>
                <th>Semester</th> -->
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
                foreach($jabatan as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['JABATANID']?></td>
                        <td><?= $smt['JABATAN_NAME']?><?php $encode=base64_encode($smt['JABATAN_NAME']);?></td>
                        <!-- <td><?= $smt->tingkat;?></td> -->
                        <!-- <td><?= $smt->semester;?></td> -->
                        <?php
                        if($level != 'user'){
                        ?>
                        <td>
                            <a class="btn btn-outline-primary" 
                            href="<?= base_url();?>edit/jabatan/<?=$smt['JABATANID']?>/<?=$encode?>">Edit</a>
                            <!-- <a class="btn btn-outline-danger" 
                            href="<?= base_url();?>deleterow/deletejabatan/<?=$smt['JABATANID']?>/<?=$encode?>">Delete</a> -->
                        </td>
                        <?php }?>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>