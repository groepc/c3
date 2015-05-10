<div class="page-header">
	<h1><?=$data['title']?></h1>
</div>

<div class="panel panel-default">
	<div class="panel-heading">Beschikbare tentamens</div>
	<div class="panel-body">
		<table class="table table-hover table-striped">
			<table class="table table-hover table-striped">
				<thead>
				<tr>
					<th>Code</th>
					<th>Vak</th>
					<th>Periode</th>
					<th>Eigenaar</th>
					<th>&nbsp;</th>
				</tr>
				</thead>
				<tbody>
				<?php/** @var \models\Exam $exam */ ?>
				<?php foreach ($data['exams'] as $exam): ?>
					<tr>
						<td><?=$exam->getCode()?></td>
						<td><?=$exam->getCourse()?></td>
						<td><?=$exam->getPeriod()?></td>
						<td><?=$exam->getUser()->getFullname()?></td>
						<td class="text-right"><a href="/administration/evaluate-exam-view?code=<?=$exam->getCode()?>"><button type="button" class="btn btn-success btn-xs">invullen</button></a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
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
