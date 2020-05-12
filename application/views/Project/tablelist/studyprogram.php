<div class="container" style="margin-top:20px; position: relative; min-height: 70vh; padding-bottom: 2.5rem;">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px;"><?=$title?></h1>
    </div>
    <table class="table table-striped table-bordered" id="list_smt" >
        <thead>
            <tr>
                <th>No.</th>
                <th>Study Program ID</th>
                <th>Study Program Name</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach($studyprogram as $smt){?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $smt['PRODIID'];?></td>
                        <td><?= $smt['PRODI_NAMA'];?></td>
                        <!-- <td>
                            <a class="btn btn-outline-primary" href="">Edit</a>
                            <a class="btn btn-outline-danger" href="">Delete</a>
                        </td> -->
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>