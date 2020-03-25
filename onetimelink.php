<?php
$token = sha1(uniqid($VoterID, true));
$query = $db->prepare(
    "INSERT INTO onetimelink (token, VoterID, tstamp) VALUES (?,? ,? )"
);
$query->execute(
    array(
        $VoterID,
        $token,
        $_SERVER["REQUEST_TIME"]
    )
);

$url = "http://sbn.com/activate.php?token=$token";
$message = <<<ENDMSG
Please click on the link below to join the room.
$url
ENDMSG;

mail($address, "Join room", $message);

// retrieve token
if (isset($_GET["token"]) && preg_match('/^[0-9A-F]{40}$/i', $_GET["token"])) {
    $token = $_GET["token"];
}
else {
    throw new Exception("Valid token not provided.");
}

// verify token
$query = $db->prepare("SELECT VoterID, tstamp FROM onetimelink WHERE token = ?");
$query->execute(array($token));
$row = $query->fetch(PDO::FETCH_ASSOC);
$query->closeCursor();

if ($row) {
    extract($row);
}
else {
    throw new Exception("Valid token not provided.");
}

// do one-time action here, like activating a user account
// ...

// delete token so it can't be used again
$query = $db->prepare(
    "DELETE FROM onetimelink WHERE VoterID = ? AND token = ? AND tstamp = ?;");

$query->execute(
    array(
        $VoterID,
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