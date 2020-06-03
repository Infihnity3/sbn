<?php
session_start();
include "conn.php";
  if (isset($_GET['deleteroom'])){
    $roomid = $_GET['deleteroom'];
    $sql = "DELETE FROM room WHERE roomID=$roomid";

    if (mysqli_query($conn, $sql))
   {
     if($_SESSION['role']==="1"){
     echo "<script>alert('Record deleted successfully');</script>";
     echo "<script>window.location.href='http://localhost/sbn/sbn/adminroomlist.php';</script>";
   } else if ($_SESSION['role']==="2"){
     echo "<script>alert('Record deleted successfully');</script>";
     echo "<script>window.location.href='http://localhost/sbn/sbn/userroomlist.php';</script>";
   }else if (!mysqli_query($conn, $sql))
    {
      if($_SESSION['role']==="1"){
        echo "<script>alert('Something went wrong. Pls ask for contact the person who created this PHP');</script>";
        echo "<script>window.location.href='http://localhost/sbn/sbn/adminroomlist.php';</script>";
      }
      elseif ($_SESSION['role']==="2"){
      echo "<script>alert('Something went wrong. Pls ask for contact the person who created this PHP.');
             window.location.href='http://localhost/sbn/sbn/userroomlist.php';</script>";
      }
    }
   }
 }
 ?>
