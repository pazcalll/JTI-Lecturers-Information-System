<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
        <?php if($this->session->flashdata('import')!=null){?>
            <?php echo $this->session->flashdata('import');?>
        <?php }?>
    </div>
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Jabatan ID</th>
                <th>Year</th>
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
                foreach($bearer as $smt):?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['KODE'];?></td>
                        <td><?= $smt['JABATANID'];?></td>
                        <td><?= $smt['YEAR'];?><?php $encode=base64_encode($smt['YEAR']);?></td>
                        <?php 
                        if($level != 'user'){
                        ?>
                        <td>
                            <a class="btn btn-outline-primary" 
                            href="<?=base_url();?>edit/bearer/<?= $smt['KODE'];?>/<?= $smt['JABATANID'];?>/<?= $encode;?>">Edit</a>
                            <a class="btn btn-outline-danger" 
                            href="<?=base_url();?>deleterow/deletebearer/<?=$smt['KODE'];?>/<?=$smt['JABATANID'];?>/<?=$encode;?>"
                            onclick="return confirm('Are you sure to delete this?')">Delete</a>
                        </td>
                        <?php }?>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>