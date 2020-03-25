<?php
    include 'conn.php';
  $name =  $_POST['hostname'];
  $ic =  $_POST['hostic'];
  $gender =  $_POST['hostgender'];
  $dob =  $_POST['hostdob'];
  $phone =  $_POST['hosttelephone'];
  $address =  $_POST['hostaddress'];
  $email =  $_POST['hostemail'];
  $password1 =  $_POST['hostpassword1'];
  $password2 =  $_POST['hostpassword2'];

  $checkIC = mysqli_query($conn,"SELECT * FROM adminhost WHERE IC = '$ic'");
  $checkemail = mysqli_query($conn,"SELECT * FROM adminhost WHERE Email = '$email'");
  $checkphone = mysqli_query($conn,"SELECT * FROM adminhost WHERE PhoneNum = '$phone'");

  if (isset($_POST['signup_btn']))
    {
      if (mysqli_num_rows($checkIC) > 0){
        echo "<script>alert('IC already been use.')
                window.history.go(-1);</script>";
      }elseif (mysqli_num_rows($checkemail) > 0){
        echo "<script>alert('Email already been use.')
                window.history.go(-1);</script>";
      }elseif (mysqli_num_rows($checkphone) > 0){
        echo "<script>alert('Phone number already been use.')
                window.history.go(-1);</script>";
      } else {
        if ($password1 !== $password2) {
          echo "<script>alert('Password does not match.')
                  window.history.go(-1);</script>";
        } else {
          $sql = "INSERT INTO adminhost (Name, IC, Gender, DoB, PhoneNum, Email, password, Address, Category)
          VALUE ('$name', '$ic', '$gender', '$dob', '$phone', '$email', md5('$password1'), '$address','2' )";
          if(!mysqli_query($conn, $sql)){
            die('Error: ' . mysqli_error($conn));
            echo "<script>alert('Registration fail.')
                    window.history.go(-1);</script>";
          }
          echo "<script>alert('Signup Successfully.')
                  window.location.href='homepage.php';</script>";
        }
      }
    }
 ?>
