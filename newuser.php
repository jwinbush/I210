<?php
$page_title = "Create new user";

include('includes/header.php');
?>
<h2>Create a new account</h2>

<form action="createuser.php" method="get" enctype="text/plain">
    <table class="newuser">
        <tr>
            <td>User Name: </td>
            <td><input name="user_name" type="text" required /></td>
        </tr>
        <tr>
            <td>Full Name:</td>
            <td><input name="full_name" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="user_email" size="40" required /></td>
        </tr>
        <tr>
            <td>Birth Date:</td>
            <td><input type="text" name="birthdate" required /> (yyyy-mm-dd)</td>
        </tr>

    </table>
    <input type="submit" name="Submit" id="Submit" value="Register" />
</form>

<?php
include('includes/footer.php');
