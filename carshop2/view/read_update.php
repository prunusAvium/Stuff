<table>
    <th>Output</th>
    <?php if ($isUpdate): ?>
        <tr>
            <td><?= PHP_EOL . $type . " with ID " . $id . " updated."; ?></td>
        </tr>
    <?php else: ?>
        <tr>
            <td><?= PHP_EOL . "Don't update: " . $type . " with ID " . $id; ?></td>
        </tr>
    <?php endif; ?>
</table>