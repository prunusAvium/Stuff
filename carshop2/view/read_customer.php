<h1>Problem 2. View all Customers</h1>
<table>
    <thead>
    <tr>
        <td>First name</td>
        <td>Last name</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $customer) : ?>
        <tr>
            <td><?= $customer["first_name"]; ?></td>
            <td><?= $customer["last_name"]; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>