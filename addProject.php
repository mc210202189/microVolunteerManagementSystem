<?php
//session_start();
include 'header.php' ?>

<?php

include 'php/model/project.php';
$msg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname=$date=$time=$address="";
    if (!empty($_POST["pname"])){
        $pname=$_POST["pname"];
    }
    if (!empty($_POST["date"])){
        $date=$_POST["date"];
    }
    if (!empty($_POST["time"])){
        $time=$_POST["time"];
    }
    if (!empty($_POST["address"])){
        $address=$_POST["address"];
    }
    if($_SESSION["obj"]){
        $row= $_SESSION["obj"];
    }
   $msg= save($pname,$date,$time,$address,$row["id"]);
   // echo $name.$password.$email.$address.$phoneNo;
}
?>


            <div class="container-xxl bg-primary page-header">
                <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-3">Add Project</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">AddProject</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        

    
        <div class="container-xxl py-6">
            <div class="container">
         
                <div class="card">
                <h5 class="card-header"><a href="projects.php" class="btn btn-sm btn-primary mx-2">Back</a> Add Project</h5>
                <div class="card-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="row g-3">
                            <div class="col-12">
                                    <div class="form-floating">
                                        <input type="test" class="form-control" name="pname" required placeholder="Project">
                                        <label for="pname">Project Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="date" required placeholder="Choose Date">
                                        <label for="date">Date</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="time" class="form-control" name="time" required placeholder="Choose Time">
                                        <label for="time">Time</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="address"  required placeholder="Your Email">
                                        <label for="addres">Project Address</label>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <label for="name">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="cpassword" placeholder="Comfirm Password">
                                        <label for="name">Comfirm Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                        <label for="subject">Address</label>
                                    </div>
                                </div> -->
                                <!-- <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" name="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    
                                    <button class="btn btn-primary" type="submit">Add Project</button>
                                    <input type="reset" class="btn btn-danger" value="Reset">
                                    <?php
                                    if($msg==""){
                                       
                                    }
                                    else if($msg=="success"){
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                                    Project Added Successfully
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                                        <strong>Error : </strong><?php echo $msg ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    
                                </div>
                                
                            </div>
                        </form>
                </div>
                </div>
                </div>
                </div>

        
        <!-- Contact End -->

<?php include 'footer.php' ?>