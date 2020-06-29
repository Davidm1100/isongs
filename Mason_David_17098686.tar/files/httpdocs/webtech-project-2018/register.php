<html><head>
<title>iSongs Registration</title>
</head>
<body>
<?php 
DEFINE ('DB_USER', '17098686u');
DEFINE ('DB_PASSWORD', '17098686p');
DEFINE ('DB_HOST', '80.82.113.195');
DEFINE ('DB_NAME', '17098686_music_db');
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
$First_name = $_POST['First_name'];
$Last_name = $_POST['Last_name'];
$Email = $_POST['Email'];

echo "Hello,  $First_name. Your name and email were successfully entered into the database!";
mysqli_query($dbc, "INSERT INTO customers (First_name, Last_name, Email) 
VALUES('$First_name', '$Last_name', '$Email') ");
?>
</body></html>