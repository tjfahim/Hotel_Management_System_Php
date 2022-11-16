<?php 
session_start();
if($_SESSION['patient']){
    unset($_SESSION['patient']);
    header('location:../index.php');
}
?>