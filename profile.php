<?php
//session_start();
include 'header.php' ?>
<style>
/* .form-div { margin-top: 100px; border: 1px solid #e0e0e0; } */
#profileDisplay { display: block; height:300px; width:300px;  margin: 0px auto; border-radius: 50%; }
.img-placeholder {

  color: white;

  background: black;
  opacity: .7;
    /* height:50%;  width: 50%; */
    height:300px; width:300px;
  border-radius: 50%;

  position: absolute;
  left: 50%;

  transform: translateX(-50%);
  display: none;
}
.img-placeholder h4 {
  margin-top: 40%;
  color: white;
}
.img-div:hover .img-placeholder {
  display: block;
  cursor: pointer;
}

    </style>
<script>
function triggerClick(e) {
  document.querySelector('#profileImage').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>
<?php

include 'php/model/volunteer.php';
$msg="";
$row;   
$result=readAllData();
$profilepicpath="img/profilePic.png";
if($_SESSION["obj"]){
    $row= $_SESSION["obj"];
    if($row["pic"]!="no pic")
        $profilepicpath="ImageServer/".$row["pic"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$pic=$gender=$email=$address=$phoneNo="";
    if (!empty($_POST["name"])){
        $name=$_POST["name"];
    }

    if (!empty($_FILES["profileImage"])){
        $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
        $target_dir = "ImageServer/";
        $target_file = $target_dir . basename($profileImageName);
        move_uploaded_file( $_FILES["profileImage"]['tmp_name'],$target_file);
        $pic=$profileImageName;
    }
    if (!empty($_POST["gender"])){
        $gender=$_POST["gender"];
    }
    if (!empty($_POST["email"])){
        $email=$_POST["email"];
    }

    if (!empty($_POST["address"])){
        $address=$_POST["address"];
    }
    if (!empty($_POST["phoneNo"])){
        $phoneNo=$_POST["phoneNo"];
    }
    updateVol($row["id"],$name,$pic,$gender,$email,$address,$phoneNo);
     //echo $name.$pic.$gender.$email.$address.$phoneNo;
   // echo json_encode($profileImage);

}
?>


            <div class="container-xxl bg-primary page-header">
                <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-3">Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
      
        <div class="container-xxl py-6  ">
        <div class="container">

    
        <!-- img strat  -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Update profile</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="<?php echo $profilepicpath; ?>"  class="img-fluid rounded-circle"  onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" required name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display:none;" >
            <label>Profile Image</label>
          </div>
          <div class="row my-4">

                <div class="col-lg">
                    <div class="alert alert-primary  d-flex justify-content-around" role="alert">
                    <label for="name" class="form-label">Role : <strong>Volunter</strong> </label>
                    <label for="name" class="form-label">Account Status : <strong>Active</strong></label>
                    </div>
        
                </div>
              
          </div>
          <div class="row">
                <div class="col-lg">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" value="<?php echo $row["name"]; ?>" class="form-control" id="name"  name="name">
                </div>
                <div class="col-lg">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" value="<?php echo $row["email"]; ?>"  class="form-control" id="email"  name="email">
                </div>
          </div>
          <div class="row">
                <div class="col-lg">
                    <label for="phoneNo" class="form-label">Phone No</label>
                    <input type="name" value="<?php echo $row["phoneNo"]; ?>"  class="form-control" id="phoneNo"  name="phoneNo">
                </div>
                <div class="col-lg" style="margin-top:auto;">
                    
                    <label for="gender" style="margin-right:50px;" class="form-label">Gender:</label>
                    <input type="radio" class="form-check-input" name="gender" value="Male">Male
                    <input type="radio" class="form-check-input" name="gender" value="Female">Female
           
                </div>
          </div>

          <div class="col-lg">
            <label for="address" class="form-label">Address:</label>
            <textarea name="address" class="form-control"><?php echo $row["address"]; ?></textarea>
         </div>
          <div class="form-group">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save</button>
          </div>
        </form>

        <!-- <div class="image_area text-danger">
            <form method="post">
                <label for="upload_image">
                <img  id="uploaded_image"  src="img/profilePic.png" class="img-fluid rounded-circle"  />
                    <input type="file" name="image" class="ihmage" id="upload_image" style="display:none" />
                </label>
            </form>
        </div> -->

        <!-- img end -->


        </div>
        </div>
 
        
        <!-- Contact End -->

<?php include 'footer.php' ?>