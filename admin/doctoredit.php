<?php 
   session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Doctors</title>
</head>
<body>
    
    <?php 
    include("../include/header.php");
    include("../include/connection.php");
    
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                <?php
                    include('sidenav.php');
                ?>  
                </div>
                <div class="col-md-10">
                    <h4 class="my-2">Edit Doctor</h4>

                    <?php
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $query="SELECT * FROM doctors WHERE id='$id'";
                        $res=mysqli_query($con,$query);
                        $row=mysqli_fetch_assoc($res);
                    }
                    ?>

                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-center">Doctor details</h5>
                            <h5 class="my-3">Id: <?php echo $row['id']?></h5>
                            <h5 class="my-3">First Name: <?php echo $row['firstname']?></h5>
                            <h5 class="my-3">Last Name: <?php echo $row['lastname']?></h5>
                            <h5 class="my-3">User Name: <?php echo $row['username']?></h5>
                            <h5 class="my-3">Email: <?php echo $row['email']?></h5>
                            <h5 class="my-3">Phone: <?php echo $row['phone']?></h5>
                            <h5 class="my-3">Gender: <?php echo $row['gender']?></h5>
                            <h5 class="my-3">Country: <?php echo $row['country']?></h5>
                            <h5 class="my-3">Date Register: <?php echo $row['data_reg']?></h5>
                        </div>
                    </div>

                 </div>
          </div>
        </div>
    </div>
    
</body>
</html>