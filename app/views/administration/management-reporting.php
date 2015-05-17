<div class="page-header">
    <h1><?=$data['title']?></h1>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Overzicht</div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Tentamen</th>
                <th class="text-right">Aantal Studenten</th>
                <th class="text-right">Aantal Ingeschreven</th>
                <th class="text-right">Aantal Aanwezig</th>
                <th class="text-right">Hoogste Cijfer</th>
                <th class="text-right">Laagste Cijfer</th>
                <th class="text-right">Gemiddeld Cijfer</th>
            </tr>
            </thead>
            <tbody>
            <?php /** @var \models\Planning $planning */ ?>
            <?php foreach ($data['plannings'] as $planning): ?>
                <?php
                $subscriptions = $planning->getSubscriptions();
                $gradeArray = array();
                $presentArray = array();
                /** @var \models\Subscription $subscription */
                foreach ($subscriptions as $subscription) {
                    $gradeArray[] = $subscription->getGrade();
                    if ($subscription->getPresent()) {
                        $presentArray[] = $subscription->getPresent();
                    }
                }

                $highestGrade = 'N/A';
                $lowestGrade = 'N/A';
                $averageGrade = 'N/A';
                if (count($gradeArray) > 0) {
                    $highestGrade = max($gradeArray);
                    $lowestGrade = min($gradeArray);
                    $averageGrade = array_sum($gradeArray) / count($gradeArray);
                }
                $amountPresent = count($presentArray);
                ?>

                <tr>
                    <td><?=$planning->getExamCode()?></td>
                    <td class="text-right"><?=$planning->getExam()->getStudentAmount()?></td>
                    <td class="text-right"><?=count($subscriptions)?></td>
                    <td class="text-right"><?=$amountPresent?></td>
                    <td class="text-right"><?=$highestGrade?></td>
                    <td class="text-right"><?=$lowestGrade?></td>
                    <td class="text-right"><?=$averageGrade?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
