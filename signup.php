<?php include 'header.php' ?>
<?php
include 'php/model/account.php';
$msg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$password=$cpassword=$email=$address=$role=$phoneNo="";
    if (!empty($_POST["first"])){
        $name=$_POST["first"];
    }
    if (!empty($_POST["last"])){
        $name=$name." ".$_POST["last"];
    }
    if (!empty($_POST["email"])){
        $email=$_POST["email"];
    }
    if (!empty($_POST["password"])){
        $password=$_POST["password"];
    }
    if (!empty($_POST["cpassword"])){
        $cpassword=$_POST["cpassword"];
    }
    if (!empty($_POST["address"])){
        $address=$_POST["address"];
    }
    if (!empty($_POST["role"])){
        $role=$_POST["role"];
    }
     if($password==$cpassword){
        $msg= save($name,$password,$email,$address,$phoneNo,$role);
     }else{
        $msg="Password and Comfirm password!";
     }

   // echo $name.$password.$email.$address.$phoneNo;
}
?>


            <div class="container-xxl bg-primary page-header">
                <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-3">SignUp Account</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Signup</li>
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
                    <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Sign Up</div>
                    <h2 class="mb-5">Create Account Free</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                        <!-- <p class="text-center mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="first" required placeholder="First Name">
                                        <label for="name">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="last" required placeholder="Last Name">
                                        <label for="name">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" required placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" required placeholder="Password">
                                        <label for="name">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="cpassword" required placeholder="Comfirm Password">
                                        <label for="name">Comfirm Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="address" required placeholder="Address">
                                        <label for="subject">Address</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-control" required name="role">
                                            <option value="user">User Profile</option>
                                            <option value="org">Organization Profile</option>
                                            
                                        </select>
            
                                        <label for="message">Account Role</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    
                                    <button class="btn btn-primary w-100 py-3" type="submit">Create Account</button>
                                    <?php
                                    if($msg==""){
                                       
                                    }
                                    else if($msg=="success"){
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                                    Account Register Successfully
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