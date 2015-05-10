<div class="page-header">
    <h1><?=$data['title']?></h1>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Periodes</div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Periode</th>
                <th class="text-right">Aantal Tentamens</th>
                <th class="text-right">Aantal Studenten</th>
                <th class="text-right">Ingeschreven Studenten</th>
                <th class="text-right">Gemiddeld Cijfer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['reporting'] as $report): ?>
                <tr>
                    <td><?=$report['period']?></td>
                    <td class="text-right"><?=$report['examCount']?></td>
                    <td class="text-right"><?=$report['studentCount']?></td>
                    <td class="text-right"><?=$report['studentCount']?></td>
                    <td class="text-right">7.2</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
