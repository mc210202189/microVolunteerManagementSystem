<?php
            include 'chat.php';
       
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $msg= $_POST['name'];
              $pid= $_POST['pid'];
              $uid= $_POST['uid'];
              save($pid,$uid,$msg);
              }
             else if ($_SERVER["REQUEST_METHOD"] == "GET") {
                echo "gettt";
                }
              else
              echo "not found";
     
                  
                ?>