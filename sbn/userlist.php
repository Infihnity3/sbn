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
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>IC Number</th>
                                    <th>Gender</th>
                                    <th>Date of birth</th>
                                    <th>Phone number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    include "conn.php"; //add connection 
                                    $sql = "select * from adminhost";//add a new sql query
                                    $result = mysqli_query($conn, $sql);
                                    while($rows = mysqli_fetch_array($result))
                                    {
                                        if ($rows['Category'] === '2'){
                                            echo "<tr>";
                                            echo "<td>".$rows['ID']."</td>";
                                            echo "<td>".$rows['Name']."</td>";
                                            echo "<td>".$rows['IC']."</td>";
                                            if ($rows['Gender'] === '1'){
                                                echo "<td>Male</td>";
                                            } elseif ($rows['Gender'] === '2'){
                                                echo "<td>Female</td>";
                                            } else {
                                                echo "<td>Unknown</td>";
                                            }
                                            echo "<td>".$rows['DoB']."</td>";
                                            echo "<td>".$rows['PhoneNum']."</td>";
                                            echo "<td>".$rows['Email']."</td>";
                                            echo "<td>".$rows['Address']."</td>";
                                            echo "</tr>";
                                        }
                                    }
                                ?>
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
