<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include("include/header.php") ?>
<div style="margin-top: 50px;"></div>
    <div class="container">
        <div class="col-md-12 ">
            <div class="row">
                <!-- <div class="col-md-3 mx-1 shadow">
                    <img src="img/download.png" style="width: 238px; height:204px" alt="">
                    <h5 class="text-center"> Click button for more information</h5>
                    <a href="#">
                        <button class="btn btn-success my-3" style="margin-left: 20%;">More Information</button>
                    </a>
                </div> -->
                <div class="col-md-4 mx-1 shadow">
                    <img src="img/patient.jpg" alt="" style="width: 342px; height:204px">
                    <h5 class="text-center"> Create Account so that we can  take good care of you</h5>
                    <a href="createpatient.php">
                        <button class="btn btn-success my-3" style="margin-left: 30%;">Create Account!!</button>
                    </a>
                </div>
                <div class="col-md-4 mx-1 shadow">
                    <img src="img/download.jpg" alt="" style="width: 342px; height:204px">
                    <h5 class="text-center"> We are employing for doctors, Click button below!</h5>
                    <a href="createdoctor.php">
                        <button class="btn btn-success my-3" style="margin-left: 30%;">Apply Now!!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>