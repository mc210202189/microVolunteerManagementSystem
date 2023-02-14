<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

function saveAssign($pid,$uid){
    include 'CRUD.php';
    $crdate=date("Y-m-d h:i:sa");
    $sql = "INSERT INTO assignProject (uid,pid,crDate,status)
    VALUES ($uid,$pid,'$crdate','Pending')";
    return create($sql);
   //return $sql;
}
// function readAllData(){
//     $sql ="SELECT * FROM assignProject";
//     return read($sql);
// }
// function deletePro($id){
//     $sql ="DELETE FROM assignProject WHERE id=$id";
//     //return read($sql);
//     delete($sql);
// }
// function approvedPro($id){
//     $sql ="UPDATE assignProject SET status='Active' WHERE id=$id";
//     update($sql);
//    // return read($sql);
// }
?>