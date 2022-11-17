<?php 
   session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Income</title>
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
                    <h4 class="my-2">Total Income</h4>

                    <?php

                        $qu= "SELECT * FROM income ORDER BY date_discharge ASC";
                        $res=mysqli_query($con,$qu);

                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                                <th>Id</th>
                                <th>Doctor</th>
                                <th>Patient</th>
                                <th>Date Discharge</th>
                                <th>Amount Paid</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='5' class='text-center'>No Patient Discharge Yet.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res)){
                            $output .="
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['doctor']."</td>
                                <td>".$row['patient']."</td>
                                <td>".$row['date_discharge']."</td>
                                <td>".$row['amount_paid']."</td>
                               
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