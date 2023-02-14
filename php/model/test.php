<style>
  .m0 {
			box-sizing: border-box;
			padding: 0.5rem 1rem;
			margin: 1rem;
			background: #FFF;
			border-radius: 1.125rem 1.125rem 1.125rem 0;
			min-height: 2.25rem;
			width: fit-content;
			max-width: 66%;
			
			box-shadow: 
				0 0 2rem rgba(black, 0.075),
				0rem 1rem 1rem -1rem rgba(black, 0.1);
			
  }
  .m1 {
			box-sizing: border-box;
			padding: 0.5rem 1rem;
			background: #000;

			min-height: 2.25rem;
			width: fit-content;
			max-width: 66%;
			
			box-shadow: 
				0 0 2rem rgba(black, 0.075),
				0rem 1rem 1rem -1rem rgba(black, 0.1);
				margin: 1rem 1rem 1rem auto ;
				border-radius: 1.125rem 1.125rem 0 1.125rem;
				color: white;
			}
</style>
<?php
            include 'chat.php';
            
            $result=readAllData($_GET['pid']);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $count=1;
                  while($row = mysqli_fetch_assoc($result)) {
                    if($_SESSION["obj"]["id"]==$row["uid"]){
                      ?>
                        <div class="m1">
                        <?php echo $row["msg"]; ?>
                        </div>
                      <?php
                    }else{
                      ?>
                        <div class="m0">
                        <?php echo $row["msg"]; ?>
                        </div>
                        <Label>form : <?php echo $row["name"]; ?></Label>
                     <?php
                    }

              }
                  } else {
                  echo "0 results";
                  }
                ?>