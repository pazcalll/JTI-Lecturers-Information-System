<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
    </div>
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>Class ID</th>
                <th>Class Name</th>
                <th>Study Program</th>
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
                foreach($classes as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['CLASSID'];?></td>
                        <td><?= $smt['CLASS_NAME'];?></td>
                        <td><?= $smt['PROGRAM_STD'];?></td>
                        <?php 
                        if($level != 'user'){
                        ?>
                        <td>
                            <a class="btn btn-outline-primary" 
                            href="<?= base_url();?>edit/classes/<?= $smt['CLASSID']?>/<?= $smt['CLASS_NAME']?>/<?= $smt['PROGRAM_STD']?>">Edit</a>
                            <a class="btn btn-outline-danger" 
                            href="<?= base_url();?>deleterow/deleteclasses/<?= $smt['CLASSID']?>/<?= $smt['CLASS_NAME']?>/<?= $smt['PROGRAM_STD']?>"
                            onclick="return confirm('Are you sure to delete this?')">Delete</a>
                        </td>
                        <?php }?>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>