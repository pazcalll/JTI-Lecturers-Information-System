<!-- <?= var_dump($user);?> -->
<div class="container">
  <div class="container py-lg-5">
    <div class="row py-lg-5">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="card">
              <h5 class="card-header text-center">User Detail Information</h5>
              <div class="card-body">
                <?php foreach ($user as $key) {?>
                <h5 class="card-title">Kode</h5>
                <p class="card-text border-bottom"><?=$key['KODE']?></p>
                <h5 class="card-title">NIP</h5>
                <p class="card-text border-bottom"><?= $key['NIP'];?></p>
                <h5 class="card-title">NIDN</h5>    
                <p class="card-text border-bottom"><?= $key['NIDN']?></p>
                <h5 class="card-title">Prodi ID</h5>
                <p class="card-text border-bottom"><?= $key['PRODIID']?></p>
                <h5 class="card-title">Accreditation ID</h5>
                <p class="card-text border-bottom"><?= $key['AKREID']?></p>
                <h5 class="card-title">Team ID</h5>
                <p class="card-text border-bottom"><?= $key['TEAMID']?></p>
                <h5 class="card-title">Full Name</h5>
                <p class="card-text border-bottom"><?= $key['NAMA']?><?php $encode1 = base64_encode($key['NAMA'])?></p>
                <h5 class="card-title">Status</h5>
                <p class="card-text border-bottom"><?= $key['STATUSES']?><?php $encode2 = base64_encode($key['STATUSES'])?></p>
                <h5 class="card-title">Lecturing Quota</h5>
                <p class="card-text border-bottom"><?= $key['KUOTA_NGAJAR']?></p>
                <h5 class="card-title">Lecturing Hours</h5>
                <p class="card-text border-bottom"><?= $key['JAM_NGAJAR']?></p>
                <h5 class="card-title">Credit</h5>
                <p class="card-text border-bottom"><?= $key['SKS']?></p>
                <h5 class="card-title">Distribution</h5>
                <p class="card-text border-bottom"><?= $key['DISTRIBUSI']?></p>
                <h5 class="card-title">Even Quota in 19/20</h5>
                <p class="card-text border-bottom"><?= $key['KUOTA_GENAP_19_20']?></p>
                <h5 class="card-title">Even Distribution in 19/20</h5>
                <p class="card-text border-bottom"><?= $key['DISTR_GENAP_19_20']?></p>
                <h5 class="card-title">Matkul Total</h5>
                <p class="card-text border-bottom"><?= $key['JUMLAH_MATKUL_19_20']?></p>
                <h5 class="card-title">Homebase</h5>
                <p class="card-text border-bottom"><?= $key['HOMEBASE']?></p>
                <h5 class="card-title">Homebase for D3 Accreditation</h5>
                <p class="card-text border-bottom"><?= $key['HOMEBASE_AKRE_D3']?></p>
                <?php }?>
                <div class="d-flex justify-content-center">
                  <a href="<?= base_url()?>edit/user_edit/<?=$key['NIP']?>/<?=$key['NIDN']?>/<?=$key['KODE']?>/<?=$key['PRODIID']?>/<?=$key['AKREID']?>/<?=$key['TEAMID']?>/<?=$encode1?>/<?=$encode2?>/<?=$key['KUOTA_NGAJAR']?>/<?=$key['JAM_NGAJAR']?>/<?=$key['SKS']?>/<?=$key['DISTRIBUSI']?>/<?=$key['KUOTA_GENAP_19_20']?>/<?=$key['DISTR_GENAP_19_20']?>/<?=$key['JUMLAH_MATKUL_19_20']?>/<?=$key['HOMEBASE']?>/<?=$key['HOMEBASE_AKRE_D3']?>" class="btn btn-primary">Edit</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>