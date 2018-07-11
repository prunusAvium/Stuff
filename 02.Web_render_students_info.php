<?php
if (isset($_GET['names']) && isset($_GET['ages'])){
    $delimeter = $_GET['delimeter'];
    $names = explode($delimeter, $_GET['names']);
    $ages = explode($delimeter, $_GET['ages']);
}
include "02.Web_render_students_info_frontend.php";
