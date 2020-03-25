<?php
  include "conn.php";
  session_start();
  if (isset($_POST['editprofile_btn']))
    {
      $edithostid = $_POST['edithostid'];
      $edithostname = $_POST['edithostname'];
      $edithostic = $_POST['edithostic'];
      $edithostgender = $_POST['edithostgender'];
      $edithostdob = $_POST['edithostdob'];
      $edithosttelephone = $_POST['edithosttelephone'];
      $edithostaddress = $_POST['edithostaddress'];
      $edithostemail = $_POST['edithostemail'];

      $sql = "UPDATE adminhost SET Name= '".$edithostname."',
                                  IC= '".$edithostic."',
                                  Gender= '".$edithostgender."',
                                  DoB= '".$edithostdob."',
                                  PhoneNum= '".$edithosttelephone."',
                                  Address= '".$edithostaddress."',
                                  Email= '".$edithostemail."' WHERE ID = '".$edithostid."'";

      if (mysqli_query($conn, $sql))
      {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script>window.location.href='http://localhost/sbn/userdashboard.php';</script>";
      }
      else
      {
       echo "<script>alert('Something went wrong. Pls ask for contact the person who created this PHP');</script>";
       echo "<script>window.location.href='http://localhost/sbn/userdashboard.php';</script>";

      }

    }
?>
