<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'CRUD.php';
function save($pid,$uid,$msg){
    $crdate=date("Y-m-d h:i:sa");
    $sql = "INSERT INTO chat (pid, uid,msg)
    VALUES ($pid,$uid,'$msg')";
    return create($sql);
   //return $sql;
}
function readAllData($pid){
    $sql="SELECT users.name,chat.msg,chat.uid FROM chat INNER JOIN users ON chat.uid=users.id WHERE chat.pid=$pid";
  //  $sql ="SELECT * FROM chat WHERE pid=$pid";
    return read($sql);
}
function deletePro($id){
    $sql ="DELETE FROM projects WHERE id=$id";
    //return read($sql);
    delete($sql);
}
function approvedPro($id){
    $sql ="UPDATE projects SET status='Active' WHERE id=$id";
    update($sql);
   // return read($sql);
}


function saveAssign($pid,$uid){
    $crdate=date("Y-m-d h:i:sa");
    $sql = "INSERT INTO assignProject (uid,pid,crDate,status)
    VALUES ($uid,$pid,'$crdate','Pending')";
    create($sql);
   //echo $sql;
  // header("Location:projectsList.php");
   //return $sql;
}



?>