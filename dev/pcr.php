<?php include('con_server.php') ?>
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
  <form method="post" action="pcr.php" class="login">
  <section class="mainblock3">
    <div class="row col-8 reg" style="border: 1px solid white;">
      <div class="horizmargin">
        <h3 style="margin-bottom: 30px !important;">Check your health with us!</h3>
        <h6 style="text-align: center; padding-bottom: 20px; border-bottom: 1px solid #004FA8">Personal information</h6>
      </div>
      <div class="two">
      <div class="form-group horizmargin">
          <label for="exampleInputEmail1">First name</label>
          <input type="search" class="form-control"  name="first_namePR" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" aria-label="Search" value="<?php echo $first_namePR; ?>">
      </div>
      <div class="form-group horizmargin">
          <label for="exampleInputPassword1">Last name</label>
          <input type="search" class="form-control" name="last_namePR" id="exampleInputPassword1" placeholder="Enter last name" aria-label="Search" value="<?php echo $last_namePR; ?>">
      </div>
    </div>
      <div class="form-group horizmargin">
          <label for="exampleInputEmail1" style='margin-left: 110px;'>Phone number</label>
          <input type="search" class="form-control" name="phonePR" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your phone number" aria-label="Search" value="<?php echo $phonePR; ?>">
      </div>
    <div class="horizmargin" style="margin-top: 30px;">
        <h6 style="text-align: center; padding-bottom: 20px; border-bottom: 1px solid #004FA8">Register details</h6>
        <div style="display: flex;flex-direction: row; justify-content: space-between;">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
          <label class="form-check-label" for="exampleRadios1">
          I accept all personalization of my data and give full consent to its processing
          </label>
        </div>
      </div>
      </div>
      
      <div class="two">
        <div class="form-group horizmargin">
          <label for="exampleFormControlSelect1">City</label>
          <select class="form-control" id="exampleFormControlSelect1" name="cityOptionPR">
            <option></option>
            <option value="Almaty">Almaty</option>
            <option value="Nur-Sultan">Nur-Sultan</option>
            <option value="Shymkent">Shymkent</option>
            <option value="Qaragandy">Qaragandy</option>
            <option value="Uralsk">Uralsk</option>
          </select>
        </div>
        <div class="form-group horizmargin">
          <label for="exampleFormControlSelect1">Center</label>
          <select class="form-control" id="exampleFormControlSelect1" name="punktPCR">
          <!-- Altynay mojno tut kak-to optimizirovat'? -->
            <option></option>
            <option value="PCV 'National Center of Expertise'">PCV "National Center of Expertise"</option>
            <option value="Medical Partners Korea Clinic LLP">Medical Partners Korea Clinic LLP</option>
            <option value="Medicare LLP">Medicare LLP</option>
            <option value="Invivo LLP">Invivo LLP</option>
            <option value="Olympus 'LLP'">Olympus" LLP</option>
            <option value="PCV 'National Center of Expertise'">PCV "National Center of Expertise"</option>
            <option value="Pediatric Cardiac Surgery of the National Scientific Medical Center">Pediatric Cardiac Surgery of the National Scientific Medical Center</option>
            <option value="Laboratory at City Hospital No. 2">Laboratory at City Hospital No. 2</option>
            <option value="MEDIKER network of medical centers">MEDIKER network of medical centers</option>
            <option value="MEDIKER Zhaiyk">MEDIKER Zhaiyk</option>
          </select>
        </div>
    </div>

    <div class="two">
        
    <div class="form-group horizmargin">
          <label for="exampleFormControlSelect1">Date&Time</label >
          <select class="form-control" id="exampleFormControlSelect1" name="dateTimeOptionPR">
            <option></option>
            <option value="10 December 14:00">7 December 14:00</option>
            <option value="10 December 17:00">7 December 17:00</option>
            <option value="10 December 19:00">7 December 19:00</option>
            <option value="11 December 9:00">11 December 9:00</option>
            <option value="11 December 11:00">11 December 11:00</option>
            <option value="11 December 12:00">11 December 12:00</option>
            <option value="11 December 14:00">11 December 14:00</option>
            <option value="11 December 15:00">11 December 15:00</option>
            <option value="11 December 17:00">11 December 17:00</option>
            <option value="11 December 19:00">11 December 19:00</option>
            <option value="12 December 11:00">12 December 11:00</option>
            <option value="12 December 14:00">12 December 14:00</option>
            <option value="12 December 15:00">12 December 15:00</option>
            <option value="12 December 16:00">12 December 16:00</option>
          </select>
        </div>
    </div>
    <div style="margin-top: 30px; display: flex; flex-direction: column;justify-content: center;">
    <button type="submit" class="btn btn-primary" name="submit_pcr">Register</button><br>
    </div>

  </div>

    
  </section>
  </form>

</div>
</body>
</html>