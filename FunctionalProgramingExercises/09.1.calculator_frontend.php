<form method="get">
    <div>
        <input type="text" name="a" placeholder="number 'a'"/>
        <input type="text" name="b" placeholder="number 'b'"/>
        <select name="operation">
            <option value="sum">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="submit" name="calculate" value=" Go! "/>
        <br/><br/>
        = <input type="text" name="result" value="<?= $result != '' ? $result : ""; ?>"/>
    </div>
</form>
<?php
/* Problem 09.  Calculator in Functional Code */