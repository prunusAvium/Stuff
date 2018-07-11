<table>
    <th>Name</th>
    <th>Projects name</th>
    <th>Projects description</th>
    <th>Projects start date</th>
    <th>Projects end date</th>
    <?php foreach ($params as $i => $iv) : ?>
        <tr>
            <td><?= $iv["first_name"] . " " . $iv["middle_name"] . " " . $iv["last_name"]; ?></td>
            <td><?= $iv["name"]; ?></td>
            <td><?= $iv["description"]; ?></td>
            <td><?= $iv["start_date"]; ?></td>
            <td><?= $iv["end_date"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>