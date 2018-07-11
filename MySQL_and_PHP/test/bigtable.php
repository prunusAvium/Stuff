<?php
declare(strict_types=1);

$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'password');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db_stm = $db->prepare('INSERT INTO bigtable (NAME) VALUE(:value)');

$value = null;
$db_stm->bindParam('value', $value);

for ($i= 0; $i <= 10000; $i++) {
    $value = 'name-' . rand(1, 10000);
    $db_stm->execute();
}

/*$db_stm = $db->prepare('INSERT INTO users (USER_NAME, FIRST_NAME, LAST_NAME)
                      VALUES (:user_name, :first_name, :last_name)');*/
for ($i = 0; $i<=184; $i++){
    echo "debug";
}