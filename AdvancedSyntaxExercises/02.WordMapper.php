<?php
declare(strict_types=1);
if (isset($_GET['sbm'])) {
    (string)$input = trim($_GET['input']);
    preg_match_all("/\w+/", $input, $regex);
    $words = [];
    foreach ($regex as $r) {
        if (count($r) == 0) {
            continue;
        }
        foreach ($r as $value) {
            if (strlen($value) == 0) {
                continue;
            }
            $words[] = strtolower($value);
        }
    }
    $data = [];
    for ((int)$i = 0; $i < count($words); $i++) {
        (string)$word = $words[$i];
        if (!array_key_exists($word, $data)) {
            $data[$word] = 0;
        }
        $data[$word]++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    div {
        margin: 5px 0px 15px 0px;
    }
    textarea {
        width: 350px;
        height: 90px;
    }
    table, tr, td {
        border: 2px solid black;
    }
</style>
<head>
    <meta charset="UTF-8">
    <title>Word Mapping</title>
</head>
<body>
<div>
    <form method="get">
        <textarea name="input"></textarea><br/>
        <input type="submit" name="sbm" value="Count words"/>
    </form>
</div>
<?php if (isset($_GET['sbm']) && count($data) > 0): ?>
    <div>
        <table>
            <?php foreach ($data as $k => $v) {
                echo "\t\t\t<tr>\n<td>$k</td>\n<td>$v</td>\n\t\t\t</tr>";
            } ?>
        </table>
        <?php ?>
    </div>
<?php endif; ?>
</body>
</html>