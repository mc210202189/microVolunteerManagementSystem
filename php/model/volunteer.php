<?php
//session_start();
include 'CRUD.php';
function save($name,$password,$email,$address,$phoneNo){
    $sql = "INSERT INTO users (name, email, password,address,phoneNo,pic,role)
    VALUES ('$name','$email','$password','$address','$phoneNo','no pic','user')";
    return create($sql);
}
function readAllData(){
    $sql ="SELECT * FROM users WHERE role='user'";
    return read($sql);
}
function readAllVolunteerRequest(){
    $sql ="SELECT * FROM users WHERE role='user'";
    return read($sql);
}
function deleteVol($id){
    $sql ="DELETE FROM users WHERE id=$id";
    //return read($sql);
    delete($sql);
}
function approvedVol($id){
    $sql ="UPDATE users SET status='Active' WHERE id=$id";
    update($sql);
   // return read($sql);
}
function updateVol($id,$name,$pic,$gender,$email,$address,$phoneNo){
    $sql ="UPDATE users SET name='$name',pic='$pic',email='$email',address='$address',phoneNo='$phoneNo' WHERE id=$id";
    update($sql);
    $sql ="SELECT * FROM users WHERE email='$email'";// AND password='$password'";
   $result= read($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
            $_SESSION["obj"] = $row;
            echo "<script>window.location.href='profile.php';</script>";
           // header("Location:profile.php"); 
        }
    }
}
?>