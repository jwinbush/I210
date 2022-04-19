<?php
$page_title = "List users";

require_once('includes/header.php');
require_once('includes/database.php');
//select statement
$sql = "SELECT * FROM users";
//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once('includes/footer.php');
    exit;
}
//display results in a table
?>
<h2>Users</h2>

<table class="userlist">
	<tr>
		<th>User ID</th>
		<th>Username</th>
		<th>Full Name</th>
		<th>Email Address</th>
		<th>Birthdate</th>
	</tr>

	<?php
	//create a while loop here to insert one row for each user.
    while (($row = $query->fetch_assoc()) !== NULL){
        echo "<tr>";
        echo "<td>", $row['user_id'], "</td>";
        echo "<td><a href=userdetails.php?id=", $row['user_id'], ">", $row['user_name'],"</a></td>";
        echo "<td>", $row['full_name'], "</td>";
        echo "<td>", $row['user_email'], "</td>";
        echo "<td>", $row['birthdate'], "</td>";
        echo "<td><a href='usermessages.php?id=", $row['user_id'], "'>View Messages</a></td>";
        echo "</tr>";
    }
	?>
</table>

<?php
// clean up result sets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once('includes/footer.php');
