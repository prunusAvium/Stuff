<?php

set_error_handler(function ( int $errno , string $errstr, string $errfile, int $errline, array $errcontext){
    throw new Exception('Error:' . $errstr, $errno);
});

set_exception_handler(function (Exception $e){
    echo "Oops Error!";
    error_log('Error:' . $e->getMessage() . ' : ' . $e->getFile() . $e->getLine());
    exit;
});

function a()
{
    try {
        b();
    } catch (Exception $e) {
        echo 'Error:' . $e->getMessage();
    }
    echo '<br> run a ';
}
function b()
{
    c();
    echo '<br> run b';
}
function c()
{
    if (1){
        throw new Exception('Too short parameters');
    }
    //insert
    echo '<br> run c';
}

a();

/*echo $a;

$d = new PDO('');

$d->query();*/

echo 'End';

/*
session_start();

if (isset($_GET['first_name'])) {
    echo 'Your name is: ' . $_GET["first_name"];
    $_SESSION['first_name'] = $_GET['first_name'];
    //$_SESSION['first_name']
    setcookie('first_name', $_GET['first_name']);
} elseif(isset($_SESSION['first_name'])){
    echo 'Hello ' . $_SESSION['first_name']. '!';
} else{
    echo 'What is your name: <form><input type="text" name="first_name"/>?</form>';
}

session_write_close();*/