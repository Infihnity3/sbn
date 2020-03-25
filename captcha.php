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
    <?php
    include 'conn.php';
    if (isset($_GET['joinroomid']))
     {
       $roomid = $_GET['joinroomid'];
       $sql = "SELECT * FROM room WHERE roomID=$roomid";
        $result = mysqli_query($conn, $sql);
       if(mysqli_num_rows($result)==1)
       {
        if ($row = mysqli_fetch_array($result))
        $rid = $row['roomID'];
      }
    }
    ?>
</head>

<body style="background-color: rgb(237,247,255);">
    <div style="width: 600px;margin: auto;margin-top: 30px;">
        <div class="container shadow-lg" style="background-color: #ffffff;">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Identifying if you're a bot.</h1>
                    <div class="alert alert-success" role="alert"><span>Retype everything shown below to identify if you are not a bot.</span></div>


                </div>
                <div class="col-md-12">
                    <form method="post" action="joinprocess.php">
                      <?php
                      function generateRandomString($length = 10) {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        return $randomString;
                      }
                        $randomcode = generateRandomString();
                      ?>
                        <div class="form-group"><input class="form-group" type="hidden" name="rid" value="<?php echo $rid;?>"></div>
                        <div class="form-group"><strong class="text-center">Random:</strong><span class="uncopyable" name="randomcode"><?php echo $randomcode;?></span></div>
                        <div class="form-group"><input class="form-control" type="hidden" name="randomcode" style="margin: auto;margin-top: 12px;width: 300px;" value="<?php echo $randomcode;?>">
                        <div class="form-group"><input class="form-control" type="text" name="captchacode" style="margin:auto ;margin-top: 12px;width: 300px;">
                          <button class="btn btn-primary float-right" type="submit" name="next_btn">Next</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
