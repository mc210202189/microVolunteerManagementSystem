<?php
//session_start();
include 'CRUD.php';  
function save($name,$password,$email,$address,$phoneNo,$role){
    $sql = "INSERT INTO users (name, email, password,address,phoneNo,pic,role,status)
    VALUES ('$name','$email','$password','$address','$phoneNo','no pic','$role','InActive')";
    return create($sql);
}
function loginAccount($email,$password){
    $sql ="SELECT * FROM users WHERE email='$email'";// AND password='$password'";
   $result= read($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($row["password"]==$password){
          //  echo json_encode($row);
            $_SESSION["obj"] = $row;
            header("Location:./dashboard.php"); 
            //header("Refresh: 5; url=http://www.example.com"); 
       // echo "id: " . $row["password"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
        }else{
            return "Invalid Email Or Password";
        }
        }
    } else {
      return "Account Not Exist.";
    }
   // return "inhggh";// create($sql);
}

//volunter code dashboard
function volunteerAct($id){
    $sql="SELECT COUNT(uid) as total FROM assignproject WHERE uid=$id AND status='Active' ";
    $result=read($sql);
    $data=mysqli_fetch_assoc($result);
    echo $data['total'];
}
function volunteerPen($id){
  $sql="SELECT COUNT(uid) as total FROM assignproject WHERE uid=$id AND status='Pending' ";
  $result=read($sql);
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}
function volunteerCom($id){
  $sql="SELECT COUNT(uid) as total FROM assignproject WHERE uid=$id AND status='Complete' ";
  $result=read($sql);
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}
//org code 
function OrgAct($id){
  $sql="SELECT COUNT(uid) as total FROM assignproject WHERE pid=$id AND status='Active' ";
  $result=read($sql);
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}
function OrgPen($id){
$sql="SELECT COUNT(uid) as total FROM assignproject WHERE pid=$id AND status='Pending' ";
$result=read($sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
}
function OrgCom($id){
$sql="SELECT COUNT(uid) as total FROM assignproject WHERE pid=$id AND status='Complete' ";
$result=read($sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
}
//admin code 
function allVol(){
  $sql="SELECT COUNT(*) as total FROM users WHERE role='user' AND status='active'";
  $result=read($sql);
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}
function penVol(){
  $sql="SELECT COUNT(*) as total FROM users WHERE role='user' AND status='active'";
  $result=read($sql);
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}
function reqVol(){
  $sql="SELECT COUNT(*) as total FROM assignproject WHERE  status='Pending'";
  $result=read($sql);
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}
//org
function allOrg(){
  $sql="SELECT COUNT(*) as total FROM users WHERE role='org' AND status='active'";
  $result=read($sql);
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}
function penOrg(){
  $sql="SELECT COUNT(*) as total FROM users WHERE role='org' AND status='InActive'";
  $result=read($sql);
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}
function orgProReq(){
  $sql="SELECT COUNT(*) as total FROM projects WHERE  status='active'";
  $result=read($sql);
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}
?>