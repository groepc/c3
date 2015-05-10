<div class="page-header">
	<h1><?=$data['title']?></h1>
</div>
<?php if (isset($data['message'])): ?>
    <div class="alert alert-success" role="alert"><?=$data['message']?></div>
<?php endif; ?>
    
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">Tentamens nog plannen</div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th class="text-right">Periode</th>
                        <th class="text-right">Studenten</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['examsShort'] as $exam): ?>
                        <tr>
                            <td><?=$exam->getCode()?></td>
                            <td class="text-right"><?=$exam->getPeriod()?></td>
                            <td class="text-right"><?=$exam->getStudentAmount()?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">Tentamens nog voorbereiden</div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Vak</th>
                        <th>Lokaal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php /** @var \models\Planning $planning */ ?>
                    <?php foreach ($data['prepareExamShort'] as $prepareExam): ?>
                        <tr>
                            <td><?=$prepareExam->getExamCode()?></td>
                            <td><?=$prepareExam->getExam()->getCourse()?>
                            <td><?=$prepareExam->getRoomCode()?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">Tentamens nog evalueren</div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Vak</th>
                            <th>Eigenaar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php /** @var \models\Exam $exam */ ?>
                    <?php foreach ($data['evaluateExamShort'] as $exam): ?>
                       <tr>
                            <td><?=$exam->getCode()?></td>
                            <td><?=$exam->getCourse()?></td>
                            <td><?=$exam->getUser()->getFullname()?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>