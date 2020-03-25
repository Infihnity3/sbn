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
    <?php
    include "conn.php";
    session_start();

    if (isset($_GET['resultroomid']))
      {
        $resultroomid = ($_GET['resultroomid']);

        $objectnamesql = "SELECT * FROM room WHERE roomID = $resultroomid";
        $objectnameresult = mysqli_query($conn, $objectnamesql);
        if(mysqli_num_rows($objectnameresult)==1)
        {
          if ($row = mysqli_fetch_array($objectnameresult))
          $name1 = $row['object1'];
          $name2 = $row['object2'];
        }
        $object1sql = "SELECT votesObject1 FROM room WHERE roomID = $resultroomid";
        $object1sq2 = "SELECT votesObject2 FROM room WHERE roomID = $resultroomid";
        $object1result = mysqli_query($conn, $object1sql);
        $object2result = mysqli_query($conn, $object1sq2);
        if(mysqli_num_rows($object1result)==1)
        {
          if ($row = mysqli_fetch_array($object1result))
          $v1 = $row['votesObject1'];
        }
        if(mysqli_num_rows($object2result)==1)
        {
          if ($row = mysqli_fetch_array($object2result))
          $v2 = $row['votesObject2'];
        }
      }
     ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['<?php echo $name1; ?>',     <?php echo $v1; ?>],
          ['<?php echo $name2; ?>',      <?php echo $v2; ?>],

        ]);

        var options = {
          title: '<?php echo $name1; ?> or <?php echo $name2; ?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>

<body>
    <div style="margin-top: 30px;">
        <div class="container insideroom">
            <div class="row">
              <?php
              if (isset($_SESSION['role']))
                {
                  echo '<a class="btn btn-primary" type="button" href="http://localhost/sbn/userdashboard.php">Back</a>';
                }
               ?>
                <div class="col-md-12">
                    <h1 class="text-center">Current Result</h1>
                    <div id="piechart" style="width: 900px; height: 500px;">

                    </div>
                    <div class="row">
                        <div class="col-md-6 bordercolor" style="padding: 15px;">
                            <h3 class="text-center">Object 1</h3>
                            <form method="post" action="votefunction.php">
                              <div class="form-group"><input class="form-control" type="hidden" name="roomid" placeholder="room ID" value="<?php echo $resultroomid; ?>" ></div>
                                <div class="form-group" style="width: 59px;margin: auto;">
                                  <?php
                                  if (isset($_SESSION['role']))
                                    {
                                      echo '<button class="btn btn-primary" type="submit" name="voteforobject1" disabled>Vote</button>';
                                    }
                                    else
                                    echo '<button class="btn btn-primary" type="submit" name="voteforobject1">Vote</button>';
                                  ?>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 bordercolor" style="padding: 15px;">
                            <h3 class="text-center">Object 2</h3>
                            <form method="post" action="votefunction.php">
                              <div class="form-group"><input class="form-control" type="hidden" name="roomid" placeholder="room ID" value="<?php echo $resultroomid; ?>" ></div>
                                <div class="form-group" style="margin: auto;width: 59px;">
                                  <?php
                                  if (isset($_SESSION['role']))
                                    {
                                      echo '<button class="btn btn-primary" type="submit" name="voteforobject2" disabled>Vote</button>';
                                    }
                                    else
                                    echo '<button class="btn btn-primary" type="submit" name="voteforobject2">Vote</button>';
                                  ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
