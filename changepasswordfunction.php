<?php
include "conn.php";
session_start();


if (isset($_POST['changepassword_btn']))
{
   ($_POST["currentpassword"] == $_SESSION['password']);
    if ($_POST["newpassword"] == $_POST["newpassword2"])
          {
            $changepasswordsql = "UPDATE adminhost set password='".$_POST["newpassword"]."' WHERE ID='".$_POST["hostid"]."'";
            $passwordresult = mysqli_query($conn, $changepasswordsql);
            echo "<script>alert('Password changed successfully');</script>";
            echo "<script>window.location.href='http://localhost/sbn/userdashboard.php';</script>";
          }
        else{
          echo "<script>alert('New password and repeated new password does not match') window.location.href='http://localhost/sbn/userdashboard.php';</script>";
          echo "<script>window.location.href='http://localhost/sbn/userdashboard.php';</script>";
            }
  }
  else{
      echo "<script>alert('Current password is incorrect');</script>";
      echo "<script>window.location.href='http://localhost/sbn/userdashboard.php';</script>";
      }
?>
