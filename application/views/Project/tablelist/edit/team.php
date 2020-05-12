<!-- <?php var_dump($team);?> -->
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
                            <input type="hidden" name="team_name" value="<?= $team['TEAM_NAME']?>">
                            <label for="team_name">Subject Name</label>  
                            <input type="text" 
                            class="form-control" 
                            id="team_name" 
                            value="<?= $team['TEAM_NAME']?>" 
                            name="team_name">
                            <!-- <h4 class="form-control"><?=$team['CLASSID']?></h4> -->
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="teamid" value="<?= $team['TEAMID']?>">
                            <label for="teamid">Subject Code</label>  
                            <input type="text" 
                            id="teamid" 
                            class="form-control" 
                            value="<?= $team['TEAMID']?>" 
                            name="teamid">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>