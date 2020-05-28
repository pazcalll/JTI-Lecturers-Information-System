<div class="container d-flex justify-content-md-center mt-md-5">
    <div class="col">
        <?= $this->session->flashdata('import');?>
        <div class="row">
            <div class="card mr-auto ml-auto">
                <div class="card-header">
                    <h5><?=$export?> Import csv form</h5>
                </div>
                <form enctype="multipart/form-data" class="" action="<?=base_url();?>/import/<?=$export?>import" method="POST">
                    <div class="card-body">
                        <div class="form-group">
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