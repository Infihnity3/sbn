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
    if (isset($_GET['inviteroom']))
      {
        $roomid = $_GET['inviteroom'];
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
   <?php

     if (isset($_POST['invite_btn']))
     {
    $voteremail = $_POST['voteremail'];
    $token = sha1(uniqid($voteremail, true));
    $query = $conn->prepare("INSERT INTO one_time_link (token,roomID, voteremail, tstamp ) VALUES (?,? ,?, ? )");
    $query -> bind_param("ssss", $token, $roomid, $voteremail, $_SERVER["REQUEST_TIME"] );
    $query->execute();



    $link = "localhost/sbn/sbn/onetimelink.php?token=$token";
    

        function clickable($link){
          return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $link);
          }
        
        $to = $_POST['voteremail'];
        $subject = 'Invitation to Vote';
        $message = "Click the ".clickable($link)." to join the room.";
        $headers = 'From: zackchow33@gmail.com';

       if(mail($to, $subject,$message, $headers)){
       echo "<script>alert('Email successfully sent');</script>";
       echo "<script>window.location.href='http://localhost/sbn/sbn/userdashboard.php';</script>";
       }
       else{
        // echo "<script>alert('Unable to send');</script>";
        // echo "<script>window.location.href='http://localhost/sbn/sbn/userdashboard.php';</script>";
       }
     }

   ?>
    <div class="newsletter-subscribe">
        <div class="container invite" style="padding: 15px;">
            <div class="intro">
                <h2 class="text-center">Invitation</h2>
                <p class="text-justify">Room name: <?php echo $roomname; ?><br>Room requirement: <?php echo $roomrequirement; ?><br><?php echo $roomobject1; ?> or <?php echo $roomobject2; ?><br></p>
            </div>
            <form class="form-inline" method="post" action="#">
                <div class="form-group"><input class="form-control" type="email" name="voteremail" placeholder="Voter's Email"></div>
                <div class="form-group"><a class="btn btn-primary" role="button" href="userroomlist.php">Back</a>
                <button class="btn btn-primary" type="submit" style="margin-left: 10px;" name="invite_btn">Send</button></div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
