<?php include('admin_server.php') ?>
<?php 
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
<!DOCTYPE php>
<php>
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
        <a class="nav-link active" href="index2.php">Main</a>
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
  <?php 
    $db = oci_connect('ecoron', 'qwerty123', 'localhost/orcl');
    if (!$db) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    //Altynay tut sql
    $users_query = " BEGIN get_list_users; END;";
            
    $result = oci_parse($db, $users_query);
    oci_execute($result);


    $var = "Admin page";
    $var2 = "Monitoring User's action";
    echo "<h4 style='margin-top: 3vh'>$var</h4>";
    echo "<h5 style='margin-top: 3vh'>$var2</h5>";
    
    echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
            echo "<th scope='col'>Id</th>";
            echo "<th scope='col'>Operation Date</th>";
            echo "<th scope='col'>Old id</th>";
            echo "<th scope='col>New id</th>";
            echo "<th scope='col'>Old email</th>";
            echo "<th scope='col'>New email</th>";
            echo "<th scope='col'>Action</th>";
            echo "<th scope='col'>Action author</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<th scope='row'>1</th>";
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_ID']."</td>";
                echo "<td>".$row['NEW_ID']."-</td>";
                echo "<td>".$row['OLD_EMAIL']."</td>";
                echo "<td>".$row['NEW_EMAIL']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<th scope='row'>2</th>";
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_ID']."</td>";
                echo "<td>".$row['NEW_ID']."-</td>";
                echo "<td>".$row['OLD_EMAIL']."</td>";
                echo "<td>".$row['NEW_EMAIL']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<th scope='row'>1</th>";
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_ID']."</td>";
                echo "<td>".$row['NEW_ID']."-</td>";
                echo "<td>".$row['OLD_EMAIL']."</td>";
                echo "<td>".$row['NEW_EMAIL']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<th scope='row'>1</th>";
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_ID']."</td>";
                echo "<td>".$row['NEW_ID']."-</td>";
                echo "<td>".$row['OLD_EMAIL']."</td>";
                echo "<td>".$row['NEW_EMAIL']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<th scope='row'>1</th>";
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_ID']."</td>";
                echo "<td>".$row['NEW_ID']."-</td>";
                echo "<td>".$row['OLD_EMAIL']."</td>";
                echo "<td>".$row['NEW_EMAIL']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<th scope='row'>1</th>";
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_ID']."</td>";
                echo "<td>".$row['NEW_ID']."-</td>";
                echo "<td>".$row['OLD_EMAIL']."</td>";
                echo "<td>".$row['NEW_EMAIL']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<th scope='row'>1</th>";
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_ID']."</td>";
                echo "<td>".$row['NEW_ID']."-</td>";
                echo "<td>".$row['OLD_EMAIL']."</td>";
                echo "<td>".$row['NEW_EMAIL']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<th scope='row'>1</th>";
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_ID']."</td>";
                echo "<td>".$row['NEW_ID']."-</td>";
                echo "<td>".$row['OLD_EMAIL']."</td>";
                echo "<td>".$row['NEW_EMAIL']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<th scope='row'>1</th>";
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_ID']."</td>";
                echo "<td>".$row['NEW_ID']."-</td>";
                echo "<td>".$row['OLD_EMAIL']."</td>";
                echo "<td>".$row['NEW_EMAIL']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "</tbody>";
    echo "</table>";
    $var2 = "Consultation monitoring";
    echo "<h5 style='margin-top: 3vh'>$var2</h5>";
    $consultation_query = "BEGIN get_list_consulation; END;";
            
    $result = oci_parse($db, $consultation_query);
    oci_execute($result);
    echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
            echo "<th scope='col'>Id</th>";
            echo "<th scope='col'>Operation date</th>";
            echo "<th scope='col'>Old CID</th>";
            echo "<th scope='col>New CID</th>";
            echo "<th scope='col'>Old UID</th>";
            echo "<th scope='col'>New UID</th>";
            echo "<th scope='col'>Old DID</th>";
            echo "<th scope='col'>New DID</th>";
            echo "<th scope='col'>Old clinics</th>";
            echo "<th scope='col'>New clinics</th>";
            echo "<th scope='col'>Old date</th>";
            echo "<th scope='col'>New date</th>";
            echo "<th scope='col'>Action</th>";
            echo "<th scope='col'>Action author</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
            echo "<th scope='row'>1</th>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."-</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_DID']."</td>";
                echo "<td>".$row['NEW_DID']."</td>";
                echo "<td>".$row['OLD_CLINICS']."</td>";
                echo "<td>".$row['NEW_CLINICS']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            
            }
        echo "</tr>";
        echo "<tr>";
            echo "<th scope='row'>2</th>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."-</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_DID']."</td>";
                echo "<td>".$row['NEW_DID']."</td>";
                echo "<td>".$row['OLD_CLINICS']."</td>";
                echo "<td>".$row['NEW_CLINICS']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."-</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_DID']."</td>";
                echo "<td>".$row['NEW_DID']."</td>";
                echo "<td>".$row['OLD_CLINICS']."</td>";
                echo "<td>".$row['NEW_CLINICS']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."-</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_DID']."</td>";
                echo "<td>".$row['NEW_DID']."</td>";
                echo "<td>".$row['OLD_CLINICS']."</td>";
                echo "<td>".$row['NEW_CLINICS']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."-</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_DID']."</td>";
                echo "<td>".$row['NEW_DID']."</td>";
                echo "<td>".$row['OLD_CLINICS']."</td>";
                echo "<td>".$row['NEW_CLINICS']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."-</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_DID']."</td>";
                echo "<td>".$row['NEW_DID']."</td>";
                echo "<td>".$row['OLD_CLINICS']."</td>";
                echo "<td>".$row['NEW_CLINICS']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."-</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_DID']."</td>";
                echo "<td>".$row['NEW_DID']."</td>";
                echo "<td>".$row['OLD_CLINICS']."</td>";
                echo "<td>".$row['NEW_CLINICS']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."-</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_DID']."</td>";
                echo "<td>".$row['NEW_DID']."</td>";
                echo "<td>".$row['OLD_CLINICS']."</td>";
                echo "<td>".$row['NEW_CLINICS']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."-</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_DID']."</td>";
                echo "<td>".$row['NEW_DID']."</td>";
                echo "<td>".$row['OLD_CLINICS']."</td>";
                echo "<td>".$row['NEW_CLINICS']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "</tbody>";
    echo "</table>";
    $var3 = "PCR monitoring";
    echo "<h5 style='margin-top: 3vh'>$var3</h5>";
    $pcr_query = "SELECT * FROM online_pcr_log";
            
    $result = oci_parse($db, $pcr_query);
    oci_execute($result);
    echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
            echo "<th scope='col'>Id</th>";
            echo "<th scope='col'>Operation date</th>";
            echo "<th scope='col'>Old PID</th>";
            echo "<th scope='col>New PID</th>";
            echo "<th scope='col'>Old CID</th>";
            echo "<th scope='col'>New CID</th>";
            echo "<th scope='col'>Old UID</th>";
            echo "<th scope='col'>New UID</th>";
            echo "<th scope='col'>Old punkt</th>";
            echo "<th scope='col'>New punk</th>";
            echo "<th scope='col'>Old date</th>";
            echo "<th scope='col'>New date</th>";
            echo "<th scope='col'>Action</th>";
            echo "<th scope='col'>Action author</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
            echo "<th scope='row'>1</th>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_PID']."</td>";
                echo "<td>".$row['NEW_PID']."-</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_PUNKT']."</td>";
                echo "<td>".$row['NEW_PUNKT']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            
            }
        echo "</tr>";
        echo "<tr>";
            echo "<th scope='row'>2</th>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_PID']."</td>";
                echo "<td>".$row['NEW_PID']."-</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_PUNKT']."</td>";
                echo "<td>".$row['NEW_PUNKT']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_PID']."</td>";
                echo "<td>".$row['NEW_PID']."-</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_PUNKT']."</td>";
                echo "<td>".$row['NEW_PUNKT']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_PID']."</td>";
                echo "<td>".$row['NEW_PID']."-</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_PUNKT']."</td>";
                echo "<td>".$row['NEW_PUNKT']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_PID']."</td>";
                echo "<td>".$row['NEW_PID']."-</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_PUNKT']."</td>";
                echo "<td>".$row['NEW_PUNKT']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_PID']."</td>";
                echo "<td>".$row['NEW_PID']."-</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_PUNKT']."</td>";
                echo "<td>".$row['NEW_PUNKT']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_PID']."</td>";
                echo "<td>".$row['NEW_PID']."-</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_PUNKT']."</td>";
                echo "<td>".$row['NEW_PUNKT']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_PID']."</td>";
                echo "<td>".$row['NEW_PID']."-</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_PUNKT']."</td>";
                echo "<td>".$row['NEW_PUNKT']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "<tr>";
            while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
                echo "<td>".$row['OPERATION_DATE']."</td>";
                echo "<td>".$row['OLD_PID']."</td>";
                echo "<td>".$row['NEW_PID']."-</td>";
                echo "<td>".$row['OLD_CID']."</td>";
                echo "<td>".$row['NEW_CID']."</td>";
                echo "<td>".$row['OLD_UID']."</td>";
                echo "<td>".$row['NEW_UID']."</td>";
                echo "<td>".$row['OLD_PUNKT']."</td>";
                echo "<td>".$row['NEW_PUNKT']."</td>";
                echo "<td>".$row['OLD_DATE']."</td>";
                echo "<td>".$row['NEW_DATE']."</td>";
                echo "<td>".$row['ACTION']."</td>";
                echo "<td>".$row['ACTIONAUTHOR']."</td>";
            }
        echo "</tr>";
        echo "</tbody>";
    echo "</table>";
?>    

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