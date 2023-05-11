<?php
$con=mysqli_connect('localhost','root','','furniture');
 session_start();
 if (isset($_SESSION['customer'])) {
    unset($_SESSION['customer']);
    unset($_SESSION['delivery']);
    unset($_SESSION['list']);
    header("Location:home.php");
 }


 ?>
