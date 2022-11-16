<?php
include("../include/connection.php");

$id=$_POST['id'];

$qu="UPDATE doctors SET status='Approved' WHERE id='$id'";
mysqli_query($con,$qu);

?>