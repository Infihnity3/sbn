<?php
include 'conn.php';
if (isset($_POST['voteforobject1']))
  {
    $vote1sql = "UPDATE room SET votesObject1 = votesObject1 + '1' WHERE roomID = '".$_POST['roomid']."'";
    $vote1result = mysqli_query($conn,$vote1sql);
    echo "<script>alert('Successfully given a vote. You are exiting back to homepage.');</script>";
    echo "<script>window.location.href='http://localhost/sbn/sbn/homepage.php';</script>";
  }

  if (isset($_POST['voteforobject2']))
    {
      $vote1sql = "UPDATE room SET votesObject2 = votesObject2 + '1' WHERE roomID = '".$_POST['roomid']."'";
      $vote1result = mysqli_query($conn,$vote1sql);
      echo "<script>alert('Successfully given a vote. You are exiting back to homepage.');</script>";
      echo "<script>window.location.href='http://localhost/sbn/sbn/homepage.php';</script>";
    }
 ?>
