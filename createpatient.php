<?php 
include('include/connection.php');

if(isset($_POST['create'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['password'];
    $error=array();
    
    if(empty($firstname)){
        $error['patient']='Enter First Name';
    }else if(empty($lastname)){
        $error['patient']='Enter Last Name';
    }else if(empty($username)){
        $error['patient']='Enter User Name';
    }else if(empty($email)){
        $error['patient']='Enter Email';
    }else if(empty($gender)){
        $error['patient']='Select Gender';
    }else if(empty($phone)){
        $error['patient']='Enter Phone Number';
    }else if(empty($password)){
        $error['patient']='Enter Password';
    }else if(empty($cpassword)){
        $error['patient']='Enter Confirm Password';
    }else if($password!=$cpassword){
        $error['patient']='Password Doesnot match';
    }
   
    if(count($error)==0){
        $query="INSERT INTO patient(firstname,lastname,username,email,gender,phone,image,password,date_reg) VALUES ('$firstname','$lastname','$username','$email','$gender','$phone','patient.jpg','$password',NOW())";
        $result=mysqli_query($con,$query);
        if($result){
            echo"<script>alert('You Have Successfully Register')</script>";
            header("location:patientlogin.php");

        }else{
           
            echo"<script>alert('Failed')</script>";
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
    <title>Create an account as Patient</title>
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
                    <h4 class="text-center">Patient Registration Form</h4>
                    <form action="" method="post" class="py-2">
                     
                            <?php
                            if(isset($error['patient'])){
                                $sh=$error['patient'];
                                $show="<h4 class='alert alert-danger'>$sh</h4>";
                                echo $show;
                                
                            }
                        
                            ?>
                   
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter First Name" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];}?>">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" class="form-control" autocomplete="off" placeholder="Enter Last Name" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];}?>">
                        </div>
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])){echo $_POST['uname'];}?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
                        </div>
                        <div class="form-group">
                            <label for=""> Select Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>">
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="Confirm password" name="cpassword" class="form-control" placeholder="Enter Password" value="<?php if(isset($_POST['cpassword'])){echo $_POST['cpassword'];}?>">
                        </div>
                       
                        <input type="submit" name="create" class="btn btn-success">
                        <div>Already have an accout? <a href="patientlogin.php">Login</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>