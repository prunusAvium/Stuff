<table>
    <th>Name</th>
    <th>Job Title</th>
    <th>Hire Date</th>
    <th>Salary</th>
    <th>Actions</th>
    <th>Projects</th>
    <th>Address</th>
    <th>Actions </th>
    <?php foreach ($params as $i => $iv) : ?>
        <tr>
            <td><?= $iv["first_name"] . " " . $iv["middle_name"] . " " . $iv["last_name"]; ?></td>
            <td><?= $iv["job_title"]; ?></td>
            <td><?= $iv["hire_date"]; ?></td>
            <td><?= $iv["salary"]; ?></td>
            <td><a href="?controller=EmployeeController&action=addProject&employee_id=<?= $iv["employee_id"]; ?>">Add project</td>
            <td><a href="?controller=EmployeeController&action=viewProjects&employee_id=<?= $iv["employee_id"]; ?>">Projects</td>
            <td><a href="?controller=AddressController&action=viewAddresses&employee_id=<?= $iv["employee_id"]; ?>">Address</td>
            <td><a href="?controller=AddressController&action=editAddress&employee_id=<?= $iv["employee_id"]; ?>">Edit</td>
        </tr>
    <?php endforeach; ?>
</table>