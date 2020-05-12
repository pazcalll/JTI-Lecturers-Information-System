
<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;">List Matkul Semester</h1>
    </div>
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>No.</th>
                <th>Matkul</th>
                <th>Prodi</th>
                <th>Tingkat</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach($semesters as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt->matkul;?></td>
                        <td><?= $smt->prodi;?></td>
                        <td><?= $smt->tingkat;?></td>
                        <td><?= $smt->semester;?></td>
                        <td><i>None</i></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>