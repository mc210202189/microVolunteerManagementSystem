<?php

// if(!isset($_SESSION)) 
// { 
//     session_start(); 
// } 


include 'header.php' ?>

<?php

include 'php/model/project.php';
$msg="";
$obj=$_SESSION["obj"];
$result=readAllData();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id;
    if (!empty($_GET["d"])){
        $id=$_GET["d"];
        deletePro($id);
       // echo "fsdfsdf";
       echo "<script>window.location.href='projects.php';</script>";
       // header("Location:projects.php");
    }
    if (!empty($_GET["a"])){
        $id=$_GET["a"];
        approvedPro($id);
        echo "<script>window.location.href='projects.php';</script>";
        //header("Location:projects.php");
    }

}
?>
<script>
    function deleteAlt(id){
        if (confirm("Do You Want To Delete This Record !") == true) {
            window.location.href="projects.php?d="+id;
        } 
    }
    function addpage(){
        alert("Account is not Actived by Admin")
    }
   function load(){

   }
</script>

            <div class="container-xxl bg-primary page-header">
                <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-3">Projects List</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Projects</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <h3>Projects List</h3>
        <?php
        if($obj["status"]=="Active")
        echo " <a href='addProject.php' class='btn btn-sm btn-primary mx-2'>Add Project</a>";
        else
        echo " <a  onclick='addpage()' class='btn btn-sm btn-primary mx-2'>Add Project</a>";
        ?>
       
        <div class="container-xxl py-6">
    
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Create Time</th>
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
                        <td><?php echo $row["pname"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php echo $row["crDate"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <th>
                        <div class="d-flex justify-content-evenly"> 
                        <a onclick="deleteAlt(<?php echo $row['id'];?>)"> <i class="bi bi-trash text-danger"></i> </a>   
                        <?php
                         $btn='<a href="projects.php?a='.$row["id"].'"><i class="bi bi-check-all text-success"></i> </a>';

                             if($obj["role"]=="admin")
                             echo $btn;
           
                        ?>
                    
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