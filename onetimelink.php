<?php
include "conn.php";
// retrieve token

if (isset($_GET["token"]) && preg_match('/^[0-9A-F]{40}$/i', $_GET["token"])) {
    $token = $_GET["token"];
  } else {
    throw new Exception("Valid token not provided.");
  }

// verify token
$query = $conn->prepare("SELECT voteremail, tstamp FROM onetimelink WHERE token = ?");
$query -> bind_param("s", $token);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$query->closeCursor();

if ($row) {
    extract($row);
}
else {
    throw new Exception("Valid token not provided.");
}

// do one-time action here, like activating a user account
<script>window.location.href='http://localhost/sbn/sbn/voterinformation.php?roomid=<?php echo $rid; ?>';</script>

// delete token so it can't be used again
$query = $db->prepare(
    "DELETE FROM onetimelink WHERE voteremail = ? AND token = ? AND tstamp = ?;");

$query->execute(
    array(
        $voteremail,
        $token,
        $tstamp
    )
);


// 1 day measured in seconds = 60 seconds * 60 minutes * 24 hours
$delta = 86400;

// Check to see if link has expired
if ($_SERVER["REQUEST_TIME"] - $tstamp > $delta) {
    throw new Exception("Token has expired.");
}
// do one-time action here, like activating a user account

?>