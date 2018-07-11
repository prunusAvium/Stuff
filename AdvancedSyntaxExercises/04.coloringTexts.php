<?php
declare(strict_types=1);
if (isset($_GET['sbm'])) {
    (string)$input = trim($_GET['input']);
    $data = [];
    for ((int)$i = 0; $i < strlen($input); $i++) {
        if ($input[$i] != ' ') {
            $data[] = $input[$i];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    div {
        margin: 5px 0px 20px 0px;
    }
    textarea {
        width: 350px;
        height: 60px;
    }
    .even {
        color: blue;
    }
    .odd {
        color: red;
    }
</style>
<head>
    <meta charset="UTF-8">
    <title>Coloring Texts</title>
</head>
<body>
<div>
    <form method="get">
        <textarea name="input"></textarea><br/>
        <input type="submit" name="sbm" value="Color text"/>
    </form>
</div>
<?php if (isset($_GET['sbm']) && count($data) > 0): ?>
    <div>
        <?php for ((int)$i = 0; $i < count($data); $i++): ?>
            <span class=<?= $i % 2 == 0 ? "even" : "odd"; ?>>
                <?= $data[$i]; ?>
            </span>
        <?php endfor; ?>
    </div>
<?php endif; ?>
</body>
</html>