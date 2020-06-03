<html>
<head>
</head>
<body>
<?php
  session_start();
  include "conn.php";


  if (isset($_POST['edit_btn']))
  {
    $editroomid = $_POST['editroomid'];
    $editroomname = $_POST['editroomname'];
    $editroomtype = $_POST['editroomtype'];
    $roomrequirement = $_POST['editroomdescription'];
    $editobject1 = $_POST['editobject1'];
    $editobject2 = $_POST['editobject2'];
    $sql = "UPDATE room SET roomName= '".$editroomname."',
                            roomtype= '".$editroomtype."',
                            roomRequirement= '".$roomrequirement."',
                            object1= '".$editobject1."',
                            object2= '".$editobject2."' WHERE roomID = '".$editroomid."'";
    if (mysqli_query($conn, $sql))
    {
      echo "<script>alert('Record updated successfully');</script>";
      echo "<script>window.location.href='http://localhost/sbn/sbn/userroomlist.php';</script>";
    }
    else
    {
      echo "<script>alert('Something went wrong. Pls ask for contact the person who created this PHP');</script>";
      echo "<script>window.location.href='http://localhost/sbn/sbn/userroomlist.php';</script>";
    }
  }

?>


</body>
</html>
