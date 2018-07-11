<h1>Add Project</h1>
<form method="post" action="?controller=EmployeeController&action=addProjects">
    <?= !empty($_GET["employee_id"]) ? "&employee_id=" . $_GET["employee_id"] : "" ?>">
    Name:
    <input type="text" name="name" value=""/>
    <br/>
    Description:
    <input type="text" name="description" value=""/>
    <br/>
    End Date:
    <input type="text" name="end_date" value=""/>
    <br/>
    <input type="submit" name="save" value=" Save "/>
    <input type="submit" name="cancel" value=" Cancel "/>
</form>