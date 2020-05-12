<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
    </div>
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>Team Name</th>
                <th>Team ID</th>
                <!-- <th>Level</th> -->
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
                foreach($team as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['TEAM_NAME'];?></td>
                        <td><?= $smt['TEAMID'];?></td>
                        <!-- <td><?= $smt->TINGKAT;?></td> -->
                        <?php
                        if($level != 'user'){
                        ?>
                        <td>
                            <a class="btn btn-outline-primary" 
                            href="<?=base_url();?>edit/team/<?=$smt['TEAM_NAME']?>/<?=$smt['TEAMID']?>">Edit</a>
                            <a class="btn btn-outline-danger" 
                            href="<?=base_url()?>deleterow/deleteteam/<?=$smt['TEAM_NAME']?>/<?=$smt['TEAMID']?>">Delete</a>
                        </td>
                        <?php }?>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>