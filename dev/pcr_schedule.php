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

<?php
  $smth = "";
  $conn = oci_connect('ecoron', 'qwerty123', 'localhost/orcl');
  if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }
  //Altynay tut sql
  $sql_query = "SELECT phone  from online_pcr"; // something

  $result = oci_parse($conn, $sql_query);

  oci_define_by_name($result, 'PHONE', $first_nameCN);

  oci_execute($result);

  oci_free_statement($result);  

?>

<!DOCTYPE html>
<html>
<head>
  <title>COVIDHUB</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="stylelogin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body style="background-color: black;">
<img src="images/back.jpg" class="darkimg">

<div class="container" >
  <header class="row navsector navsectorwhite">
    <div class = "col-3">
        <h1 style="color: white;">E-CORONA</h1>
    </div>
    <div class="col-9">
      <ul class="nav navwhite justify-content-end">
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
  <section class="mainblock3">
    <div class="row col-8 reg" style="border: 1px solid white;">
        <div style="margin-top: 30px; display: flex; flex-direction: column;justify-content: center;">
            <a style="font-size: 28px !important; margin-left: 45px;">We have confirmed your request for a PCR test.</a>
            <a style="margin-left: 15px; font-size: 22px !important">We will call this number soon: <b>123456</b> for clarification. Thanks!</a>
        </div>
    </div>
  </section>
  </body>
</html>