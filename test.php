<form method="get">
    Operation:
    <select name="operation">
        <option value="sum">Sum</option>
        <option value="sum">Substract</option>
    </select> <br />
    Number 1:
    <input type="text" name="num_1"> <br />
    Number 2:
    <input type="text" name="num_2"> <br />
    <input type="submit" name="calculate" value="Calculate!">
</form>

<?php
if(isset($_GET['calculate']))
{
    $operation = $_GET['operation'];
    $num_1 = $_GET['num_1'];
    $num_2 = $_GET['num_2'];
    echo "<ul>";
    if($operation == "sum")
    {
        echo " == " . ($num_1 + $num_2);
    }
    else if ($operation == "substract")
    {
        echo " == " . ($num_1 - $num_2);
    }
    else
    {
        echo " == Invalid operation supplied";
    }
    echo "</ul>";
}