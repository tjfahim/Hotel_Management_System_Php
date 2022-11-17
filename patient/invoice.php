<?php 
   session_start();
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Invoice</title>
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
                    <h4 class="my-2">My Invoice</h4>

                    <?php
                        $pat=$_SESSION['patient'];
                        $qu="SELECT * FROM patient WHERE username='$pat'";
                        $re=mysqli_query($con,$qu);
                        $row=mysqli_fetch_array($re);
                        $fname=$row['firstname'];
                        $qure=mysqli_query($con,"SELECT * FROM income WHERE patient ='$fname'");
                        $output='';
                        $output .='<table class="table table-bordered">
                                    <tr>
                                        <td>Id</td>
                                        <td>Doctor</td>
                                        <td></td>
                                        <td>Patient</td>
                                        <td>Date Discharge</td>
                                        <td>Amount Paid</td>
                                        <td>Description</td>
                                    </tr>
                        
                        ';
                        if(mysqli_num_rows($qure)<1){
                            $output .='
                            <tr>
                                <td colspan="7" class="text-center">No Invoice Yet</td>
                            </tr>
                            ';
                        }

                        while($row=mysqli_fetch_array($qure)){
                            $output .='
                            <tr>
                                <td>'.$row["id"].'</td>
                                <td>'.$row["doctor"].'</td>
                                <td>'.$row["patient"].'</td>
                                <td>'.$row["date_discharge"].'</td>
                                <td>'.$row["amount_paid"].'</td>
                                <td>'.$row["description"].'</td>
                                <td>
                                    <a href="view.php?id='.$row["id"].'">
                                        <button class="btn btn-info">View</button>
                                    </a>
                                </td>
                          
                            ';
                        }

                        $output .='</tr></table>';
                        echo $output;
                    ?>
                   
            </div>
        </div>
    </div>
    
</body>
</html>