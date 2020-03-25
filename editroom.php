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
    <?php
      if (isset($_GET['editroom']))
        {
          $roomid = $_GET['editroom'];
          $sql = "SELECT * FROM room WHERE roomID=$roomid";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result)==1)
          {
            if ($row = mysqli_fetch_array($result))
            $rid = $row['roomID'];
            $roomname = $row['roomName'];
            $roomowner = $row['roomOwner'];
            $roomrequirement = $row['roomRequirement'];
            $roomtype = $row['roomtype'];
            $roomobject1 = $row['object1'];
            $roomobject2 = $row['object2'];
          }
        }
     ?>

    <div style="background-color: #f1f7fc;margin-top: 30px; height:497px;">
        <div class="container" style="background-image: url(&quot;assets/img/room.jpg&quot;);background-repeat: no-repeat;background-size: cover;">
            <div class="row create" style="background-color: rgba(0,0,0,0.5);">
                <div class="col-md-12">
                    <h3 class="text-center" style="background-color: rgba(70,124,205,0.6);width: 300px;margin-left: 400px;color: rgb(220,233,247);">Edit Room</h3>
                    <form method="post" action="editroomfunction.php">
                        <div class="form-group"><input class="form-control" type="hidden" name="editroomid" placeholder="Room name" value="<?php echo $rid; ?>" style="width: 400px;margin-left: 350px;" required></div>
                        <div class="form-group"><input class="form-control" type="text" name="editroomname" placeholder="Room name" value="<?php echo $roomname; ?>" style="width: 400px;margin-left: 350px;" required></div>
                        <div class="form-group"><input class="form-control" type="text" style="width: 400px;margin-left: 350px;" readonly="" name="ownername" value="<?php echo $roomowner; ?>" required></div>
                        <div class="form-group"><select class="form-control" name="editroomtype" style="width: 400px;margin-left: 350px;" required><option value="Public">Public</option><option value="Private">Private</option></select></div>
                        <div class="form-group"><textarea class="form-control" placeholder="Information and requirement" name="editroomdescription" style="width: 400px;margin-left: 350px;" required><?php echo $roomrequirement; ?></textarea></div>
                        <div class="form-group"><input class="form-control" type="text" name="editobject1" placeholder="Object 1" style="width: 400px;margin-left: 350px;" value="<?php echo $roomobject1; ?>" required></div>
                        <div class="form-group"><input class="form-control" type="text" name="editobject2" placeholder="Object 2" style="width: 400px;margin-left: 350px;" value="<?php echo $roomobject2; ?>" required></div>
                        <div class="form-group"><a class="btn btn-primary" role="button" style="width: 150px;margin: 12px;margin-left: 400px;" href="userroomlist.php">Back</a>
                        <button class="btn btn-primary" type="submit" name="edit_btn" style="width: 150px;">Save edit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php include "dashboardfooter.php" ?>
</body>

</html>
