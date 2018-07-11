<form method="get">
    <div>
        Delimeter:
        <select name="delimeter">
            <option value=",">,</option>
            <option value="|">|</option>
            <option value="&">&</option>
        </select>
    </div>
    <div>
        Names:
        <input type="text" name="names"/>
    </div>
    <div>
        Ages:
        <input type="text" name="ages"/>
    </div>
    <div>
        <input type="submit" name="filter" value="Filter!"/>
    </div>
</form>
<?php if (isset($_GET['filter'])): ?>
    <table border="1" cellpadding="0">
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($names); $i++): ?>
            <?php if (intval($ages[$i]) >= 18): ?>
                <tr>
                    <td><?= $names[$i]; ?></td>
                    <td><?= $ages[$i]; ?></td>
                </tr>
            <?php endif; ?>
        <?php endfor; ?>
        </tbody>
    </table>
<?php endif; ?>