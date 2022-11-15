<?php 
include('include/connection.php');

if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['password'];

    $error=array();
    $q="SELECT * FROM doctors WHERE username='$username' AND password='$password'";
    $qq=mysqli_query($con,$q);
    $row=mysqli_fetch_array($qq);
    if(empty($username)){
        $error['doctor']=['Enter Username'];
    }else if(empty($password)){
        $error['doctor']=['Enter Password'];
    }else if($row['status']=="Pending"){
        $error['doctor']=['Please wait for the admin to confirm'];
    }else if($row['status']=="Rejected"){
        $error['doctor']=['Try again leter'];
    }
   
    if(count($error)==0){
        $query="SELECT * FROM doctors WHERE username='$username' AND password='$password'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1){
            
            echo"<script>alert('You are login as Doctor')</script>";
            session_start();
            $_SESSION['doctor']=$username;
            header("location:index.php");
            exit();

        }else{
           
            echo"<script>alert('Invalid Username or Password')</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor login page</title>
</head>
<body style="background-image:url(img/hospital.jpg); background-repeat: no-repeat; background-size:cover ;"></body>
    <?php 
        include('include/header.php')
    ?>
    <div style="margin-top: 30px;"></div>
    
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <h3 class="text-center">Doctor Login</h3>
                    <form action="" method="post" class="py-2">
                            <?php
                            if(isset($error['doctor'])){
                                $sh=$error['doctor'];
                                $show="<h4 class='alert alert-danger'>$sh[0]</h4>";
                                echo $show;
                                
                            }                        
                            ?>
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-success">
                        <div>Dont have an account? <a href="createdoctor.php" class="text-primary">Create Account</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>