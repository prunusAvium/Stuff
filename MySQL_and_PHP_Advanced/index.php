<?php

$db = new PDO('mysql:host=localhost;dbname=test','root', 'password', Array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));

$db->beginTransaction();

$db_stm = $db->prepare('INSERT INTO users (USER_NAME) VALUE(:user_name)');

$user_name = 'gosho3';
$db_stm->bindParam('user_name', $user_name);

try {
    $db_stm->execute();
    echo $db->lastInsertId() . "\n";
    $user_name = 'gosho2';
    $db_stm->execute();
    echo $db->lastInsertId() . "\n";
    $db->commit();
} catch (PDOException $e) {
    $db->rollBack();
    echo $e->getMessage();
}

