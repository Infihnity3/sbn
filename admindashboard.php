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
    <div style="margin-top: 30px;margin-left: 160px; margin-bottom:30px;">
        <div class="container" style="margin: 0px 26.6px;">
            <div class="row total" style="height: 500px;padding: 0px;">
                <div class="col-md-6" style="height: 500px;background-position: center;background-size: auto;background-repeat: no-repeat;margin: px;">
                    <h1 class="text-center">Total Users</h1>
                    <?php
                    include "conn.php";
                    $sql = "select ID from adminhost where Category = '2'";
                    $result = mysqli_query($conn, $sql);// Execute the query and store the result set
                    if ($result)
                    {
                        // it return number of rows in the table.
                        $row = mysqli_num_rows($result);
                        echo "<h1 style='text-align: center; margin-top:150px; font-size:85px;'>".$row."</h1>";
                    }
                    ?>
                </div>
                <div class="col-md-6" style="height: 500px;background-position: center;background-size: auto;background-repeat: no-repeat;">
                    <h1 class="text-center">Total Rooms</h1>
                    <?php
                    include "conn.php";
                    $sql = "select roomID from room";
                    $result = mysqli_query($conn, $sql);// Execute the query and store the result set
                    if ($result)
                    {
                        // it return number of rows in the table.
                        $row = mysqli_num_rows($result);
                        echo "<h1 style='text-align: center;margin-top:150px;font-size:85px;'>".$row."</h1>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php include "dashboardfooter.php" ?>
</body>

</html>
