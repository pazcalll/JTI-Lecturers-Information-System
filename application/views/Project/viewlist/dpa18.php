
<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;">DPA <?= $year?></h1>
    </div>
    <table class="table table-striped table-bordered" id="list_dpa1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Class ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach($dpa as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['kode'];?></td>
                        <td><?= $smt['nama'];?></td>
                        <td><?= $smt['classid'];?></td>
                        <td><i>None</i></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>