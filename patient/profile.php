<?php 
   session_start();
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
</head>
<body>
    
    <?php 
    include("../include/header.php");
    include("../include/connection.php");

    $patient = $_SESSION['patient'];
    $query = "SELECT * FROM patient WHERE username='$patient'";
    $res = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($res)){
        $username=$row['username'];
        $image=$row['image'];
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
                                <h3 class=""><?php echo '<strong>'.$username.'</strong>'; ?>'s Profile</h3>

                                <?php
                                    if(isset($_POST['update'])){
                                        $img = $_FILES['image']['name'];
                                        $dir="img/${img}";
                                        if(empty($img)){
                                            $i="<h4 class='alert alert-success'>Empty image</h4>";

                                            echo  $i;
                                        }else{
                                            $query = "UPDATE patient SET image='$img' WHERE username='$patient'";
                                            $res = mysqli_query($con,$query);
                                            if($res){
                                                move_uploaded_file($_FILES['image']['tmp_name'],$dir);
                                            }
                                            $i="<h4 class='alert alert-success'>image updated</h4>";
                                            echo $i;
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
                                <br>
                                <div class="my-3">
                                    <table class="table table-bordered">
                                    <?php 
                                        $qu = "SELECT * FROM patient WHERE username='$patient'";
                                        $re = mysqli_query($con,$query);
                                        $ro=mysqli_fetch_array($re);
                                        
                                    ?>

                                        <tr>
                                            <th colspan="2" class="text-center">Details</th>
                                        </tr>

                                        <tr>
                                            <td>First Name</td>
                                            <td><?php echo $ro['firstname']?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td><?php echo $ro['lastname']?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $ro['email']?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td><?php echo $ro['gender']?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td><?php echo $ro['phone']?></td>
                                        </tr>
                              
                                        <tr>
                                            <td>Date Registration</td>
                                            <td><?php echo $ro['date_reg']?></td>
                                        </tr>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <?php
                                    if(isset($_POST['change'])){
                                        $uname = $_POST['uname'];
                                        if(empty($uname)){
                                            $error['q']="Empty Username";
                                        }else{
                                            $query = "UPDATE patient SET username='$uname' WHERE username='$patient'";
                                            $res = mysqli_query($con,$query);
                                            
                                            if($res){
                                                $_SESSION['patient']=$uname;
                                            }
                                        }
                                    }
                                ?>
                               
                                <form method="post">
                                <h3>Change Username</h3>

                               <br>
                                <div class="form-group">
                                    <label for="image">Update Username</label>
                                    
                                    <?php
                                    // if($error['q']){
                                    //     $sh=$error['q'];
                                    //     $show="<h4 class='alert alert-danger'>$sh</h4>";

                                    //     echo $show;                                    
                                        
                                    // }?>
                                    <input type="text" name="uname" placeholder="<?php echo $patient ?>" class="form-control">
                                </div>
                     
                                <input type="submit" name="change" value="Update Username" class="btn btn-success">

                                </form>
                                 <br>
                                <br>
                                <form action="" method="post">
                                    <?php 
                                    if(isset($_POST['update_pass'])){
                                        $old_pass = $_POST['old_password'];
                                        $new_pass = $_POST['new_password'];
                                        $cnf_pass = $_POST['cnf_password'];

                                        $error=array();
                                        $old=mysqli_query($con,"SELECT * FROM patient WHERE username='$patient'");
                                        $row=mysqli_fetch_array($old);
                                        $pass=$row['password'];                                        

                                        if(empty($old_pass)){
                                            $error['p']="Enter old password";
                                        }else if(empty($new_pass)){
                                            $error['p']='Enter new password';
                                        }else if(empty($cnf_pass)){
                                            $error['p']='Enter confirm password';
                                        }else if($old_pass!=$pass){
                                            $error['p']='Old password does not match';
                                        }else if($new_pass!=$cnf_pass){
                                            $error['p']='Confirm password is incorrect';
                                        }

                                        if(count($error)==0){
                                            $query="UPDATE patient SET password='$new_pass' WHERE username='$patient'";
                                            mysqli_query($con,$query);
                                            $succ="<h4 class='alert alert-success'>Password change successfully</h4>";
                                            echo $succ;
                                        }
                                    }
                                    ?>
                                    <h3>Change Password</h3>

                                    <?php 
                                    if(isset($error['p'])){
                                        $sh=$error['p'];
                                        $show="<h4 class='alert alert-danger'>$sh</h4>";
                                        echo $show;

                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="">Old Password</label>
                                        <input type="password" name="old_password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="password" name="new_password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="cnf_password" class="form-control">
                                    </div>
                                    <input type="submit" name="update_pass" value="Update Password" class="btn btn-info">
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