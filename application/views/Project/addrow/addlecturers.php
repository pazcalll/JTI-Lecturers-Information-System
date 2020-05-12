<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Add Subjects Form</h5>
                <div class="card-body">
                    <?php if(validation_errors()):?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors()?>
                    </div>
                    <?php endif;?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="number" class="form-control" id="nip" name="nip">
                        </div>
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="number" class="form-control" id="nidn" name="nidn">
                        </div>
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode">
                        </div>
                        <div class="form-group">
                            <label for="prodiid"> Prodi ID</label>
                            <input type="number" class="form-control" id="prodiid" name="prodiid">
                        </div>
                        <div class="form-group">
                            <label for="akreid">Accreditation ID</label>
                            <input type="number" class="form-control" id="akreid" name="akreid">
                        </div>
                        <div class="form-group">
                            <label for="teamid">Team ID</label>
                            <input type="number" class="form-control" id="teamid" name="teamid">
                        </div>
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="statuses">Status</label>
                            <input type="text" class="form-control" id="statuses" name="statuses">
                        </div>
                        <div class="form-group">
                            <label for="kuota_ngajar">Lecturing Quota</label>
                            <input type="number" class="form-control" id="kuota_ngajar" name="kuota_ngajar">
                        </div>
                        <div class="form-group">
                            <label for="jam_ngajar">Lecturing Hours</label>
                            <input type="number" class="form-control" id="jam_ngajar" name="jam_ngajar">
                        </div>
                        <div class="form-group">
                            <label for="sks">Credit</label>
                            <input type="number" class="form-control" id="sks" name="sks">
                        </div>
                        <div class="form-group">
                            <label for="distribusi">Distribution</label>
                            <input type="number" class="form-control" id="distribusi" name="distribusi">
                        </div>
                        <div class="form-group">
                            <label for="kuota_genap_19_20">Even Quota in 19/20</label>
                            <input type="number" class="form-control" id="kuota_genap_19_20" name="kuota_genap_19_20">
                        </div>
                        <div class="form-group">
                            <label for="distr_genap_19_20">Even Distribution in 19/20</label>
                            <input type="number" class="form-control" id="distr_genap_19_20" name="distr_genap_19_20">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_matkul_19_20">Matkul Total</label>
                            <input type="number" class="form-control" id="jumlah_matkul_19_20" name="jumlah_matkul_19_20">
                        </div>
                        <div class="form-group">
                            <label for="homebase">Homebase</label>
                            <input type="text" class="form-control" id="homebase" name="homebase">
                        </div>
                        <div class="form-group">
                            <label for="homebase_akre_d3">Homebase for D3 Accreditation</label>
                            <input type="text" class="form-control" id="homebase_akre_d3" name="homebase_akre_d3">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>