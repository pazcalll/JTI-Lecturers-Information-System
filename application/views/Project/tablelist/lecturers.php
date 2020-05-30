<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
    </div>
    <table class="table table-striped table-bordered" style="overflow-x: scroll; white-space: nowrap; display: block;" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>NIDN</th>
                <th>Kode</th>
                <th>Prodi ID</th>
                <th>Accreditation ID</th>
                <th>Team ID</th>
                <th>Full Name</th>
                <th>Status</th>
                <th>Lecturing Quota</th>
                <th>Lecturing Hours</th>
                <th>Credit</th>
                <th>Distribution</th>
                <th>Even Quota in 19/20</th>
                <th>Even Distribution in 19/20</th>
                <th>Matkul Total</th>
                <th>Homebase</th>
                <th>Homebase for D3 Accreditation</th>
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
                foreach($lecturers as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['NIP']?></td>
                        <td><?= $smt['NIDN']?></td>
                        <td><?= $smt['KODE']?></td>
                        <td><?= $smt['PRODIID']?></td>
                        <td><?= $smt['AKREID']?></td>
                        <td><?= $smt['TEAMID']?></td>
                        <td><?= $smt['NAMA']?><?php $encode1=base64_encode($smt['NAMA'])?></td>
                        <td><?= $smt['STATUSES']?><?php $encode2=base64_encode($smt['STATUSES'])?></td>
                        <td><?= $smt['KUOTA_NGAJAR']?></td>
                        <td><?= $smt['JAM_NGAJAR']?></td>
                        <td><?= $smt['SKS']?></td>
                        <td><?= $smt['DISTRIBUSI']?></td>
                        <td><?= $smt['KUOTA_GENAP_19_20']?></td>
                        <td><?= $smt['DISTR_GENAP_19_20']?></td>
                        <td><?= $smt['JUMLAH_MATKUL_19_20']?></td>
                        <td><?= $smt['HOMEBASE']?></td>
                        <td><?= $smt['HOMEBASE_AKRE_D3']?></td>
                        <?php
                        if($level != 'user'){
                        ?>
                        <td>
                            <a class="btn btn-outline-primary" 
                            href="<?=base_url()?>edit/lecturers/<?=$smt['KODE']?>">Edit</a>
                            <a class="btn btn-outline-danger" 
                            href="<?=base_url()?>deleterow/deletelecturers/<?=$smt['NIP']?>/<?=$smt['NIDN']?>/<?=$smt['KODE']?>/<?=$smt['PRODIID']?>/<?=$smt['AKREID']?>/<?=$smt['TEAMID']?>/<?=$encode1?>/<?=$encode2?>/<?=$smt['KUOTA_NGAJAR']?>/<?=$smt['JAM_NGAJAR']?>/<?=$smt['SKS']?>/<?=$smt['DISTRIBUSI']?>/<?=$smt['KUOTA_GENAP_19_20']?>/<?=$smt['DISTR_GENAP_19_20']?>/<?=$smt['JUMLAH_MATKUL_19_20']?>/<?=$smt['HOMEBASE']?>/<?=$smt['HOMEBASE_AKRE_D3']?>">Delete</a>
                        </td>
                        <?php }?>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>