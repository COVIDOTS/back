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
        <a class="nav-link active" href="main.html">Main</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultation.html">Consultation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultation.html">PCR check</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">COVID help centers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sch.html">Schedule</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="doctors.html">Specialists</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="login.html">Sign in</a>
      </li>
      </ul>
    </div>
  </header>
  <h4 style="margin-top: 3vh">Admin page</h4>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Old id</th>
        <th scope="col">New id</th>
        <th scope="col">Old name</th>
        <th scope="col">New name</th>
        <th scope="col">Admin id</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
          <td>Petrosyan</td>
          <td>Gribovich</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Qoltyqshash</td>
          <td>Bireudinqyzy</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Hotap</td>
          <td>Hotapovych</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Meshok</td>
          <td>Govna</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Tvoya</td>
          <td>Udacha</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Bazar</td>
          <td>Joq</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Bazar</td>
          <td>Bar</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
      </tr>
      <tr>
        <th scope="row">8</th>
        <td>Ty</td>
          <td>Chmo</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
      </tr>
      <tr>
        <th scope="row">9</th>
        <td>Ya</td>
          <td>Ustal</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
      </tr>
    </tbody>
  </table>
    

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