<?php 
  session_start();

  if (!isset($_SESSION['email'])) {
	  $_SESSION['msg'] = "You must log in first";
	  $_SESSION['user_id'] = 'None';
  }
  if (!isset($_SESSION['user_id'])) {
	$_SESSION['user_id'] = "None";
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
	$_SESSION['user_id'] = 'None';
	header("location: login.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>COVIDHUB</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <header class="row navsector">
    <div class = "col-3">
        <h1>E-CORONA</h1>
    </div>
    <div class="col-9">
      <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Main</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultation.php">Consultation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pcr.php">PCR check</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="covid_centers.php">COVID help centers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="schedule.php">Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="doctors.php">Specialists</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">My profile</a>
      </li>
      <li class="nav-item">
        <img src="images/avasmall.svg">
      </li>
      </ul>
    </div>
  </header>

  
  <div class="news">
    <div class="row col-12">
      <h1 style='margin-bottom: 50px;'>Specialists</h1>
    </div>
    <center >
        <section class="back2">
            <?php 
                $db = oci_connect('ecoron', 'qwerty123', 'localhost/orcl');
                if (!$db) {
                $e = oci_error();
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
            
                $sql_query = " SELECT * from doctors";
            
                $result = oci_parse($db, $sql_query);
                oci_execute($result);

                $cnt = 11;

                while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                    echo "<div class='faq-block'>\n";
                    
                //     if( $cnt % 2 == 1 ){
                //     $img_cnt = $cnt % 10;
                //     if( $img_cnt == 0 ){
                //         $img_cnt = 10;
                //         }
                //         echo "<img  src='images/".strval($img_cnt) .".jpg'>";
                //     }

                    echo "<div class='faq-div'>";
                    
                    echo "<h4 style='font-size: 24px; font-weight: 500;'>".$row['DOCTOR_NAME']."</h4>\n"; // medical center
                    echo "<p style='font-size: 18px; font-weight: 600;'>Experience: ".$row['EXPERIENCE']."</p>"; // address
                    echo "<p style='font-size: 18px; font-weight: 600;'>Initial reception: ".$row['INITIAL_RECEPTION_']."</p>"; // address
                    echo "<p style='font-size: 18px; font-weight: 600;'>Secondary reception: ".$row['SECONDARY_RECEPTION']."</p>"; // address
                    

                    echo "  </div>";

                    // if( $cnt % 2 == 0 ){
                    // $img_cnt = $cnt % 10;
                    // if( $img_cnt == 0 ){
                    //     $img_cnt = 10;
                    //     }
                    //     echo "<img  src='images/".strval($img_cnt) .".jpg'>";
                    // }

                    echo "</div>";
                
                    $cnt ++;
                }
            ?>
        </section>
    </center>
  <footer class="footer">
   <div class = "row col-4">
        <div class="icondiv">
          <img src="images/call.svg">
          <h5 style="padding: 10px;">103</h5>
        </div>
        <div class="icondiv" style="margin-right: 2vw;">
          <img src="images/call.svg">
          <h5 style="margin: 10px 0px;">8 702 369 0918</h5>
        </div>
    </div>
    <div class="row col-8" style="display: flex;justify-content: flex-end;">
       <h1>E-CORONA</h1>
    </div>
  </footer>

</div>
</body>
</html>



