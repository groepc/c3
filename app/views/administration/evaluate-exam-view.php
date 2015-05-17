<div class="page-header">
    <h1><?= $data['title'] ?></h1>
</div>

<?php/** @var \models\Evaluation $eval */ ?>
<?php $eval = $data['evaluation']; ?>

<div class="panel panel-default">
    <div class="panel-heading">Evaluatie</div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label for="datumtijd" class="col-sm-2 control-label">Datum</label>
                <div class="col-sm-10">
                    <?= $eval->getDateTime() ?>
                </div>
            </div>
            <div class="form-group">
                <label for="tentamenCode" class="col-sm-2 control-label">Tentamencode</label>
                <div class="col-sm-10">
                    <?= $data['examCode'] ;?>
                </div>
            </div>
            <div class="form-group">
                <label for="cijfer" class="col-sm-2 control-label">Cijfer</label>
                <div class="col-sm-10">
                    <?= $eval->getGrade() ?>
                </div>
            </div>
            <div class="form-group">
                <label for="examStudents" class="col-sm-2 control-label">Opmerkingen</label>
                <div class="col-sm-10">
                    <?= nl2br($comment) ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="/administration/evaluate-exam/" class="btn btn-success">Ga Terug</a>
                </div>
            </div>
        </form>
    </div>
</div>
