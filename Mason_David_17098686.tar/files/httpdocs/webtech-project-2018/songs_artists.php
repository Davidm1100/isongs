<?php $page_title ='Songs and Artists';

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
$q = "SELECT Songs.Song_name, Artist.Artist_name, Songs.Release_date, Songs.Genre, Songs.Price, Artist.Nationality, Artist.Label FROM Songs, Artist WHERE Songs.Artist_ID = Artist.Artist_ID ORDER BY Artist_name ASC";		
$r = @mysqli_query ($dbc, $q);

  echo   '<table>
	<tr>
	<th scope="col">Song</th>
	<th scope="col">Artist</th>
    <th scope="col">Release Date</th>
    <th scope="col">Genre</th>
    <th scope="col">Price</th>
    <th scope="col">Nationality</th>
    <th scope="col">Label</th>
	</tr>
	';
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
echo '<tr><td>' . $row['Song_name'] . '</td> <td>' . $row['Artist_name'] .
	 '</td> <td>' . $row['Release_date'] . '</td> <td>' . $row['Genre'] . '</td> <td>' . $row['Price'] . '</td> <td>' . $row['Nationality'] . '</td> <td>' . $row['Label'] . '</td></tr>'
	 ;
}
echo '</table>';
?>

</body>
</html>
<?php include("footer.php"); ?>