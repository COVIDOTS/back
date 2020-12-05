<?php include('con_server.php') ?>
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
      </ul>
    </div>
  </header>
  <form method="post" action="consultation.php" class="login">
  <section class="mainblock3">
    <div class="row col-8 reg" style="border: 1px solid white;">
      <div class="horizmargin">
        <h3 style="margin-bottom: 30px !important;">Plan meeting with doctor</h3>
        <h6 style="text-align: center; padding-bottom: 20px; border-bottom: 1px solid #004FA8">Personal information</h6>
      </div>
      <div class="two">
      <div class="form-group horizmargin">
          <label for="exampleInputEmail1">First name</label>
          <input type="search" class="form-control" name="first_nameCN" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" aria-label="Search" value="<?php echo $first_nameCN; ?>">
      </div>
      <div class="form-group horizmargin">
          <label for="exampleInputPassword1">Last name</label>
          <input type="search" class="form-control" name="last_nameCN" id="exampleInputPassword1" placeholder="Enter last name" aria-label="Search" value="<?php echo $last_nameCN; ?>">
      </div>
    </div>
      <div class="two">
      <div class="form-group horizmargin">
          <label for="exampleInputPassword1">Age</label>
          <input type="search" class="form-control" name="age" id="exampleInputPassword1" placeholder="Enter age" aria-label="Search" value="<?php echo $age; ?>">
      </div>
      <div class="form-group horizmargin">
          <label for="exampleInputEmail1">Phone number</label>
          <input type="search" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your phone number" aria-label="Search" value="<?php echo $phone; ?>">
      </div>
    </div>
    <div class="horizmargin" style="margin-top: 30px;">
        <h6 style="text-align: center; padding-bottom: 20px; border-bottom: 1px solid #004FA8">Meeting details</h6>
        <div style="display: flex;flex-direction: row; justify-content: space-between;">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
          <label class="form-check-label" for="exampleRadios1">
          I accept all personalization of my data and give full consent to its processing
          </label>
        </div>
      </div>
      </div>
      
      <div class="two">
        <div class="form-group horizmargin">
          <label for="exampleFormControlSelect1">City</label>
          <select class="form-control" id="exampleFormControlSelect1" name="cityOption">
            <option></option>
            <option value="Almaty">Almaty</option>
            <option value="Nur-Sultan">Nur-Sultan</option>
            <option value="Shymkent">Shymkent</option>
            <option value="Qaragandy">Qaragandy</option>
            <option value="Uralsk">Uralsk</option>
          </select>
        </div>
        <div class="form-group horizmargin">
          <label for="exampleFormControlSelect1">Clinics</label>
          <select class="form-control" id="exampleFormControlSelect1" name="medicalOption">
            <option></option>
            <!-- Altynay mojno tut kak-to optimizirovat'? -->
            <option value="EMIRMED Medical Center">EMIRMED Medical Center</option>
            <option value="Medical Center ALGAMED">Medical Center "ALGAMED</option>
            <option value="Institute of Molecular Medicine">Institute of Molecular Medicine</option>
            <option value="Central Family Clinic of Almaty">Central Family Clinic of Almaty</option>
            <option value="SANA Medical Center">SANA Medical Center</option>
            <option value="City polyclinic No. 16">City polyclinic No. 16</option>
            <option value="TAU SUNKAR Medical Center in Mamyr">TAU SUNKAR Medical Center in Mamyr</option>
            <option value="ALTERNA-L Medical Scientific Center">ALTERNA-L Medical Scientific Center</option>
            <option value="MEDLIVE Clinic">MEDLIVE Clinic</option>
            <option value="ALTA Medical Center">ALTA Medical Center</option>
            <option value="MPK CLINIC Korean Medical Center">MPK CLINIC Korean Medical Center</option>
            <option value="ASAR MEDICUS Medical Center on Brusilovskoye">ASAR MEDICUS Medical Center on Brusilovskoye</option>
            <option value="MEDLIVE clinics">MEDLIVE clinics</option>
            <option value="City polyclinic No. 10">City polyclinic No. 10</option>
            <option value="Centre for AIDS Prevention and Control Nur-Sultan">Centre for AIDS Prevention and Control Nur-Sultan</option>
            <option value="Aya Medical Centre in Koshkarbayeva">Aya Medical Centre in Koshkarbayeva</option>
            <option value="Regional Allergic Centre DIVERA">Regional Allergic Centre DIVERA</option>
            <option value="KRISTINA Clinic">KRISTINA Clinic</option>
            <option value="Karaganda Regional Centre for AIDS Prevention and Control">Karaganda Regional Centre for AIDS Prevention and Control</option>
            <option value="Karaganda Regional Infectious Disease Hospital">Karaganda Regional Infectious Disease Hospital</option>
            <option value="City Hospital No. 1">City Hospital No. 1</option>
            <option value="SANAD Clinical and Diagnostic Rehabilitation Centre">SANAD Clinical and Diagnostic Rehabilitation Centre</option>
            <option value="Medical centre on 17 Builders Ave.">Medical centre on 17 Builders Ave.</option>
            <option value="Karaganda Regional Skin and Venereology Dispensary">Karaganda Regional Skin and Venereology Dispensary</option>
            <option value="HIPPOCRATE Polyclinic">HIPPOCRATE Polyclinic</option>
          </select>
        </div>
    </div>

    <div class="two">
        <div class="form-group horizmargin">
          <label for="exampleFormControlSelect1">Doctor</label>
          <select class="form-control" id="exampleFormControlSelect1" name="doctorOption">
            <option></option>
            <option value='Amanbekova Sania Razakbaevna'>Amanbekova Sania Razakbaevna</option>
            <option value='Amirova Halia Kulumbekovna'>Amirova Halia Kulumbekovna</option>
            <option value='Maltseva Inna Vladimirovna'>Maltseva Inna Vladimirovna</option>
            <option value='Ponomaryova Elena Viktorovna'>Ponomaryova Elena Viktorovna</option>
            <option value='Makhanbetova Lyazzat Erdalyevna'>Makhanbetova Lyazzat Erdalyevna</option>
            <option value='Abdurasheva S.T.'>Abdurasheva S.T.</option>
            <option value='Slavko Elena Alekseevna'>Slavko Elena Alekseevna</option>
            <option value='Shagmanova Saule Kagigalievna'>Shagmanova Saule Kagigalievna</option>
            <option value='Golovenko Marina Valerievna'>Golovenko Marina Valerievna</option>
            <option value='Erkinbai Aliya Erkinbaikyzy'>Erkinbai Aliya Erkinbaikyzy</option>
            <option value='Abildaeva Farida Kurmanalievna'>Abildaeva Farida Kurmanalievna</option>
            <option value='Lidia Deryabina'>Lidia Deryabina</option>
            <option value='Seidulaeva Lisa Baishevna'>Seidulaeva Lisa Baishevna</option>
            <option value='Zubova Natalya Viktorovna'>Zubova Natalya Viktorovna</option>
            <option value='Biysheva Karlygash Kadyrovna'>Biysheva Karlygash Kadyrovna</option>
            <option value='Tairova Karima Tashkanovna'>Tairova Karima Tashkanovna</option>
            <option value='Auelbaev Zhaksybek Andabekovich'>Auelbaev Zhaksybek Andabekovich</option>
            <option value='Amanbekova Sania Razakbaevna'>Amanbekova Sania Razakbaevna</option>
            <option value='Amirova Halia Kulumbekovna'>Amirova Halia Kulumbekovna</option>
            <option value='Nursaule Alipkalievna Hasenova'>Nursaule Alipkalievna Hasenova</option>
            <option value='Abdrakhmanova Gulstan Katybaevna'>Abdrakhmanova Gulstan Katybaevna</option>
            <option value='Kuljanova Saule Muratbekovna'>Kuljanova Saule Muratbekovna</option>
            <option value='Umida Ismatulaevna Sultanova'>Umida Ismatulaevna Sultanova</option>
            <option value='Devdariani Khatuna Georgievna'>Devdariani Khatuna Georgievna</option>
          </select>
        </div>
        <div class="form-group horizmargin">
          <label for="exampleFormControlSelect1">Date&Time</label>
          <select class="form-control" id="exampleFormControlSelect1" name="dateTimeOption">
            <option></option>
            <option value="7 December 14:00">7 December 14:00</option>
            <option value="7 December 17:00">7 December 17:00</option>
            <option value="7 December 19:00">7 December 19:00</option>
            <option value="8 December 9:00">8 December 9:00</option>
            <option value="8 December 11:00">8 December 11:00</option>
            <option value="8 December 12:00">8 December 12:00</option>
            <option value="8 December 14:00">8 December 14:00</option>
            <option value="8 December 15:00">8 December 15:00</option>
            <option value="8 December 17:00">8 December 17:00</option>
            <option value="8 December 19:00">8 December 19:00</option>
            <option value="9 December 11:00">9 December 11:00</option>
            <option value="9 December 14:00">9 December 14:00</option>
            <option value="9 December 15:00">9 December 15:00</option>
            <option value="9 December 16:00">9 December 16:00</option>
          </select>
        </div>
    </div>
    <div style="margin-top: 30px; display: flex; flex-direction: column;justify-content: center;">
      <button type="submit" class="btn btn-primary" name="submit_consultation">Register</button><br>
    </div>

  </div>

    
  </section>
  </form>

</div>
</body>
</html>