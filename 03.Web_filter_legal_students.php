<?php
if (isset($_GET['names']) && isset($_GET['ages'])){
    $delimeter = $_GET['delimeter'];
    $names = explode($delimeter, $_GET['names']);
    $ages = explode($delimeter, $_GET['ages']);
}
include "03.Web_filter_legal_students_frontend.php";