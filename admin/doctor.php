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
                    <h4 class="my-2">Total doctors</h4>

                    <?php

                        $qu= "SELECT * FROM doctors WHERE status='Approved' ORDER BY data_reg ASC";
                        $res=mysqli_query($con,$qu);

                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Gender</th>
                                <th>Country</th>
                                <th>Date Register</th>
                                <th>Action</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='10' class='text-center'>No Approve Doctor Available.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $output .="
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['firstname']."</td>
                                <td>".$row['lastname']."</td>
                                <td>".$row['username']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['phone']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['country']."</td>
                                <td>".$row['data_reg']."</td>
                                <td>
                                <a href='doctoredit.php?id=".$row['id']."'>
                                <button id='' class='btn btn-info btn-sm '>Edit</button>;
                                </a>

                                </td>
                        
                            ";
                        }

                        $output .="
                        </tr>
                        </table>
                        ";
                        echo $output;
                        ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>