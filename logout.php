

<?php
 include './dbconfig.php';
 session_start(); 

  if (!isset($_SESSION['username'])) {
   $_SESSION['msg'] = "You must log in first";
   header('location:index.php');
  }
  if (isset($_GET['logout'])) {
      
   session_destroy();
   
   unset($_SESSION['username']);
   header("location:index.php");
   //เปลี่ยน header ไปหน้า index
  }

?>