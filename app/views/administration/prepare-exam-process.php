<div class="page-header">
    <h1><?=$data['title']?></h1>
</div>

<?php if (isset($data['message'])): ?>
    <div class="alert alert-success" role="alert"><?=$data['message']?></div>
<?php endif; ?>

<div class="panel panel-default">
    <div class="panel-heading">Inschrijvingen</div>
    <div class="panel-body">
        <form>
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
                        <td><?=$subscription->getDateTime()?></td>
                        <td><?=$subscription->getGrade()?></td>
                        <td><input type="radio" name="present_<?=$subscription->getUserId()?>" value="1" required="required"> Ja <input type="radio" name="present_<?=$subscription->getUserId()?>" value="0"> Nee</td>
                    </tr>
                <?php $count++; endforeach; ?>
                </tbody>
            </table>
            <input type="submit" class="btn btn-success pull-right" name="process" value="Afronden">
        </form>

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
