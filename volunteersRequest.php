<?php
//session_start();
include 'header.php' ?>


<?php

include 'php/model/volunteer.php';
$msg="";
$result=readAllData();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id;
    if (!empty($_GET["d"])){
        $id=$_GET["d"];
       deleteVol($id);
      echo "<script>window.location.href='volunteers.php';</script>";
      exit;

    }
    if (!empty($_GET["a"])){
        $id=$_GET["a"];
        approvedVol($id);
        echo "<script>window.location.href='volunteers.php';</script>";
       // header("Location:volunteers.php");
    }

}
?>
<script>
    function deleteAlt(id){
        if (confirm("Do You Want To Delete This Record !") == true) {
            window.location.href="volunteers.php?d="+id;
        } 
    }
</script>

            <div class="container-xxl bg-primary page-header">
                <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-3">Volunteers Request</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                             <li class="breadcrumb-item text-white active" aria-current="page">Volunteers</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <h3>Volunteers</h3>
        <div class="container-xxl py-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>PhoneNo</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th class="d-flex justify-content-evenly">Action</th>
                    </tr>
                </thead>
             <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $count=1;
                  while($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                      <td><?php echo $count; $count++; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["phoneNo"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <th>
                        <div class="d-flex justify-content-evenly"> 
                         <a onclick="deleteAlt(<?php echo $row['id'];?>)">  <i class="bi bi-trash text-danger"></i> </a>   
                         <a href="volunteers.php?a=<?php echo $row["id"]; ?>">  <i class="bi bi-check-all text-success"></i> </a> 
                        
                        </div>
                        </th>
                    </tr>
                    <?php
                 // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                  }
                  } else {
                  echo "0 results";
                  }
                ?>
                  
             </tbody>
            </table>
        </div>
        <div  class="py-2 bg-dark">
            
            </div>
        
        <!-- Contact End -->

<?php include 'footer.php' ?>