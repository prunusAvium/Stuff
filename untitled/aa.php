<?php
/*declare(strict_types=1);


spl_autoload_register(function ($className) {
        require_once $className . '.php';
});

require_once 'Database\PDODatabase.php';

$root = 'root';
$password = 'password';
$pdo = new PDO("mysql:host=localhost;dbname=session_exercise", 'root', 'password');

$db = new \Database\PDODatabase($pdo);*/
//$stmt = $db->query("SELECT * FROM users");
//$resultSet = $stmt->execute();
// /** @var User[] $allUsers */
/*$allUsers =$db->query("SELECT id, username, first_name AS firstName, last_name AS lastName, born_on AS bornOn FROM users")->execute()->fetch(User::class);
foreach ($allUsers as $user) {
    echo $user->getId() . " | " . $user->getUsername() .  " | " . $user->getBornOn() . " <br/>";
}*/