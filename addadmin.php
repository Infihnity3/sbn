
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

<body style="background-color: rgb(241,247,252);">
  <?php include "nav2.php" ?>

    <div style="margin-left: 350px;margin-top: 30px; margin-bottom: 30px;width: 800px;">
        <div class="container" style="width: 800px;margin: 0px;margin-right: 0px;margin-left: 0px;background-color: #ace7ef;background-image: url(&quot;assets/img/background.jpg&quot;);background-repeat: no-repeat;background-size: cover;">
            <div class="row add" style="width: 800px;background-color: rgba(0,0,0,0.37);">
                <div class="col-md-12">
                    <form  method="post" action="addadmin.php" style="background-repeat: no-repeat;background-size: auto;">
                        <h3 class="text-center" style="color: rgb(237,237,237);">Add Admin</h3>
                        <div class="form-group text-left">
                            <input class="form-control" type="text" style="width: 300px;margin-left: 230px;background-color: rgb(247,249,252);" name="adminname" placeholder="Fullname">
                        </div>
                        <div class="form-group text-left">
                            <input class="form-control" type="text" style="width: 300px;margin-left: 230px;background-color: rgb(247,249,252);" name="adminic" placeholder="IC Number"></div>
                        <div class="form-group">
                        <select class="form-control" required="" style="width: 300px;margin-left: 230px;" name="admingender">
                            <option value="None">Choose your gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <h5 style="margin-left: 230px;width: 300px;">Date of birth</h5><input class="form-control" type="date" style="width: 300px;margin-left: 230px;background-color: rgb(247,249,252);" name="admindob"></div>
                <div class="form-group">
                    <input class="form-control" type="tel" style="width: 300px;margin-left: 230px;background-color: rgb(247,249,252);" name="adminphone" placeholder="012-3456789">
                </div>
                <div class="form-group">
                    <textarea class="form-control" style="width: 300px;margin-left: 230px;background-color: rgb(247,249,252);" name="adminaddress" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" style="width: 300px;margin-left: 230px;background-color: rgb(247,249,252);" name="adminemail" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" style="width: 300px;margin-left: 230px;background-color: rgb(247,249,252);" name="adminpassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" style="width: 300px;margin-left: 230px;background-color: rgb(247,249,252);" name="adminpassword2" placeholder="Password (Repeat)">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" style="margin-left: 230px;width: 300px;">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php


        if(isset($_POST['adminname'])){//if the information input then the function below will start.
            //retrieve data from the top
            $username = $_POST['adminname'];
            $ic = $_POST['adminic'];
            $gender = $_POST['admingender'];
            $dob = $_POST['admindob'];
            $phone = $_POST['adminphone'];
            $address = $_POST['adminaddress'];
            $email = $_POST['adminemail'];
            $password = $_POST['adminpassword1'];
            $confirmpass = $_POST['adminpassword2'];
            //if password and confirm pass is different then it will not be able to register.
            if($password !== $confirmpass){

                echo "<script>alert('Password and confirmed password not same!');";
                die("window.history.go(-1);</script>");
            }

            //insert the data into the database
            $sql = "Insert into adminhost (Name, IC, Gender, DoB, PhoneNum, Email, password, Address, Category)
            values ('$username', '$ic','$gender','$dob','$phone','$email','".md5($password)."','$address','1');";

            // echo $sql;
            //if connection with Db failed then unable to register, else register successfully
            mysqli_query($conn, $sql);
            if(mysqli_affected_rows($conn)<=0){
                echo "<script>alert('Unable to add admin! \\nPlease Try Again!');";
                die("window.history.go(-1);</script>");
            }else{
                echo "<script>alert('Added Successfully!');";
                echo "window.location.href='admindashboard.php';</script>";
            }
            }
    ?>
    <?php include "dashboardfooter.php" ?>
</body>

</html>
