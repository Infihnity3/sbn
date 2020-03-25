<html>
<head>
</head>
<body>
<?php
  session_start();
  include "conn.php";
  

  if (isset($_POST['invite_btn']))
  {

    $to = $_POST['voteremail'];
    $subject = 'Invitation';
    $message = 'Join link now';
    $headers  = 'From: SBN@gmail.com';

  //  if(mail($to, $subject, $message, $headers))
  //    echo "Email sent";
//
  //  else
    //  phpinfo();
  }

?>


</body>
</html>
