<div class="page-header">
	<h1><?=$data['title']?></h1>
</div>

<p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#planExam">
        Inplannen Tentamen
    </button>
</p>

<div class="panel panel-default">
    <div class="panel-heading">Geplande tentamens</div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Datum</th>
                <th>Tentamen</th>
                <th>Lokaal</th>
                <th>Gebruiker</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($data['planning'] as $planning): ?>
                <tr>
                    <td><?=$planning->getDateTime()?></td>
                    <td><?=$planning->getExamCode()?></td>
                    <td><?=$planning->getRoomCode()?></td>
                    <td><?=$planning->getUser()->getFullname()?></td>
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
                <li><a href="?p=1" data-original-title="" title="">2</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="planExam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>