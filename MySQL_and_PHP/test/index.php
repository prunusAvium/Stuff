<?php
declare(strict_types=1);

/*$user_id = 11;*/
$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'password');

$db_stm = $db->prepare('INSERT INTO users (USER_NAME, FIRST_NAME, LAST_NAME)
                      VALUES (:user_name, :first_name, :last_name)');

/*$db_stm = $db->prepare('UPDATE USERS SET USER_NAME = :user_name
                          WHERE USER_ID = :user_id');

$user_name = 'ivan101;
$user_id = 27;

$db_stm->bindParam('user_name', $user_name);
$db_stm->bindParam('user_id', $user_id);

$db_stm->execute();*/
$user_name = 'ivan101';
$first_name = "Ivan";
$last_name = "Ivanchev";

$db_stm->bindParam('user_name', $user_name);
$db_stm->bindParam('first_name', $first_name);
$db_stm->bindParam('last_name', $last_name);

$db_stm->execute();

echo $db->lastInsertId()."\n";

    //----------------
$user_name = 'Vankata200';
$first_name = "Ivan4";
$last_name = "Petrov";

$db_stm->execute();
echo $db->lastInsertId()."\n";
//-----------------
$user_name = 'Van14';
$first_name = "Ivan2";
$last_name = "Georgiev";

$db_stm->execute();
echo $db->lastInsertId()."\n";
//----------

/*
$db_stm = $db->prepare('SELECT * FROM users WHERE USER_ID = ?');
$data = $db_stm->execute(Array($user_id));
print_r($data);

while($row = $db_stm->fetch(PDO::FETCH_ASSOC)){
     print_r($row);
    // echo $row['user_name'] . "\n";
}*/