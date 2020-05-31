<div class="col-md-12 mt-5">
    <h1 style="text-align: center; margin-bottom:30px;"><?=$title?> of <?=$subjectname?></h1>
</div>
<div style="margin-right: 50px; margin-left: 50px;">
    <table class="table table-striped table-bordered" id="list_smt">
        <thead>
            <tr>
                <th>Week</th>
                <th>Date</th>
                <th>Discussion</th>
                <th>Method</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($contract as $key => $row):?>
                    <tr>
                        <td><?= $row->minggu;?></td>
                        <td><?= $row->tanggal;?></td>
                        <td><?= $row->bahasan;?></td>
                        <td><?= $row->metode;?></td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>