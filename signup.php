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
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder" style="background-image: url(&quot;assets/img/meeting1.jpg&quot;);"></div>
            <form method="post" action="signupfunction.php">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" type="text" name="hostname" placeholder="Fullname" required></div>
                <div class="form-group"><input class="form-control" type="text" name="hostic" placeholder="IC Number" required></div>
                <div class="form-group"><select class="form-control" name="hostgender" required>
                <option value="">Choose your Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                </select>
                </div>
                <div class="form-group">
                    <h6 style="margin-left: 10px;">Date of birth</h6><input class="form-control" type="date" name="hostdob" required></div>
                <div class="form-group"><input class="form-control" type="tel" name="hosttelephone" placeholder="012-3456789" required></div>
                <div class="form-group"><textarea class="form-control" name="hostaddress" placeholder="Address" style="height: 100px;" required></textarea></div>
                <div class="form-group"><input class="form-control" type="email" name="hostemail" placeholder="Email" required></div>
                <div class="form-group"><input class="form-control" type="password" name="hostpassword1" placeholder="Password" required></div>
                <div class="form-group"><input class="form-control" type="password" name="hostpassword2" placeholder="Password (repeat)" required></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="signup_btn">Sign Up</button></div><a class="already" href="login.php">You already have an account? Login here.</a>
              </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
