<?php $page_title ='User Guide';

include("header.php"); ?>


<h1>Database Description</h1>

<p> 

<p>This website stores the data of its songs, customers and artists in a database on 34sp.com.The artists headers are ‘artist_ID’, ‘Artist_name’, ‘Nationality’ and ‘label’. 
The Customers table headers are ‘customer_ID’, ‘First_name’, ‘Last_name’ and ‘email’. 
The songs table headers are ‘song_id’, ‘song_name’, ‘artist_id’, ‘release_date’, genre and price.</p>

<p>A primary and foreign key connects the song and artist tables. The ‘customer_id’ header is the primary key and the ‘artist_id ‘header is the foreign key. This allows us to connect the two tables and to create one table, like we have with the Songs and Artists page. We do this by running a mysql connect after defining ‘DB_user’, ‘DB_password’, ‘DB_host’, ‘DB_name’. Then we select the data from the table headers that we want, in this case</p>

<p> ‘Songs.Song_name’, ‘Artist.Artist_name’, ‘Songs.Release_date’, ‘Songs.Genre’, ‘Songs.Price’, ‘Artist.Nationality’, ‘Artist.Label ‘FROM Songs, Artist WHERE Songs.Artist_ID. </p>

<p>After this we create a table with these headers and run a ‘mysql_fetch_array, to print the data into the rows.  The register page is a simple html form that allows customers to enter their first and last names as well as their email address. When submitted this runs retrieve.php which imputs this data into the customers table in the database. It does this by again running a msqlconnect to connect to the database, then we set variables for the form imputs $first_name, $last_name, $email. This allows us to run a INSERT query into the customers table with these values. Furthermore we are able to tell the customer that their $name and $email have been entered into the database. To show this information on the customers page we run the query SELECT Last_name, First_name, Email FROM customers ORDER BY Last_name ASC. Then we run a msql_fetch_arrary to print the customer table data onto the customer page on the website in order of last name. </p> 




<h1>Poll App </h1>


<p>The poll app work around onEvent rules. If a button is selected it sets the screen to the relevant page to which the button corresponds.  When create a variable called newCount which adds a number to the count row in the database.  The readRecords function reads the database  and the table header name  to verify which name is chosen. Then we  create a variable called newCount which adds 1 to the count row in the table. After this we run a updateRecords function which will update the count row on the popStars table. We put each option inside an , ELSE IF, ELSE rule so that it reads each option and runs the corresponding code to the selection chosen,.  This allows us to have 3 different choices and each function within the code runs if the corresponding button is selected. </p>





<p>onEvent("button1", "click", function(event) {
  if (getChecked("radio_button1")) {
    setScreen("JamesBay");
    readRecords("popStars", {name:'James Bay'}, function(records) {
      var newCount=records[0].count+1;
      updateRecord("popStars", {id:records[0].id, name:'James Bay', count:newCount}, function() {
        
      });
    });
  } else if ((getChecked("radio_button2"))) {
    setScreen("BenHoward");
    readRecords("popStars", {name:'Ben Howard'}, function(records) {
      var newCount=records[0].count+1;  
      updateRecord("popStars", {id:records[0].id, name:'Ben Howard', count:newCount}, function() { 
      }); 
      });
  } else {
    setScreen("EdSheeran");
    readRecords("popStars", {name:'Ed Sheeran'}, function(records) {
      var newCount=records[0].count+1;
      updateRecord("popStars", {id:records[0].id, name:'Ed Sheeran', count:newCount}, function() { 
      }); </p>


<p>To create a graph to show the results of the pol l we created another onEvent function to run drawChartFromRecords selecting the data from the chart popStars and choosing a pie chart to show the ‘count’ data. </p>

<p>onEvent("button2", "click", function(event) {
  drawChartFromRecords("chart1", "pie", "popStars", ["name", "count"]);
});</p>

<p>We also have onEvent functions that change the page and verify to the user who they have voted for.</p> 

<p>onEvent("button3", "click", function(event) {
  setScreen("screen1");
});
onEvent("button6", "click", function(event) {
  setScreen("screen1");
});
onEvent("button7", "click", function(event) {
  setScreen("screen1");
});</p>

<h1> Playlist app</h1>

<p>The playlist app contains a table of songs that can be played randomly when the ‘Play Song’ button is pressed. You can add a song to the playlist by typing it into the input box and pressing ‘Add Song’.  When the ‘View Playlist” button is pressed the entire contents of the playlist is displayed.  We create variables (see below) to pick a random song  from the list playlist. </p>


<p>var playlist = ["Hey Now!", "Dream Catch Me", "Purple Rain", "Jitterbug"];
var x = randomNumber(1, 5);
var max = playlist.length - 1;
var randomIndex = randomNumber(0, max);
var randomItem = playlist[randomIndex];</p>


<p>When then use the onEvent control to display the text in the text label below by creating a playlistDisplay variable. </p>

<p>onEvent("button1", "click", function(event) {
  var playlistDisplay = playlist.join(", ");
  setText("label1", playlistDisplay);
});</p>

<p>To play a random song we use randomNumber to select a number from the list between 0 and the varilable max.</p>

<p>onEvent("playSong", "click", function(event) {
  setText("nowPlayingText", playlist[(randomNumber(0,max))]);
});</p>

<p>Finally when a user wants to add a new song they enter it in the text input and press ‘Add Song’. We create a variable called ‘newItem’ that collects the text then appendItem  to add it to the playlist list. </p>

<p>onEvent("button2", "click", function(event) {
  var newItem = getText("text_input1");
  appendItem(playlist, newItem);
  setText("text_input1", "");
});</p>

 


    <?php include("footer.php"); ?>