<?php
//session_start();
include 'header.php' ?>

<?php

include 'php/model/account.php';
$msg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password=$email="";
    if (!empty($_POST["email"])){
        $email=$_POST["email"];
    }
    if (!empty($_POST["password"])){
        $password=$_POST["password"];
    }
 //  loginAccount($email,$password);
   $msg=loginAccount($email,$password);
}
$obj=$_SESSION["obj"];
?>


            <div class="container-xxl bg-primary page-header">
                <div class="container text-center">
                    <?php 
                    if($obj["role"]=="org")
                    echo '   <h2 class="text-white animated zoomIn mb-3">Organization Dashboard</h2>';
                    else if($obj["role"]=="user")
                    echo '   <h2 class="text-white animated zoomIn mb-3">Volunteer Dashboard</h2>';
                    
                    else if($obj["role"]=="admin")
                    echo '   <h2 class="text-white animated zoomIn mb-3">Admin Dashboard</h2>';
                    
                    ?>
             

                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-6">
                 <h4 class="text-center mb-4 animated">Profile Status : <?php echo $obj["status"]; ?></h4>
                 <?php
                 if($obj["role"]=="admin"){
?>
                     <div class="d-flex justify-content-around mb-3">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <div style="width: 200px;" class="card bg-primary text-white">
                            <div class="card-body text-center">
                            <p> <?php allVol();  ?></p>
                                <h6>Registed Volunteer</h6>
                            </div>
                            </div>
                    </div>
                   
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                           <div style="width: 200px;" class="card bg-primary text-white">
                            <div class="card-body text-center">
                            <p> <?php penVol();  ?></p>
                                <h6>InActive Volunteer</h6>
                            </div>
                            </div>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                          <div style="width: 200px;" class="card bg-primary text-white">
                            <div class="card-body text-center">
                            <p> <?php reqVol();  ?></p>
                                <h6>Volunteer Task Request</h6>
                            </div>
                            </div>
                    </div>
                    </div>
                    <div class="d-flex justify-content-around mb-3">

                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                          <div style="width: 200px;" class="card bg-primary text-white">
                            <div class="card-body text-center">
                            <p> <?php allOrg();  ?></p>
                                <h6>All Oraginations</h6>
                            </div>
                            </div>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                           <div style="width: 200px;" class="card bg-primary text-white">
                            <div class="card-body text-center">
                            <p> <?php penOrg();  ?></p>
                                <h6>Oraginations Request</h6>
                            </div>
                            </div>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                           <div style="width: 200px;" class="card bg-primary text-white">
                            <div class="card-body text-center">
                            <p> <?php orgProReq();  ?></p>
                                <h6>Oraginations Task Request</h6>
                            </div>
                            </div>
                    </div>
                    </div>
<?php
                 }else if($obj["role"]=="user"){
                    ?>
                                <div class="d-flex justify-content-around mb-3">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <div style="width: 200px;" class="card bg-primary text-white">
                        <div class="card-body text-center">
                            <p> <?php volunteerAct($obj["id"]);  ?></p>
                        
                            <h6>Active Project</h6>
                        </div>
                        </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                <div style="width: 200px;" class="card bg-primary text-white">
                        <div class="card-body text-center">
                        <p> <?php volunteerPen($obj["id"]);  ?></p>
                        
                            <h6>Pending Project</h6>
                        </div>
                        </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                <div style="width: 200px;" class="card bg-primary text-white">
                        <div class="card-body text-center">
                        <p> <?php volunteerCom($obj["id"]);  ?></p>
                        
                            <h6>Complete Project</h6>
                        </div>
                        </div>
                </div>
        </div>
                    <?php
               }else if($obj["role"]=="org"){
                ?>
                    <div class="d-flex justify-content-around mb-3">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <div style="width: 200px;" class="card bg-primary text-white">
                            <div class="card-body text-center">
                            <p> <?php OrgCom($obj["id"]);  ?></p>
                          
                                <h6>Complete Task</h6>
                            </div>
                            </div>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                          <div style="width: 200px;" class="card bg-primary text-white">
                            <div class="card-body text-center">
                            <p> <?php OrgAct($obj["id"]);  ?></p>
                           
                                <h6>Working Task</h6>
                            </div>
                            </div>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                           <div style="width: 200px;" class="card bg-primary text-white">
                            <div class="card-body text-center">
                            <p> <?php OrgPen($obj["id"]);  ?></p>
                             
                                <h6>Pending Task</h6>
                            </div>
                            </div>
                    </div>
                    
                    </div>
    <?php
               }
                 ?>

          
            <!-- <?php
            if($_SESSION["obj"]) {
                echo json_encode($_SESSION["obj"]);
            }
            else{
                echo json_encode($_SESSION["obj"]);
                header("Location:./index.php");
               // header("Location: ./index.php");
            }
            ?> -->
        </div>
  
        
        <!-- Contact End -->

<?php include 'footer.php' ?>