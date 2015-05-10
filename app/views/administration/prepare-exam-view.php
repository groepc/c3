<div class="page-header">
    <h1><?=$data['title']?></h1>
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
                    <td><?=$subscription->getDateTime()?></td>
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
