<html>
<head>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "votingsystem";
$port = "3308";
//$conn = mysqli_connect($servername, $username,$password,$db, "3308");

//if ($conn->connect_error) {
  //  die('Connect Error (' . $conn->connect_errno . ') '
  //          . $conn->connect_error);
//}
$conn = mysqli_connect ($servername,$username,$password,$db,$port);

if(mysqli_connect_error())
{
die('<script>alert("Connection failed: Please check your SQL connection!");</script>');
}
?>
</body>
</html>
