<?php $page_title ='View Customers';

include("header.php"); ?>
<html><head>
<title>The Form Output</title>
</head>
<body>
<?php 
DEFINE ('DB_USER', '17098686u');
DEFINE ('DB_PASSWORD', '17098686p');
DEFINE ('DB_HOST', '80.82.113.195');
DEFINE ('DB_NAME', '17098686_music_db');
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
$q = "SELECT Last_name, First_name, Email FROM customers ORDER BY Last_name ASC";		
$r = @mysqli_query ($dbc, $q);

    echo '<table>
	<tr>
	<th scope="col">First Name</th>
	<th scope="col">Last Name</th>
	<th scope="col">Email</th>
	</tr>
';
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '<tr><td>' . $row['First_name'] .
	'</td><td>' . $row['Last_name'] . '</td><td>' . $row['Email'] . '</td></tr>
    ';
}
echo '</table>'; // Close the table.
?>
</body>
</html>
<?php include("footer.php"); ?>
