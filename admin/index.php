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
                    <h4 class="my-2">Admin Dashboard</h4>

                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success m-2" style="height: 140px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php 
                                                $ad = mysqli_query($con,"SELECT * FROM admin");
                                                $num = mysqli_num_rows($ad);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"> <?php echo $num; ?> </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <i class="fas fa-users-cog fa-3x my-4" style="color:white;"></i>
                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div class="col-md-3 bg-info m-2" style="height: 140px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <i class="fas fa-user-md fa-3x my-4" style="color:white;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning m-2" style="height: 140px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patient</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <i class="fas fa-procedures fa-3x my-4" style="color:white;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-primary m-2" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Report</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <i class="fa fa-flag fa-3x my-4" style="color:white;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-dark m-2" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Job Request</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <i class="fa fa-book-open fa-3x my-4" style="color:white;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-secondary m-2" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Report</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <i class="fa fa-money-check-alt fa-3x my-4" style="color:white;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>