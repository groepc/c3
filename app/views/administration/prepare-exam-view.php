<div class="page-header">
    <h1><?=$data['title']?></h1>
</div>

<?php if (isset($data['message'])): ?>
    <div class="alert alert-success" role="alert"><?=$data['message']?></div>
<?php endif; ?>

<div class="panel panel-default">
    <div class="panel-heading">Tentamen Info</div>
    <div class="panel-body">
        <table class="table">
            <?php /** @var \models\Planning $planning */ ?>
            <?php $planning = $data['planning']; ?>
            <?php $exam = $planning->getExam(); ?>
            <tr>
                <th>Code</th><td><?=$planning->getExamCode()?></td>
            <tr></tr>
                <th>Vak</th><td><?=$planning->getExam()->getCourse()?></td>
            <tr></tr>
                <th>Lokaal</th><td><?=$planning->getRoomCode()?></td>
            <tr></tr>
                <th>Datum</th><td><?=date('d-m-Y H:i', strtotime($planning->getDateTime()))?></td>
            </tr>
        </table>

        <div class="pull-left">
            <!--<a href="">
                <button class="btn btn-primary">Afdrukken</button>
            </a>-->
        </div>

        <?php if (!$exam->getGradeAvailable()): ?>
            <div class="pull-right">
                <a href="/administration/prepare-exam-process?planningId=<?=$planning->getId()?>"<button type="button" class="btn btn-success">Afronden</button></a>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Inschrijvingen</div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Datum</th>
                    <th>Cijfer</th>
                    <th>Aanwezig</th>
                </tr>
            </thead>
            <tbody>
            <?php/** @var \models\Subscription $subscription */ ?>
            <?php $count = 1;?>
            <?php foreach ($data['subscription'] as $subscription): ?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$subscription->getUser()->getFirstname()?></td>
                    <td><?=$subscription->getUser()->getLastname()?></td>
                    <td><?=date('d-m-Y', strtotime($subscription->getDateTime()))?></td>
                    <td><?=$subscription->getGrade()?></td>
                    <td><?=$subscription->getPresent()?></td>
                </tr>
            <?php $count++; endforeach; ?>
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
