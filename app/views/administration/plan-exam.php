<div class="page-header">
	<h1><?=$data['title']?></h1>
</div>

<? if (isset($data['message'])): ?>
    <div class="alert alert-success" role="alert"><?=$data['message']?></div>
<? endif; ?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Aangevraagde tentamens</div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th class="text-right">Periode</th>
                        <th class="text-right">Studenten</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? /** @var \models\Exam $exam */ ?>
                    <? foreach ($data['exams'] as $exam): ?>
                        <tr>
                            <td><?=$exam->getCode()?></td>
                            <td class="text-right"><?=$exam->getPeriod()?></td>
                            <td class="text-right"><?=$exam->getStudentAmount()?></td>
                            <td class="text-right"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#planExam_<?=$exam->getCode()?>">inplannen</button></td>
                        </tr>
                    <? endforeach; ?>
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
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Ingeplande tentamens</div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Tentamen</th>
                        <th>Periode</th>
                        <th>Lokaal</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? /** @var \models\Planning $planning */ ?>
                    <? foreach ($data['plannings'] as $planning): ?>
                        <tr>
                            <td><?=$planning->getDateTime()?></td>
                            <td><?=$planning->getExamCode()?></td>
                            <td><?=$planning->getExam()->getPeriod()?></td>
                            <td><?=$planning->getRoomCode()?></td>
                            <td class="text-right">
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deletePlanning_<?=$planning->getId()?>">verwijderen</button>
                            </td>
                        </tr>
                    <? endforeach; ?>
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
    </div>
</div>

<? /** @var \models\Exam $exam */ ?>
<? foreach ($data['exams'] as $exam): ?>
    <!-- Modal -->
    <div class="modal fade" id="planExam_<?=$exam->getCode()?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tentamen Inplannen</h4>
                </div>
                <form class="form-horizontal" method="post" action="">
                    <div class="modal-body">
                        <table class="table table-condensed table-borderless">
                            <tr>
                                <th>Code</th><td><?=$exam->getCode()?></td>
                            </tr><tr>
                                <th>Vak</th><td><?=$exam->getCourse()?></td>
                            </tr><tr>
                                <th>Periode</th><td><?=$exam->getPeriod()?></td>
                            </tr><tr>
                                <th>Studenten</th><td><?=$exam->getStudentAmount()?></td>
                            </tr><tr>
                                <th>Computer Lokaal</th><td><?=$exam->getComputerRoom()?></td>
                            </tr><tr>
                                <th>Surveillant</th><td><?=$exam->getSupervisor()?></td>
                            </tr>
                        </table>

                        <hr />

                        <div class="form-group">
                            <label for="planningDate" class="col-sm-2 control-label">Datum</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" id="planningDate" name="planningDate" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="planningRoom" class="col-sm-2 control-label">Lokaal</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="planningRoom" name="planningRoom" required>
                                <? /** @var \models\Room $room */ ?>
                                <? foreach ($data['rooms'] as $room): ?>
                                    <? if ($exam->getStudentAmount() <= $room->getSeats()): ?>
                                        <? if ($room->getComputerRoom()): ?>
                                            <option><?=$room->getCode()?> [<?=$room->getSeats()?>] (Computer)</option>
                                        <? else: ?>
                                            <option><?=$room->getCode()?> [<?=$room->getSeats()?>]</option>
                                        <? endif; ?>
                                    <? endif; ?>
                                <? endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="examCode" value="<?=$exam->getCode()?>">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                        <button type="submit" name="create" class="btn btn-primary">Inplannen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<? endforeach; ?>

<? /** @var \models\Planning $planning */ ?>
<? foreach ($data['plannings'] as $planning): ?>
    <!-- Modal -->
    <div class="modal fade" id="deletePlanning_<?=$planning->getId()?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Planning Verwijderen</h4>
                </div>
                <div class="modal-body">
                    Weet je zeker je de planning met tentamen code: <?=$planning->getExamCode()?> wilt verwijderen?
                </div>
                <div class="modal-footer">
                    <form class="form-horizontal" method="post" action="">
                        <input type="hidden" name="planningId" value="<?=$planning->getId()?>">
                        <input type="hidden" name="examCode" value="<?=$planning->getExamCode()?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                        <button type="submit" name="delete" class="btn btn-danger">Verwijderen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<? endforeach; ?>