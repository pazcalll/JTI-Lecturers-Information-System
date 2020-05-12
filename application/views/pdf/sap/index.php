<h3 class="d-flex justify-content-md-center mr-auto ml-auto mt-5">SAP Management System</h3>
<div class="container d-flex justify-content-md-center mt-md-5">
    <div class="col">
        <div class="row d-flex justify-content-md-center">
            <?php if($this->session->flashdata('uploadpdf')!=null){?>
            <div class="alert alert-warning border-0">
                <?php echo $this->session->flashdata('uploadpdf');?>
            </div>
            <?php }?>
            <?php if(validation_errors()){?>
            <div class="alert alert-danger border-0">
                <?= validation_errors();?>
            </div>
            <?php }?>

        </div>
        <div class="row">
            <div class="card mr-auto ml-auto">
                <div class="card-header">
                    <h5>Upload SAP form</h5>
                </div>
                <!-- <form class="" action="" method="POST"> -->
                <?php echo form_open_multipart('pdf/addsap');?>
                    <div class="card-body">
                        <!-- <div class=" "> -->
                            <label for="nama_matkul">Matkul Name</label>
                            <!-- <input type="text" name="nama_matkul" id="nama_matkul" class="form-control"> -->
                            <select name="nama_matkul" id="nama-matkul" class="form-control">
                                <?php foreach ($dropdown as $key ) {
                                    echo '<option value="'.$key['nama_matkul'].'">'.$key['nama_matkul'].'</option>';
                                }?>
                                
                            </select>
                        <!-- </div><br> -->
                        <!-- <div class=" "> --><br>
                            <label for="program">Study Program</label>
                            <input type="text" name="program" id="program" class="form-control">
                        <!-- </div><br> -->
                        <!-- <div class=" "> --><br>
                            <label for="level">Level</label>
                            <input type="text" name="level" id="level" class="form-control">
                        <!-- </div><br> -->
                        <!-- <div class=" "> --><br>
                            <div class="form-group">
                                <label for="pdf">PDF input</label>
                                <input type="file" class="form-control-file" id="pdf" name="pdf"><br>
                                <div class="d-flex justify-content-md-center">
                                    <button type="submit" class="btn btn-primary" style="margin-bottom: -15px;">Submit</button>
                                </div>
                            </div>
                        <!-- </div> -->
                    </div>
                <?php echo form_close();?>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div><br>
<div class="row d-flex justify-content-md-center" >
    <table class="table table-striped table-bordered" style="overflow-x: scroll; white-space: nowrap; display: block; " id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>Subject Code</th>
                <th>Matkul Name</th>
                <th>File Name</th>
                <th>Level</th>
                <th>Study Program</th>
                <th>Uploaded By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=0;
                foreach($matkul as $key){
                    $no++;
            ?>
            <tr>
                <td><?=$no;?></td>
                <td><?=$key->kode_matkul;?></td>
                <td><?=$key->nama_matkul;?></td>
                <td><?=$key->file;?></td>
                <td><?=$key->tingkat;?></td>
                <td><?=$key->std_program;?></td>
                <td><?=$key->upload_by;?></td>
                <td>
                    <a href="<?= base_url();?>/pdf/downloadsap/<?= $key->file?>" class="btn btn-success">Download</a>
                    <?php 
                        if ($this->session->userdata('level')=='admin') {?>
                            <a onclick="return confirm('are you sure want to delete this data?')" href="<?=base_url();?>/pdf/deletesap/<?=$key->kode_matkul?>/<?=base64_encode($key->file)?>"class="btn btn-danger">Delete</a>
                    <?php }
                    ?>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>