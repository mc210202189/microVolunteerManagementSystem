<?php include 'header.php' ?>
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
?>


            <div class="container-xxl bg-primary page-header">
                <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-3">Login Account</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                           <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Login</div>
                    <h2 class="mb-5">Login Account</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                        <!-- <p class="text-center mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <label for="name">Password</label>
                                    </div>
                              
                                </div>
                              
                                <!-- <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" name="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    
                                    <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                                    <a href="signup.php">Create New Account</a>
                        
                                    <?php
                                    if($msg==""){
                                       
                                    } 
                                    else{
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                                        <strong>Login Error : </strong><?php echo $msg; ?>
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