<?php
include "conn.php";
// retrieve token
session_start();
if (isset($_GET["token"]) && preg_match('/^[0-9A-F]{40}$/i', $_GET["token"])) {
    $token = $_GET["token"];
  } else {
    throw new Exception("Valid token not provided.");
  }

// verify token
$query = $conn->prepare("SELECT roomID, voteremail, tstamp FROM one_time_link WHERE token = ?");
$query -> bind_param("s", $token);
$query->execute();
$row = $query->get_result()->fetch_assoc();


if ($row) {
    extract($row);
}
else {
    echo "<script>alert('Token has expired! ');</script>";
    echo "<script>window.location.href='http://localhost/sbn/sbn/homepage.php';</script>";
}

// delete token so it can't be used again
$query = $conn->prepare("DELETE FROM one_time_link WHERE token = ?");
$query -> bind_param("s", $token);
$query -> execute();

//time in seconds
$time = 300;

// Check if link has expired
if ($_SERVER["REQUEST_TIME"] - $tstamp > $time) {
    echo "<script>alert('Token has expired! ');</script>";
    echo "<script>window.location.href='http://localhost/sbn/sbn/homepage.php';</script>";
}

// do one-time action here, like activating a user account
$sql = "SELECT roomID FROM room as r join one_time_link as o on r/.roomID = o/.roomID where token = $token";
$result = mysqli_query($conn, $sql);
$roomid = $row['roomID'];

// if(mysqli_num_rows($result) == $token){
//         {
        //   if ($row = mysqli_fetch_array($result))
        //   $roomid = $row['roomID'];
        // }
    //   }

?>
<script>window.location.href='http://localhost/sbn/sbn/voterinformation.php?roomid=<?php echo $roomid; ?>';</script>