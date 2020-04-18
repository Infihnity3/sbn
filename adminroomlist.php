<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Homepage.php</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue-1.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo-1.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
  <?php include "nav2.php" ?>
    <div style="margin-top: 30px;">
        <div class="container">
            <div class="row text-left table">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Room ID</th>
                                    <th>Room Name</th>
                                    <th>Room Owner</th>
                                    <th>Description</th>
                                    <th>Object 1</th>
                                    <th>Object 2</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <?php

                                  $sql = "select * from room";//add a new sql query
                                  $result = mysqli_query($conn, $sql);

                                  while($rows = mysqli_fetch_array($result))
                                  {
                                      echo "<tr>";
                                      echo "<td>".$rows['roomID']."</td>";
                                      echo "<td>".$rows['roomName']."</td>";
                                      echo "<td>".$rows['roomOwner']."</td>";
                                      echo "<td>".$rows['roomRequirement']."</td>";
                                      echo "<td>".$rows['object1']."</td>";
                                      echo "<td>".$rows['object2']."</td>";
                                      ?>

                                      <td><a class="btn btn-primary" role="button" style="margin-top: 0px;margin-right: 0px;margin-left: 5px;" href="deleteroomfunction.php?deleteroom=<?php echo $rows["roomID"] ?>">Delete</a></td>
                                      <?php
                                      echo "</tr>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php include "dashboardfooter.php" ?>

</body>

</html>
