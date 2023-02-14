<?php
    // if(!isset($_SESSION)) 
    // { 
    //     session_start(); 
    // } 
include 'CRUD.php'; 
function save($pname,$date,$time,$address,$uid){
    $crdate=date("Y-m-d h:i:sa");
    $sql = "INSERT INTO projects (pname, date,time,address,uid,crDate,status)
    VALUES ('$pname','$date','$time','$address',$uid,'$crdate','Pending')";
    return create($sql);
   //return $sql;
}
function readAllData(){
    $sql ="SELECT * FROM projects"; 
    return read($sql);
}
function readAllDataUser($status){
 
    if($status=="new")
    $sql ="SELECT * FROM projects WHERE status='Active'"; 
    else if($status=="existing")
    $sql ="SELECT projects.id,projects.pname,projects.address,projects.date,projects.time,projects.uid,projects.status,projects.crDate
    FROM projects
    INNER JOIN assignproject
    ON projects.id=assignproject.pid WHERE assignproject.id>0 assignproject.uid=4;";
    else 
    $sql ="SELECT * FROM projects WHERE id=0";
   // echo $sql;
    return read($sql);
}
function readAllAssign($uid){

    $sql ="SELECT DISTINCT projects.id,projects.pname,projects.address,projects.date,projects.time,projects.uid,projects.status,projects.crDate
    FROM projects
    INNER JOIN assignproject
    ON projects.id=assignproject.pid WHERE assignproject.id>0 AND assignproject.uid=$uid;";
    // echo $sql;
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