<?php $page_title ='iSongs Registration Form' ;

include("header.php"); ?>

<html> <head>
    <title>iSongs Registration Form</title>
    </head>
    <body>
        <form action="register.php" method="post">
        First Name: <input type="text" name="First_name"><br><br>
        Last Name: <input type="text" name="Last_name"><br><br>
        E-mail   : <input type="text" name="Email"><br><br>
        <input type="submit" value="Submit Me">
        </form>
    </body></html>

    <?php include("footer.php"); ?>