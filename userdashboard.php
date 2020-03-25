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
            <div class="row dashboard">
                <div class="col-md-8 bordercolor" style="padding: 15px;">
                    <h2>Result of rooms</h2>
                    <div class="table-responsive tableshadow">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Room ID</th>
                                    <th>Room Name</th>
                                    <th>Room Type</th>
                                    <th>Object 1</th>
                                    <th>Object 2</th>
                                    <th>Vote for Object 1</th>
                                    <th>Vote for Object 2</th>
                                    <th>Total vote</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sql = "SELECT * FROM room WHERE ID ='".$_SESSION['userid']."'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0)
                                  {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                      echo "<tr>";
                                      echo "<td>".$row["roomID"]."</td>";
                                  ?>
                                       <td><a href = "http://localhost/sbn/insideroom.php?resultroomid=<?php echo $row["roomID"]?>"><?php echo $row["roomName"] ?></a> </td>";
                                  <?php    echo "<td>".$row["roomtype"]."</td>";
                                      echo "<td>".$row["object1"]."</td>";
                                      echo "<td>".$row["object2"]."</td>";
                                      echo "<td>".$row["votesObject1"]."</td>";
                                      echo "<td>".$row["votesObject2"]."</td>";
                                      $total = $row["votesObject1"]+$row["votesObject2"];
                                      echo "<td>".$total."</td>";
                                      echo "</tr>";
                                    }
                                  } else {
                                    echo "<tr>";
                                    echo "<td>NONE</td>";
                                    echo "<td>NONE</td>";
                                    echo "<td>NONE</td>";
                                    echo "<td>NONE</td>";
                                    echo "<td>NONE</td>";
                                    echo "<td>NONE</td>";
                                    echo "<td>NONE</td>";
                                    echo "<td>NONE</td>";
                                    echo "</tr>";
                                  }
                              ?>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 bordercolor" style="padding: 15px;">
                    <h2 class="text-center">Total Room by you</h2>
                    <h4 class="text-center">Number of room</h4>
                    <?php
                      $totalroom = "SELECT COUNT(*) as totalroom FROM room WHERE ID ='".$_SESSION['userid']."'";
                      $totalroomresult = mysqli_query($conn, $totalroom);
                      $data = mysqli_fetch_assoc($totalroomresult);
                     ?>
                    <h4 class="text-center"><?php echo $data['totalroom']; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <?php include "dashboardfooter.php" ?>
</body>

</html>
