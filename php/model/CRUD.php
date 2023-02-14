<?php

function create($sql){
    //include '../dbcon.php';
    include 'dbcon.php';
    if ($conn->query($sql) === TRUE) {
      return "success";
    } else {
        return $conn->error;
    }
    $conn->close();
}
function read($sql){
    include 'dbcon.php';
    $result = mysqli_query($conn, $sql);
    return $result;
    // if ($result->num_rows > 0) {
    // //   while($row = $result->fetch_assoc()) {
    // //     echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
    // //     }
    // } else {
    //   echo "0 results";
    // }
}
function update($sql){
    include 'dbcon.php';  
  //include '../dbcon.php';
    $msg="";
    if (mysqli_query($conn, $sql)) {
        $msg="success";
      } else {
        $msg= mysqli_error($conn);
      }
      mysqli_close($conn);
      return $msg;
}
function delete($sql){
    include 'dbcon.php'; 
  // include '../dbcon.php';
    $msg="";
    if (mysqli_query($conn, $sql)) {
        $msg="success";
      } else {
        $msg= mysqli_error($conn);
      }
      mysqli_close($conn);
      return $msg;
}

?>