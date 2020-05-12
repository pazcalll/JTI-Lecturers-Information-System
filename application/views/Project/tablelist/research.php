<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
    </div>
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>Research Name</th>
                <th>Research ID</th>
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
                foreach($research as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['RS_NAME']?></td>
                        <td><?= $smt['RSID']?></td>
                        <?php
                        if($level != 'user'){
                        ?>
                        <td>
                            <a class="btn btn-outline-primary"
                            href="<?=base_url()?>/edit/research/<?=$smt['RS_NAME']?>/<?=$smt['RSID']?>">Edit</a>
                            <a class="btn btn-outline-danger" 
                            href="<?=base_url()?>/deleterow/deleteresearch/<?=$smt['RS_NAME']?>/<?=$smt['RSID']?>"
                            onclick="return confirm('Are you sure to delete this?')">Delete</a>
                        </td>
                        <?php }?>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>