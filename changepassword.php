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
  <?php
    include "conn.php";
    session_start();
    if (isset($_GET['hostid']))
      {
        $hostid = $_GET['hostid'];
        $sql = "SELECT * FROM adminhost WHERE ID=$hostid";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1)
        {
          if ($row = mysqli_fetch_array($result))
          $hostid = $row['ID'];
          $hostpassword = $row['password'];
        }
      }

   ?>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder" style="background-image: url(&quot;assets/img/password.jpg&quot;);"></div>
            <form method="post" action="changepasswordfunction.php">
                <h2 class="text-center"><strong>Change Password</strong></h2>
                <div class="form-group"><input class="form-control" type="hidden" name="hostid" value="<?php echo $hostid ?>" placeholder="ID" required></div>
                <div class="form-group"><input class="form-control" type="password" name="currentpassword" placeholder="Current Password"></div>
                <div class="form-group"><input class="form-control" type="password" name="newpassword" placeholder="New Password"></div>
                <div class="form-group"><input class="form-control" type="password" name="newpassword2" placeholder="New Password (Repeat)"></div>
                <div class="form-group" style="margin-bottom: 0px;"><a class="btn btn-primary" type="button" style="margin: 12px;margin-left: 50px;" href="userdashboard.php">Back</a>
                  <button class="btn btn-primary" type="submit" style="margin-top: 12px;margin-right: 12px;margin-bottom: 12px;margin-left: 12px;" name="changepassword_btn">Save edit</button></div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
