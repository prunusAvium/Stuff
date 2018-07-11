<?php
declare(strict_types=1);
require '04.Father.php';
require '04.Son.php';
require '04.GrandSon.php';



$familyTree[] = new Father('James Strong', 1873, 1923);
$familyTree[] = new Son ('Peter Strong', 1894,1928);
$familyTree[] = new Son ('Andrew Strong',1899, 1970);
$familyTree[] = new GrandSon('Jackson Strong', 1927, 1992);
$familyTree[] = new GrandSon('Martin Strong', 1927, 1967);
$familyTree[] = new GrandSon('Gregory Strong', 1931, 2000);

$fatherCount = 0;
$sonsCount = 0;
$grandSonsCount = 0;

$totalFathersLivedTime = 0;
$totalSonsLivedTime = 0;
$totalGrandSonsLivedTime = 0;

foreach ($familyTree as $value) {
    if ($value->getGenerationNum() == 1) {
        $totalFathersLivedTime += $value->getTimeLived();
        $fatherCount++;
    } elseif ($value->getGenerationNum() == 2) {
        $totalSonsLivedTime += $value->getTimeLived();
        $sonsCount++;
    } elseif ($value->getGenerationNum() == 3) {
        $totalGrandSonsLivedTime += $value->getTimeLived();
        $grandSonsCount++;
    }
}

$totalFathersLivedTime /= $fatherCount;
$totalSonsLivedTime /= $sonsCount;
$totalGrandSonsLivedTime /= $grandSonsCount;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRINT</title>
</head>
<body>
<table Border = "1" Cellpadding = "5" Cellspacing = "5">
    <tr>
        <th Colspan = "3" Align = "Center">Family Tree</th>
    </tr>
    <th Colspan = "3" Align = "Center">Father - Average Lifespan: <?= $totalFathersLivedTime?></th>
    <?php foreach ($familyTree as $value): ?>
        <tr>
            <?php if ($value->getGenerationNum() == 1) :?>
                <td><?= $value->getName()?></td>
                <td><?= $value->getYearBirth()?> - <?= $value->getYearDead()?></td>
                <td><?= $value->getTimeLived()?></td>
            <?php endif;?>
        </tr>
    <?php endforeach;?>
    <th Colspan = "3" Align = "Center">Son - Average Lifespan: <?= $totalSonsLivedTime?></th>
    <?php foreach ($familyTree as $value): ?>
        <tr>
            <?php if ($value->getGenerationNum() == 2) :?>
                <td><?= $value->getName()?></td>
                <td><?= $value->getYearBirth()?> - <?= $value->getYearDead()?></td>
                <td><?= $value->getTimeLived()?></td>
            <?php endif;?>
        </tr>
    <?php endforeach;?>
    <th Colspan = "3" Align = "Center">GrandSon - Average Lifespan: <?= $totalGrandSonsLivedTime?></th>
    <?php foreach ($familyTree as $value): ?>
        <tr>
            <?php if ($value->getGenerationNum() == 3) :?>
                <td><?= $value->getName()?></td>
                <td><?= $value->getYearBirth()?> - <?= $value->getYearDead()?></td>
                <td><?= $value->getTimeLived()?></td>
            <?php endif;?>
        </tr>
    <?php endforeach;?>
</table>
</body>
</html>
