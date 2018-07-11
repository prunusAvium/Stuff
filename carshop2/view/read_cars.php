<h1>Problem 3. View all Cars</h1>
<table>
    <thead>
    <tr>
        <td>Car make</td>
        <td>Car model</td>
        <td>Car year</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cars as $car) : ?>
        <tr>
            <td><?= $car["make"]; ?></td>
            <td><?= $car["model"]; ?></td>
            <td><?= $car["year"]; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>