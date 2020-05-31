<div class="container d-flex justify-content-md-center mt-md-5">
    <div class="col">

        <div class="row">
            <div class="card mr-auto ml-auto">
                <div class="card-header">
                    <h5><?=$title?></h5>
                    <!-- <?php
                        echo $subjectid.'<br>';
                        echo $subjectname.'<br>';
                        echo $prodi.'<br>';
                        echo $tingkat.'<br>';
                        echo $user.'<br>';
                    ?>  -->
                </div>
                <form enctype="multipart/form-data" class="" action="<?=base_url();?>/contractcontroller/contractimport" method="POST">
                    <div class="card-body">
                        <div class="form-group">

                            <!-- hidden -->
                            <input type="hidden" name="subjectid" id="subjectid" value="<?=$subjectid ?>">
                            <input type="hidden" name="subjectname" id="subjectname" value="<?=$subjectname?>">
                            <input type="hidden" name="prodi" id="prodi" value="<?= $prodi?>">
                            <input type="hidden" name="tingkat" id="tingkat" value="<?= $tingkat?>">
                            <input type="hidden" name="user" id="user" value="<?= $user?>">

                            <!-- inputs -->
                            <label for="csvfile">CSV input</label>
                            <input type="file" required="required" enctype="multipart/form-data" class="form-control-file" id="csvfile" name="csvfile" ><br>
                            <div class="d-flex justify-content-md-center">
                                <button type="submit" class="btn btn-primary" name="submit" style="margin-bottom: -15px;">Submit</button>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>