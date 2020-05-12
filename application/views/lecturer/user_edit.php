<!-- <?= var_dump($user);?> -->
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
                            <input type="hidden" name="kode" value="<?= $user['KODE']?>">
                            <label for="kode">KODE</label>  
                            <!-- <input type="text" 
                            id="kode" 
                            class="form-control" 
                            value="<?= $user['KODE']?>" 
                            name="kode"> -->
                            <p class="form-control border-0"><?= $user['KODE']?></p>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="nip" value="<?= $user['NIP']?>">
                            <label for="nip">NIP</label>  
                            <input type="text" 
                            class="form-control" 
                            id="nip" 
                            value="<?= $user['NIP']?>" 
                            name="nip">
                            <!-- <h4 class="form-control"><?=$user['CLASSID']?></h4> -->
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="nidn" value="<?= $user['NIDN']?>">
                            <label for="nidn">NIDN</label>  
                            <input type="text" 
                            id="nidn" 
                            class="form-control" 
                            value="<?= $user['NIDN']?>" 
                            name="nidn">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="prodiid" value="<?= $user['PRODIID']?>">
                            <label for="prodiid">Level</label>  
                            <input type="text" 
                            id="prodiid" 
                            class="form-control" 
                            value="<?= $user['PRODIID']?>" 
                            name="prodiid">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="akreid" value="<?= $user['AKREID']?>">
                            <label for="akreid">Accreditation ID</label>  
                            <input type="text" 
                            id="akreid" 
                            class="form-control" 
                            value="<?= $user['AKREID']?>" 
                            name="akreid">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="teamid" value="<?= $user['TEAMID']?>">
                            <label for="teamid">Team ID</label>  
                            <input type="text" 
                            id="teamid" 
                            class="form-control" 
                            value="<?= $user['TEAMID']?>" 
                            name="teamid">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="nama" value="<?= $user['NAMA']?>">
                            <label for="nama">Name</label>  
                            <input type="text" 
                            id="nama" 
                            class="form-control" 
                            value="<?= $user['NAMA']?>" 
                            name="nama">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="statuses" value="<?= $user['STATUSES']?>">
                            <label for="statuses">Status</label>  
                            <input type="text" 
                            id="statuses" 
                            class="form-control" 
                            value="<?= $user['STATUSES']?>" 
                            name="statuses">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="kuota_ngajar" value="<?= $user['KUOTA_NGAJAR']?>">
                            <label for="kuota_ngajar">Lecturing Quota</label>  
                            <input type="text" 
                            id="kuota_ngajar" 
                            class="form-control" 
                            value="<?= $user['KUOTA_NGAJAR']?>" 
                            name="kuota_ngajar">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jam_ngajar" value="<?= $user['JAM_NGAJAR']?>">
                            <label for="jam_ngajar">Lecturing Hours</label>  
                            <input type="text" 
                            id="jam_ngajar" 
                            class="form-control" 
                            value="<?= $user['JAM_NGAJAR']?>" 
                            name="jam_ngajar">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="sks" value="<?= $user['SKS']?>">
                            <label for="sks">Credit</label>  
                            <input type="text" 
                            id="sks" 
                            class="form-control" 
                            value="<?= $user['SKS']?>" 
                            name="sks">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="distribusi" value="<?= $user['DISTRIBUSI']?>">
                            <label for="distribusi">Distribution</label>  
                            <input type="text" 
                            id="distribusi" 
                            class="form-control" 
                            value="<?= $user['DISTRIBUSI']?>" 
                            name="distribusi">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="kuota_genap_19_20" value="<?= $user['KUOTA_GENAP_19_20']?>">
                            <label for="kuota_genap_19_20">Even Quota in 19/20</label>  
                            <input type="text" 
                            id="kuota_genap_19_20" 
                            class="form-control" 
                            value="<?= $user['KUOTA_GENAP_19_20']?>" 
                            name="kuota_genap_19_20">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="distr_genap_19_20" value="<?= $user['DISTR_GENAP_19_20']?>">
                            <label for="distr_genap_19_20">Even Distribution in 19/20</label>  
                            <input type="text" 
                            id="distr_genap_19_20" 
                            class="form-control" 
                            value="<?= $user['DISTR_GENAP_19_20']?>" 
                            name="distr_genap_19_20">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jumlah_matkul_19_20" value="<?= $user['JUMLAH_MATKUL_19_20']?>">
                            <label for="jumlah_matkul_19_20">Matkul Total</label>  
                            <input type="text" 
                            id="jumlah_matkul_19_20" 
                            class="form-control" 
                            value="<?= $user['JUMLAH_MATKUL_19_20']?>" 
                            name="jumlah_matkul_19_20">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="homebase" value="<?= $user['HOMEBASE']?>">
                            <label for="homebase">Homebase</label>  
                            <input type="text" 
                            id="homebase" 
                            class="form-control" 
                            value="<?= $user['HOMEBASE']?>" 
                            name="homebase">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="homebase_akre_d3" value="<?= $user['HOMEBASE_AKRE_D3']?>">
                            <label for="homebase_akre_d3">Homebase for D3 Accreditation</label>  
                            <input type="text" 
                            id="homebase_akre_d3" 
                            class="form-control" 
                            value="<?= $user['HOMEBASE_AKRE_D3']?>" 
                            name="homebase_akre_d3">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>