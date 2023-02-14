<?php
include 'header.php' ?>
<?php

include 'php/model/project.php';
//$result=readAllDataUser("Active");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET["iid"])){
         $pid=$_GET["iid"];
         $row= $_SESSION["obj"];
        // echo $row['id'];
         saveAssign($pid,$row['id']);
        echo "<script>window.location.href='projectsList.php?project=new';</script>";
       // exit;
        // header("Location:projectsList.php");
        // exit();
    }
    if (!empty($_GET["ch"])){
        $pid=$_GET["ch"];
      //  $row= $_SESSION["obj"];
        echo "chat";

       // saveAssign($pid,$row['id']);
     //  header("Location:chat.php");
   }
    if (!empty($_GET["project"])){
        $pid=$_GET["project"];
        if($pid=="existing")
        $result=readAllAssign($_SESSION["obj"]["id"]);
        else
        $result=readAllDataUser($pid);
    }

    

 //  header("Location:chat.php");
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    document.getElementById('chat').style.display='block';
    function abc(){
        $(document).ready(function(){
            $("#chat").hide();
        });

        // const queryString = window.location.search;
        // const urlParams = new URLSearchParams(queryString);
        // const product = urlParams.get('project')
        // element = document.getElementById('chat');
        // element.style.display = "none";
        // alert("hjhj")
    }
    abc()
</script>

            <div class="container-fluid bg-primary" style="padding: 6rem 0;">
                <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-3">New Projects</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Project</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">New</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <h3>New Projects List</h3>
        <!-- <a href="addProject.php">add Project</a> -->
        <div class="container-xxl py-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <!-- <th>Status</th> -->
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
                        <!-- <td><?php echo $row["crDate"]; ?></td> -->
                        <th>
                        <div class="d-flex justify-content-evenly"> 
                         <a id="Participate" href="projectsList.php?iid=<?php echo $row["id"]; ?>"> Participate </a>   
                 
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