<table>
    <thead>
        <tr>
            <td>№</td>
            <td>Firstname</td>
            <td>Lastname</td>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($customers as $customer) { ?>
            <tr>
                <td><?= $customer['customer_id']?></td>
                <td><?= $customer['first_name']?></td>
                <td><?= $customer['last_name']?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>