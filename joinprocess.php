<?php
include 'conn.php';

 ?>
<?php
  if (isset($_POST['next_btn']))
    {
        if($_POST['captchacode'] == $_POST['randomcode']){
          $rid = $_POST['rid'];

          echo "<script>alert('You are not a bot.');</script>";
?>
          <script>window.location.href='http://localhost/sbn/sbn/voterinformation.php?roomid=<?php echo $rid; ?>';</script>
<?php
        }
      else{
        echo "<script>alert('You are a bot.');</script>";
        echo "<script>window.location.href='http://localhost/sbn/sbn/homepage.php</script>";

      }
    }
 ?>
 <?php
   if (isset($_POST['toroom_btn']))
     {
       $checkIC = mysqli_query($conn,"SELECT * FROM voter WHERE VoterIC = '".$_POST['voteric']."' AND roomID = '".$_POST['roomid']."'");
       $checkemail = mysqli_query($conn,"SELECT * FROM voter WHERE VoterEmail = '".$_POST['voteremail']."' AND roomID = '".$_POST['roomid']."'");
       if (mysqli_num_rows($checkIC) > 0){
         echo "<script>alert('IC has already been used.');
                window.history.go(-1);</script>";
       }elseif (mysqli_num_rows($checkemail) > 0){
         echo "<script>alert('Email has already been used.');
                window.history.go(-1);</script>";
       }else{
         $sql = "INSERT INTO voter (VoterIC, VoterName, VoterGender, VoterDoB, VoterPhoneNum, VoterEmail, VoterAddress, roomID)
                 VALUE ('".$_POST['voteric']."','".$_POST['votername']."','".$_POST['votergender']."','".$_POST['voterdob']."','".$_POST['voterphone']."','".$_POST['voteremail']."','".$_POST['voteraddress']."','".$_POST['roomid']."')";
         if(!mysqli_query($conn, $sql)){
           die('Error: '. mysqli_error($conn));
           echo "<script>alert('Unable to join room. Come back later.');
                  window.history.go(-1);</script>";
         }
         echo "<script>alert('Successfully joined the room');</script>";

         ?>
         <script>window.location.href='http://localhost/sbn/sbn/insideroom.php?resultroomid=<?php echo $_POST['roomid']; ?>';</script>
         <?php
        }
       }
 ?>
