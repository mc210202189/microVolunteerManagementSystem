<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mvms_db";
    // --------------------
        // $servername = "db4free.net";
    // $username = "ghhghfgsdhgfshgf";
    // $password = "ghhghfgsdhgfshgf";
    // $dbname = "ghhghfgsdhgfshgf";
    // --------------------
    // $servername = "sql203.liveblog365.com-";
    // $username = "lblog_33184354-";
    // $password = "54l73yq3";
    // $dbname = "lblog_33184354_DBTest";
    // --------------------
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
      
      }
      else{
       // echo "connected!";
      }
    ?>