<html>
  <head>
    <?php
      session_start();
      include "conn.php";
     ?>

  </head>
  <body>
    <?php
    if (isset($_POST['create_btn']))
    {
      $roomname = $_POST['roomname'];
      $_POST['ownername'] = $_SESSION['name'];
      $ownername = $_POST['ownername'];
      $roomtype = $_POST['roomtype'];
      $roomdescription = $_POST['roomdescription'];
      $object1 = $_POST['object1'];
      $object2 = $_POST['object2'];
      $sql = "INSERT INTO room (roomName, roomOwner, roomRequirement, roomtype, object1, object2,ID) value
      ('".$roomname."','".$ownername."','".$roomdescription."','".$roomtype."','".$object1."','".$object2."','".$_SESSION['userid']."')";

      if (mysqli_query($conn, $sql))
     {
       echo "<script>alert('New record created successfully');</script>";
       echo "<script>window.location.href='http://localhost/sbn/sbn/userdashboard.php';</script>";
     }
     else
     {
       echo "<script>alert('Something went wrong. Pls ask for contact the person who created this PHP');</script>";
       echo "<script>window.location.href='http://localhost/sbn/sbn/userdashboard.php';</script>";
     }
    }
     ?>
  </body>
</html>
