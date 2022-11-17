<?php 
   session_start();
include('../include/connection.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
</head>
<body >
    <?php 
        include('../include/header.php')
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
                    <h4 class="my-2 text-center">Book Appointment Form</h4>

                    <?php 
                        $pat=$_SESSION['patient'];
                        $sel=mysqli_query($con,"SELECT * FROM patient WHERE username='$pat'");
                        $row=mysqli_fetch_array($sel);
                        $firstname=$row['firstname'];
                        $lastname=$row['lastname'];
                        $gender=$row['gender'];
                        $phone=$row['phone'];

                        if(isset($_POST['book'])){
                            $date = $_POST['date'];
                            $sym = $_POST['sym'];

                            if(empty($sym)){

                            }else{
                                $query ="INSERT INTO appointment(firstname,lastname,gender,phone,appointment_date,symptoms,status,date_booked) VALUES('$firstname','$lastname','$gender','$phone','$date','$sym','Pending',NOW())";
                                $res =mysqli_query($con,$query);
                                if($res){
                                    echo '<script>alert("Booked Appointment Successfully")</script>';
                                }
                            }
                        }

                    ?>
                    <form action="" method="post" class="py-2">
                     
                            <?php
                            // if(isset($error['patient'])){
                            //     $sh=$error['patient'];
                            //     $show="<h4 class='alert alert-danger'>$sh</h4>";
                            //     echo $show;
                                
                            // }
                        
                            ?>
                   
                       
                        <div class="form-group">
                            <label for="lname">Appointment Date</label>
                           <input type="date" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lname">Symptoms</label>
                            <input type="text" name="sym" class="form-control" placeholder="Enter Symtoms">
                        </div>
                       
                        <input type="submit" name="book" class="btn btn-success my-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>