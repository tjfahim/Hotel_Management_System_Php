<?php 
   session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Appointment</title>
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
                    <h4 class="my-2">Total Appointments</h4>

                    <?php

                        $qu= "SELECT * FROM appointment WHERE status='Pending' ORDER BY date_booked ASC";
                        $res=mysqli_query($con,$qu);

                        
                        $output="";

                        $output .="
                        <table class='table table-bordered'>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Phone Number</th>
                                <th>Appointment Date</th>
                                <th>Symptomps</th>
                                <th>Date Booked</th>
                                <th>Action</th>
                            </tr>

                        ";

                        if(mysqli_num_rows($res)<1){
                            $output .="
                            <tr>
                                <td colspan='9' class='text-center'>No Appointment Available.</td>
                            </tr>
                            "
                            ;
                        }

                        while($row = mysqli_fetch_array($res))
                        {
                            $output .="
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['firstname']."</td>
                                <td>".$row['lastname']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['phone']."</td>
                                <td>".$row['appointment_date']."</td>
                                <td>".$row['symptoms']."</td>
                                <td>".$row['date_booked']."</td>
                                <td>
                                   <a href='discharge.php?id=".$row['id']."'>
                                    <button class='btn btn-info'>Check</button>;
                                    </a>
                                </td>   "                 
                        
                            ;
                        }
                           
                        

                        $output .='
                        </tr>
                        </table>
                        ';
                        echo $output;
                        ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>