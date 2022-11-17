<?php 
   session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Patient Appointment</title>
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
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $qu="SELECT * FROM appointment WHERE id='$id'";
                            $res=mysqli_query($con,$qu);
                            $row=mysqli_fetch_array($res);
                        }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">

                                    <tr>
                                        <td colspan="2" class="text-center">Appointment Details</td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td><?php echo $row['firstname'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lastname Name</td>
                                        <td><?php echo $row['lastname'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td><?php echo $row['phone'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Appointment Date</td>
                                        <td><?php echo $row['appointment_date'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Symptoms</td>
                                        <td><?php echo $row['symptoms'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center my-1"> Invoice</h5>
                                <?php 
                                if(isset($_POST['send'])){
                                    $fee=$_POST['fee'];
                                    $description=$_POST['description'];
                                    

                                    if(empty($fee)){

                                    }else if(empty($description)){

                                    }else{
                                        $doc= $_SESSION['doctor'];
                                        $fname=$row['firstname'];
                                        $query="INSERT INTO income(doctor,patient,date_discharge,amount_paid,description) VALUES('$doc','$fname',NOW(),'$fee','$description')";
                                        $res=mysqli_query($con,$query);
                                        if($res){
                                            echo "<script>alert('You have sent Invoice')</script>";
                                            mysqli_query($con,"UPDATE appointment SET status='Discharge' WHERE id='$id'");
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="post">
                                    <label for="">Fee</label>
                                    <input type="number" name="fee" class="form-control" placeholder="Enter Patient Fee">
                                    <label for="">Description</label>
                                    <input type="text" name="description" class="form-control" placeholder="Enter Description">
                                    <input type="submit" value="send" name="send" class="btn btn-primary my-2">
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