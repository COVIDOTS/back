<?php
session_start();

// initializing variables
$email = "";
$first_name  = "";
$last_name = "";
$city = "";
$contact_number = "";
$password = "";
$user_uid = "user_seq.NEXTVAL";
$profile_image = null;

$errors = array(); 

// connect to the database
$db =  oci_connect("ecoron", "qwerty123", "//localhost/orcl");

if (!$db) {
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  // $user_uid = "user_seq.NEXTVAL";
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $city = $_POST['city'];
  $contact_number = $_POST['contact_number'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $profile_image = null;

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($contact_number)) { array_push($city, "City is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (count($errors) == 0) {
    $stid = oci_parse($db, 'BEGIN insertUser(user_seq.NEXTVAL,:first_name, :last_name, :city, 
    :contact_number, :email, :password, null); END;');
    

    // oci_bind_by_name($stid, ':user_uid', $user_uid);
    oci_bind_by_name($stid, ':first_name', $first_name);
    oci_bind_by_name($stid, ':last_name', $last_name);
    oci_bind_by_name($stid, ':city', $city);
    oci_bind_by_name($stid, ':contact_number', $contact_number);
    oci_bind_by_name($stid, ':email', $email);
    oci_bind_by_name($stid, ':password', $password);
    oci_bind_by_name($stid, ':profile_image', $profile_image);

    $r = oci_execute($stid);  // executes and commits

    if ($r) {
      header('location: registration_completed.php');
  }

  oci_free_statement($stid);
  }
}

// ... 
if (isset($_POST['login_user'])) {
    $email =  $_POST['email'];
    $password =  $_POST['password'];
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $new_password = md5($password);
        //Altynay tut sql
        $query = "SELECT COUNT(*) FROM users WHERE email='$email'AND password='$password'";
        
        $results = oci_parse($db, $query);
        oci_execute($results);
        oci_fetch_all($results, $results);

        //var_dump($results);
        // echo $results['COUNT(*)'][0];

        if ($results['COUNT(*)'][0] == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: index2.php');
        }else {
            array_push($errors, "Wrong email/password combination");
        }
    }
  }