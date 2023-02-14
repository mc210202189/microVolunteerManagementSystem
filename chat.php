<?php

// if(!isset($_SESSION)) 
// { 
//     session_start(); 
// } 

include 'header.php' ?>

<?php
// include 'php/model/chat.php';
// $result=readAllData();

?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

function loadapi(){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML = this.responseText;
    }
    xhttp.open("GET", "php/model/test.php?pid=<?php echo $_GET['id']; ?>");
    xhttp.send();
}
setInterval(() => {
    loadapi();
    //document.getElementById("demo").innerHTML =new Date().toLocaleTimeString()
}, 1000);

loadapi();
function sendmsg(){
    try {
      let msg=  document.getElementById("msg").value;
      if(msg.trim().length>0){
            $.post("php/model/chatPost.php",
            {
                name: msg,
                pid:<?php echo $_GET['id']; ?>,
                uid:<?php echo $_SESSION["obj"]["id"]; ?>

            },
            function(data, status){
                if(status>399)
            console.error("Data: " + data + "\nStatus: " + status);
            });
            document.getElementById("msg").value="";
        }
    } catch (error) {
        console.error(error);
    }
}
$(document).ready(function()
{
    $("#submit").click(function(event)
    {
        event.preventDefault();
        sendmsg()
    });
});

// $(document).ready(function(){
//     try {
//         $.post("php/model/chatPost.php",
// {
//     name: "Donald Duck",
//     city: "Duckburg"
// },
// function(data, status){
// alert("Data: " + data + "\nStatus: " + status);
//   });
  
//     } catch (error) {
//         alert(error)
//     }
// });
// $.ajax({
//         url: "https://app.asana.com/-/api/0.1/workspaces/",
//         type: 'GET',
//         dataType: 'json', // added data type
//         success: function(res) {
//             console.log(res);
//             alert(res);
//         }
//     });
// function abc(){
//     $.get("php/model/test.php", (data, status)=>{
// alert("Data: " + data + "\nStatus: " + status);
// });

    //  // Fire off the request to /form.php
    //  request = $.ajax({
    //     url: "/form.php",
    //     type: "post",
    //     data: "serializedData"
    // });

    // // Callback handler that will be called on success
    // request.done(function (response, textStatus, jqXHR){
    //     // Log a message to the console
    //     console.log("Hooray, it worked!");
    // });

    // // Callback handler that will be called on failure
    // request.fail(function (jqXHR, textStatus, errorThrown){
    //     // Log the error to the console
    //     console.error(
    //         "The following error occurred: "+
    //         textStatus, errorThrown
    //     );
    // });

    // // Callback handler that will be called regardless
    // // if the request failed or succeeded
    // request.always(function () {
    //     // Reenable the inputs
    //     $inputs.prop("disabled", false);
    // });

</script>



            <div class="container-xxl bg-primary page-header">
                <!-- <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-3">Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div> -->
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/about.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <!-- start  -->
                        <div class="card">
            <div class="card-header">Message Box</div>
            <div class="card-body bg-primary">
            <div id="demo" style="
            width: 100%;
            height:400px;
            overflow: scroll;"></div>
            </div>
            <div class="card-footer">
   
                <form>
                    <div class="row">
                            <div class="col-10">
                                <input type="text" id="msg" class="form-control">
                            </div>
                            <div class="col-1">
                                <button  class="btn btn-danger" id="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
        </div>



 

        
        <!-- Contact End -->

<?php include 'footer.php' ?>