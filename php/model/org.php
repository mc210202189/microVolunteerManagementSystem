<?php
//session_start();
include 'CRUD.php';
function save($name,$password,$email,$address,$phoneNo){
    $sql = "INSERT INTO users (name, email, password,address,phoneNo,pic,role)
    VALUES ('$name','$email','$password','$address','$phoneNo','no pic','user')";
    return create($sql);
}
function readAllData(){
    $sql ="SELECT * FROM users WHERE role='org'";
    return read($sql);
}
function deleteOrg($id){
    $sql ="DELETE FROM users WHERE id=$id";
    //return read($sql);
    delete($sql);
}
function approvedOrg($id){
    $sql ="UPDATE users SET status='Active' WHERE id=$id";
    update($sql);
   // return read($sql);
}
?>