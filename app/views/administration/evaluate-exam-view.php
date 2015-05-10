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
                    <?php if (!$eval->getDateTime()): ?>
                        <input type="text" class="form-control" id="datumtijd" name="datumtijd" value="<?= date('Y-m-d', strtotime('now')) ?>" readonly>
                    <?php endif; ?>
                    <?php if ($eval->getDateTime()): ?>
                        <input type="text" class="form-control" id="datumtijd" name="datumtijd" value="<?= $eval->getDateTime() ?>" readonly>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="tentamenCode" class="col-sm-2 control-label">Tentamencode</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tentamenCode" name="tentamenCode" value="<?= $data['examCode'] ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="cijfer" class="col-sm-2 control-label">Cijfer</label>
                <div class="col-sm-10">
                    <?php if (!$eval->getGrade()): ?>
                        <input type="number" min="1" max="10" step="0.1" class="form-control" id="cijfer" name="cijfer" placeholder="Cijfer" required>
                    <?php endif; ?>
                    <?php if ($eval->getGrade()): ?>
                        <input type="number" min="1" max="10" step="0.1" class="form-control" id="cijfer" name="cijfer" value="<?= $eval->getGrade() ?>" required>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="examStudents" class="col-sm-2 control-label">Opmerkingen</label>
                <div class="col-sm-10">
                    <?php $comment = '' ?>
                    <?php if ($eval->getComment()): ?>
                        <?php $comment = $eval->getComment() ?>
                    <?php endif; ?>
                    <textarea name="document" id="" cols="30" rows="10" class="form-control"><?= $comment ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Evaluatie opslaan</button>
                </div>
            </div>
        </form>
    </div>
</div>
