<h1>Problem 6. View all Cars</h1>
<table>
    <thead>
    <tr>
        <td>Car make</td>
        <td>Car model</td>
        <td>Car year</td>
        <td>Car ID</td>
        <td>Owner first name</td>
        <td>Owner last name</td>
        <td>Customer ID</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($carAndOwner as $item) : ?>
        <tr>
            <td><?= $item["make"]; ?></td>
            <td><?= $item["model"]; ?></td>
            <td><?= $item["year"]; ?></td>
            <td><?= $item["id"]; ?></td>
            <td><?= $item["first_name"]; ?></td>
            <td><?= $item["last_name"]; ?></td>
            <td><?= $item["customer_id"]; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>