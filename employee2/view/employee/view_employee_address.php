<table>
    <th>Name</th>
    <th>Address</th>
    <th>Town</th>
    <?php foreach ($params as $i => $iv) : ?>
        <tr>
            <td><?= $iv["first_name"] . " " . $iv["middle_name"] . " " . $iv["last_name"]; ?></td>
            <td><?= $iv["address_text"]; ?></td>
            <td><?= $iv["name"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table