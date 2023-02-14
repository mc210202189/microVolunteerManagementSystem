<?php
include 'model/hell.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$password=$email=$address=$phoneNo="";
    if (!empty($_POST["first"])){
        $name=$_POST["first"];
    }
    if (!empty($_POST["last"])){
        $name=$name." ".$_POST["last"];
    }
    if (!empty($_POST["email"])){
        $email=$_POST["email"];
    }
    if (!empty($_POST["password"])){
        $password=$_POST["password"];
    }
    if (!empty($_POST["cpassword"])){
        
    }
    if (!empty($_POST["address"])){
        $address=$_POST["address"];
    }
   echo save($name,$password,$email,$address,$phoneNo);
   // echo $name.$password.$email.$address.$phoneNo;
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    save("hghghghgh");
    echo "get";
}

?>