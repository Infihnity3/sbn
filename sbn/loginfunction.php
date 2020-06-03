<html>
<head>
</head>
<body>
<?php
  session_start();
  include "conn.php";


  if (isset($_POST['login_btn']))
  {
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "Select * from adminhost where Email = '".$email."' and password = '".md5($password)."'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)<=0) {
        $sql = "Select * from adminhost where Email = '".$email."' and password = '".md5($password)."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)<=0)
        {
            echo "<script>alert('Wrong username / password !Please Try Again!')</script>;";
             die("<script>window.history.go(-1);</script>");
        }
    }

    if($row = mysqli_fetch_array($result))
      {
        $_SESSION['userid']= $row['ID'];
        $_SESSION['name'] = $row['Name'];
        $_SESSION['ic'] = $row['IC'];
        $_SESSION['dob'] = $row['DoB'];
        $_SESSION['phone'] = $row['PhoneNum'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['address'] = $row['Address'];
        $_SESSION['role'] = $row['Category'];
      }
      if($_SESSION['role']==="1"){
          echo "<script>alert('Welcome! ".$_SESSION['name']."');</script>";
          echo "<script>window.location.href='http://localhost/sbn/sbn/admindashboard.php';</script>";
      }
      else if($_SESSION['role']==="2")
      {
          echo "<script>alert('Welcome back! ".$_SESSION['name']."');</script>";
          echo "<script>window.location.href='http://localhost/sbn/sbn/userdashboard.php';</script>";
      }

   }


?>


</body>
</html>
