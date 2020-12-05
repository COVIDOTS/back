<?php include('server.php') ?>
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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="stylelogin.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </head>
  <body style="background-color: #004fa8">
    <div class="container">
      <header class="row navsector navsectorwhite">
        <div class="col-3">
          <h1 style="color: white">E-CORONA</h1>
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
              <a class="nav-link" href="login.php">Sign in</a>
            </li>
          </ul>
        </div>
      </header>
      <form method="post" action="regist.php" class="login">
  	  <?php include('errors.php'); ?>
      <section class="mainblock3">
        <div class="row col-8 reg" style="border: 10px solid white">
          <h3 style="margin-bottom: 50px !important">Register</h3>
          <div class="two">
            <div class="form-group horizmargin">
              <label for="exampleInputEmail1">Email address</label>
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                name="email"
                aria-describedby="emailHelp"
                placeholder="Enter email"
                value="<?php echo $email; ?>"
              />
            </div>
          </div>
          <div class="two">
            <div class="form-group horizmargin">
              <label for="exampleInputEmail1">First name</label>
              <input
                type="first_name"
                class="form-control"
                id="exampleInputEmail1"
                name="first_name"
                aria-describedby="emailHelp"
                placeholder="Enter first name"
                value="<?php echo $first_name; ?>"
              />
            </div>
            <div class="form-group horizmargin">
              <label for="exampleInputPassword1">Last name</label>
              <input
                type="last_name"
                class="form-control"
                id="exampleInputPassword1"
                name="last_name"
                placeholder="Enter last name"
                value="<?php echo $last_name; ?>"
              />
            </div>
          </div>
          <div class="two">
            <div class="form-group horizmargin">
              <label for="exampleInputEmail1">City</label>
              <input
                type="city"
                class="form-control"
                id="exampleInputEmail1"
                name="city"
                aria-describedby="emailHelp"
                placeholder="Enter your city"
                value="<?php echo $city; ?>"
              />
            </div>
            <div class="form-group horizmargin">
              <label for="exampleInputPassword1">Phone number</label>
              <input
                type="contact_number"
                class="form-control"
                name="contact_number"
                id="exampleInputPassword1"
                placeholder="Enter phone number"
                value="<?php echo $contact_number; ?>"
              />
            </div>
          </div>
          <div class="two">
            <div class="form-group horizmargin">
              <label for="exampleInputEmail1">Password</label>
              <input
                type="password"
                class="form-control"
                id="exampleInputEmail1"
                name= "password"
                aria-describedby="emailHelp"
                placeholder="Enter password"
                value="<?php echo $password; ?>"
              />
            </div>
            
            <div class="form-group horizmargin">
              <label >Photo</label>
              <input
                type="file"
                class="form-control"
                class="form-control"
                name="lob_upload"
                placeholder="Upload your photo"
                value="<?php echo $profile_image; ?>"
              />
            </div>
          </div>
          <div style="margin-top: 30px; display: flex; flex-direction: column;justify-content: center;">
           <button type="submit" class="btn btn-primary" name="reg_user">Register</button><br>
           <p class="ltext" style="margin-top: -5px; text-align: center;">Already have account?</p>
           <a href="login.php" style="font-size: 18px !important">Login to E-CORONA here</a>
          </div>
        </div>
      </form>
      </section>
      <footer class="footer fwhite" style="margin-top: 17vh">
        <div class="row col-4">
          <div class="icondiv">
            <img src="images/call.svg" />
            <h5 style="padding: 10px">103</h5>
          </div>
          <div class="icondiv" style="margin-right: 2vw">
            <img src="images/call.svg" />
            <h5 style="margin: 10px 0px">8 702 369 0918</h5>
          </div>
        </div>
        <div class="row col-8" style="display: flex; justify-content: flex-end">
          <h1>E-CORONA</h1>
        </div>
      </footer>
    </div>
  </body>
</html>


