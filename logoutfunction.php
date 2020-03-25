<?php
session_start();
session_destroy();
echo "<script>window.location.href='http://localhost/sbn/homepage.php';</script>";
?>
