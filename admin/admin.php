<?php 
   session_start();
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">All Admin</h5>
                                <?php
                                $adm= $_SESSION['admin'];
                                $query = "SELECT * FROM admin WHERE username !='$adm'";
                                $res = mysqli_query($con,$query);
                                $output = "
                                <table class='table table-bordered'>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th style='width:10% ;''>Action</th>
                                    </tr>
                                
                                ";
                                if(mysqli_num_rows($res)<1){
                                    $output .="<tr><td colspan='3' class='text-center'>No New Admin</td></tr>";
                                }
                                while($row = mysqli_fetch_array($res)){
                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $output .="
                                    <tr >
                                    <td>$id</td>
                                        <td>$username</td>
                                        <td>
                                        <a href='admin.php?id=$id'><button class='btn btn-danger' id='$id' >Remove</button></a>
                                        
                                        </td>
                                    ";
                                    
                                }
                                $output .="   </tr>
                                </table>";
                                echo $output;
                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];
                                    $q="DELETE FROM admin WHERE id='$id'";
                                    // $re=mysqli_connect($con,$q);
                                    if ($con->query($q) === TRUE) {
                                        // header("Refresh:0");
                                        echo "<p class='text-success'> Admin removed successfully</p>";
                                        
                                      } else {
                                        echo "<p class='text-danger'> Error removed record</p>" . $con->error;
                                      }
                                    
                                }
                                ?>
                                        
                                 
                            </div>
                            <div class="col-md-6">
                                <?php
                                if(isset($_POST['add'])){
                                    $uname=$_POST['uname'];
                                    $password=$_POST['password'];
                                    $img=$_FILES['file']['name'];
                                    $dir="img/${img}";
                                    $error=array();
                                    if(empty($uname)){
                                        $error['u']='Enter Admin Username';
                                    }else if(empty($password)){
                                        $error['u']='Enter Admin Password';
                                    }else if(empty($img)){
                                        $error['u']='Select Admin Image';
                                    };

                                    if(count($error)==0){
                                        $q="INSERT INTO admin(username,password,profile) VALUES('$uname','$password','$img')";
                                        $result=mysqli_query($con,$q);
                                        if($result){
                                            move_uploaded_file($_FILES['file']['tmp_name'],$dir);
                                            
                                        }else{

                                        }
                                    }
                                }
                                if(isset($error['u'])){
                                    $er=$error['u'];
                                    $show="<h3 class='text-center alert alert-danger'>$er</h3>";
                                }else{
                                    $show="";
                                }
                                ?>
                                <h5 class="text-center">Add Admin</h5>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <?php echo $show?>
                                        <label for="uname">Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="password]">Password</label>
                                        <input type="password" name="password" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Image</label><br>
                                        <input type="file" name="file" class="">
                                    </div>
                                    <input type="submit" name="add" value="Add New Admin" class="btn btn-success">
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