<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
    <meta charset="utf-8">
    <title>mVMS - volunteer management system</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php" class="navbar-brand p-0">
                    <h1 class="m-0">mVMS</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <?php

                        if(isset($_SESSION["obj"]) && $_SESSION["obj"]) {
                            ?>
                               <!-- <a href="profile.php" class="nav-item nav-link">Profile</a> -->
                            <?php
                            $obj=$_SESSION["obj"];
                            if($obj["role"]=="user"){
                                //volunteer
                                ?>
                            <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Projects</a>
                            <div class="dropdown-menu m-0">
                                <a href="projectsList.php?project=new" class="dropdown-item">New Projects</a>
                                <a href="ActiveProjectsList.php?project=existing" class="dropdown-item">Existing Project</a>
                            </div>
                        </div>
                                 <!-- <a href="projectsList.php" class="nav-item nav-link">Projects</a> -->
                                <?php
                            }
                            else if($obj["role"]=="admin"){
                                //admin
                                ?>
                                  <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Volunteers</a>
                            <div class="dropdown-menu m-0">
                                <a href="volunteers.php" class="dropdown-item">Volunteers List</a>
                                <a href="volunteersRequest.php" class="dropdown-item">Volunteers Request</a>
                            </div>
                        </div>
                                <!-- <a href="volunteers.php" class="nav-item nav-link">Volunteers</a> -->
                                <a href="organizations.php" class="nav-item nav-link">Organizations</a>
                                <a href="projects.php" class="nav-item nav-link">Projects</a>
                               <?php
                            }
                            else if($obj["role"]=="org"){
                                //org
                                ?>
                                <!-- <a href="#" class="nav-item nav-link">Organization</a> -->
                                <a href="projects.php" class="nav-item nav-link">Projects</a>
                               <?php
                            }
                          ?>
                              <a href="profile.php" class="nav-item nav-link">Profile</a>
                          <?php
                        }
                    
                        ?>
                        
                        <!-- <a href="service.html" class="nav-item nav-link">Service</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="feature.html" class="dropdown-item">Features</a>
                                <a href="quote.html" class="dropdown-item">Free Quote</a>
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div> -->

                 
                      
                    </div>
                    <?php
                    if(isset($_SESSION["obj"]) &&  $_SESSION["obj"]) {
                       
                    
                        ?>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-success" data-bs-toggle="dropdown">
                                <?php
                                      echo $obj["name"];
                                ?>
                            </a>
                            <div class="dropdown-menu m-0">
                            <a href="dashboard.php" class="dropdown-item">Dashboard</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                             
                            </div>
                        </div>

                       <?php
                    }
                    else{
                      ?>
                    <a href="login.php" class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-5">Login</a>
                      <?php
                    }
                    ?>
                </div>
            </nav>