<table>
    <th>Output</th>
    <?php foreach($dt as $value): ?>
        <tr>
            <td><?php echo "New sale entered " . $value["date_time_sale"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>