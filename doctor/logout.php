<?php 
session_start();
if($_SESSION['doctor']){
    unset($_SESSION['doctor']);
    header('location:../index.php');
}
?>