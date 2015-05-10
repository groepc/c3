<div class="page-header">
    <h1><?=$data['title']?></h1>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Beschikbare tentamens</div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Datum</th>
                <th>Lokaal</th>
                <th>Code</th>
                <th>Vak</th>
                <th class="text-right">Periode</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php/** @var \models\Planning $planning */ ?>
            <?php foreach ($data['planning'] as $planning): ?>
                <tr>
                    <td><?=$planning->getDateTime()?></td>
                    <td><?=$planning->getRoomCode()?></td>
                    <td><?=$planning->getExamCode()?></td>
                    <td><?=$planning->getExam()->getCourse()?>
                    <td class="text-right"><?=$planning->getExam()->getPeriod()?></td>
                    <td class="text-right"><button type="button" class="btn btn-success btn-xs">bekijken</button></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-center">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="?p=0" data-original-title="" title="">1</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
