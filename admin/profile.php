<?php 
   session_start();
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<body>
    
    <?php 
    include("../include/header.php");
    include("../include/connection.php");

    $ad = $_SESSION['admin'];
    $query = "SELECT * FROM admin WHERE username='$ad'";
    $res = mysqli_query($con,$query);
   
    while($row=mysqli_fetch_array($res)){
        $username=$row['username'];
        $image=$row['profile'];
    }
    
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class=""><?php echo '<strong>'.$username.'</strong>'; ?> Profile</h3>

                                <?php
                                    if(isset($_POST['update'])){
                                        $img = $_FILES['image']['name'];
                                        $dir="img/${img}";
                                        // print_r($img);
                                        if(empty($img)){
                                            echo 'profile empty';
                                        }else{
                                            $query = "UPDATE admin SET profile='$img' WHERE username='$ad'";
                                            $res = mysqli_query($con,$query);
                                            if($res){
                                                move_uploaded_file($_FILES['image']['tmp_name'],$dir);
                                            }
                                            echo'image updated';
                                        }
                                    }
                                ?>
                               
                                <form method="post" enctype="multipart/form-data">

                                <?php echo "<img src='img/$image' class='col-md-12' style='height:250px;'>";
                                ?><br>
                                <div class="form-group">
                                    <label for="image">Update Profile Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                 <input type="submit" name="update" value="Update Image" class="btn btn-success">

                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    if(isset($_POST['change'])){
                                        $uname = $_POST['uname'];
                                        if(empty($uname)){
                                            echo 'profile uname';
                                        }else{
                                            $query = "UPDATE admin SET username='$uname' WHERE username='$ad'";
                                            $res = mysqli_query($con,$query);
                                            
                                            if($res){
                                                $_SESSION['admin']=$uname;
                                            }
                                        }
                                    }
                                ?>
                               
                                <form method="post">
                                <h3>Change Username</h3>

                               <br>
                                <div class="form-group">
                                    <label for="image">Update Username</label>
                                    <input type="text" name="uname" placeholder="<?php echo $ad ?>" class="form-control">
                                </div>
                     
                                <input type="submit" name="change" value="Update Username" class="btn btn-success">

                                </form>
                                 <br>
                                <br>
                                <form method="post">
                                    <?php
                                    if(isset($_POST['changepassword'])){
                                        $old=$_POST['oldpassword'];
                                        $new=$_POST['newpassword'];
                                        $con=$_POST['conpassword'];
                                        $error=array();
                                       
                                        $qy="SELECT * FROM admin WHERE username='$ad'";
                                        $old_pass = mysqli_query($con,$qy);
                                        var_dump($old_pass);
                                        $row=mysqli_fetch_array($old_pass);
                                        echo $row['username'];
                                        $pass=$row['password'];
                                        if (empty($old)) {  
                                            $error['p'] = "Error! You didn't enter Old Password.";  
                                        } else if(empty($new)) {  
                                            $error['p'] = "Error! You didn't enter New Password.";  
                                        } else if(empty($con)) {  
                                            $error['p'] = "Error! You didn't enter Confirm Password.";  
                                        } 
                                        else if($old != $old_pass){
                                            $error['p'] = "Error! You Old Password does not match";  
                                        } 
                                        else if($new != $con){
                                            $error['p'] = "Error! Confirm Password does not match";  
                                        }

                                        if(count($error)==0){
                                            $query="UPDATE admin SET password='$new' WHERE username='$ad'";
                                            mysqli_query($con,$query);
                                        }
                                        if(isset($error['p'])){
                                            $e=$error['p'];
                                            $show="<h5 class='text-center alert alert-danger'>$e</h5>";
                                        }else{
                                            $show="";
                                        }
                                    }
                                    ?>
                                    <h3>Change Password</h3>
                                    <?php
                                    echo $show;
                                    ?>
                               <br>
                                <div class="form-group">
                                    <label for="oldpassword">Old Password</label>
                                    <input type="password" name="oldpassword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="newpassword">New Password</label>
                                    <input type="password" name="newpassword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="conpassword">Confirm Password</label>
                                    <input type="password" name="conpassword" class="form-control">
                                </div>
                                <input type="submit" name="changepassword" value="Update Password" class="btn btn-success">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>