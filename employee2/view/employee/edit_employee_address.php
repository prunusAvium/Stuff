<h1>Edit Employee</h1>
<form method="post" action="?controller=AddressController&action=editAddress
<?= !empty($_GET["employee_id"]) ? "&employee_id=" . $_GET["employee_id"] : "" ?>">
    Address : <input type="text" name="address" value=""/>
    <br/>
    Town: <input type="text" name="town" value=""/>
    <br/>
    <input type="submit" name="save" value=" Save "/>
    <input type="submit" name="cancel" value=" Cancel "/>
</form>