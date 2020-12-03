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

  $conn = oci_connect('ecoron', 'qwerty123', 'localhost/orcl');
  if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  $sql_query = "SELECT first_name,last_name,city,doctor,clinics,consultation_date  from online_consultation"; // something

  $result = oci_parse($conn, $sql_query);

  oci_define_by_name($result, 'FIRST_NAME', $first_nameCN);
  oci_define_by_name($result, 'LAST_NAME', $last_nameCN);
  oci_define_by_name($result, 'CITY', $city);
  oci_define_by_name($result, 'DOCTOR', $doctor);
  oci_define_by_name($result, 'CLINICS', $clinics);
  oci_define_by_name($result, 'CONSULTATION_DATE', $consultation_date);

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
    <div class="container">
        <header class="row navsector navsectorwhite">
          <div class="col-3">
            <h1 style="color: #ffffff">E-CORONA</h1>
          </div>
          <div class="col-9">
            <ul class="nav navwhite justify-content-end">
              <li class="nav-item">
                <a class="nav-link active" href="index.php" >Main</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="consultation.php" >Consultation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pcr.php" >PCR check</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="covid_centers.php" >COVID help centers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="schedule.php" >Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >Specialists</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php" >Sign in</a>
              </li>
            </ul>
          </div>
       </header>
     </div>
  </head>
  <body style="background-color: #004FA8">
    <div class="container my-5">
      <div class="row">
        <div class="col-md-12 text-center">
            <br>
            <br>
          <h1 class="text-capitalize font-weight-bold" style="color: #ffffff">My Schedule</h1>
          <h4 class="text-capitalize font-weight-bold" style="color: #ffffff"><a href = "generalSchedule.php">General Schedule</a></h4>
        </div>
      </div>
      <div class="row mt-sm-5">
        <div class="col-md-6">
          <div class="bg-light px-4 py-5 my-lg-5 my-md-2 my-sm-2">
            <div
              class="d-flex justify-content-between align-items-center mx-auto"
            >
              <div>
                <h2 class="font-weight-bold" style="margin-top: -30px" > 9 December 15:00<?php echo $consultation_date;?></h2>
              </div>
              <p class="text-center">
                <svg
                  width="25px"
                  class="mb-1"
                  fill="#5d7de5"
                  version="1.1"
                  id="Capa_1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  x="0px"
                  y="0px"
                  viewBox="0 0 321.883 321.883"
                  style="enable-background: new 0 0 321.883 321.883"
                  xml:space="preserve"
                >
                  <path
                    d="M160.941,0c-69.035,0-125,55.964-125,125.001c0,69.035,85.187,196.882,125,196.882c39.813,0,125-127.847,125-196.882
            C285.941,55.964,229.977,0,160.941,0z M160.941,182.294c-36.341,0-65.801-29.46-65.801-65.802c0-36.34,29.46-65.801,65.801-65.801
            c36.341,0,65.801,29.461,65.801,65.801C226.742,152.834,197.282,182.294,160.941,182.294z"
                  />
                </svg>
                <small class="d-block font-weight-normal">Almaty<?php echo $city;?></small>
              </p>
            </div>
            <div class="my-2">
              <p class="text-secondary" style="line-height: 2">
              ASAR MEDICUS Medical Center on Brusilovskoye<?php echo $clinics;?>
              </p>
              <div class="d-flex align-items-center">
                <span
                  class="d-inline-block rounded-circle"
                  style="width: 15px; height: 15px; background-color: #5d7de5"
                >
                </span>
                <small class="ml-1 text-secondary">Consulting</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="bg-light px-4 py-5 my-lg-5 my-md-2 my-sm-2">
            <div
              class="d-flex justify-content-between align-items-center mx-auto"
            >
              <div>
                <h2 class="font-weight-bold" style="margin-top: -30px">10 December 11:00<?php echo $consultation_date;?></h2>
              </div>
              <p class="text-center">
                <svg
                  width="25px"
                  class="mb-1"
                  fill="#5d7de5"
                  version="1.1"
                  id="Capa_1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  x="0px"
                  y="0px"
                  viewBox="0 0 321.883 321.883"
                  style="enable-background: new 0 0 321.883 321.883"
                  xml:space="preserve"
                >
                  <path
                    d="M160.941,0c-69.035,0-125,55.964-125,125.001c0,69.035,85.187,196.882,125,196.882c39.813,0,125-127.847,125-196.882
            C285.941,55.964,229.977,0,160.941,0z M160.941,182.294c-36.341,0-65.801-29.46-65.801-65.802c0-36.34,29.46-65.801,65.801-65.801
            c36.341,0,65.801,29.461,65.801,65.801C226.742,152.834,197.282,182.294,160.941,182.294z"
                  />
                </svg>
                <small class="d-block font-weight-normal">Almaty<?php echo $city;?></small>
              </p>
            </div>
            <div class="my-2">
              <p class="text-secondary" style="line-height: 2">
              MEDIKER Zhaiyk<?php echo $clinics;?>
              </p>
              <div class="d-flex align-items-center">
                <span
                  class="d-inline-block rounded-circle"
                  style="width: 15px; height: 15px; background-color: #000000"
                >
                </span>
                <small class="ml-1 text-secondary">PCR</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer fwhite" style="margin-top: 17vh;">
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
