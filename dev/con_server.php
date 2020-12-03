<?php
session_start();

$age = "";
$phone = "";
$consultation_date = "";
$first_nameCN = "";
$last_nameCN = "";

$conn = oci_connect('ecoron', 'qwerty123', 'localhost/orcl');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
if (isset($_POST['submit_consultation'])) {
    $first_nameCN = $_POST['first_nameCN'];
    $last_nameCN = $_POST['last_nameCN'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $city = 'Almaty';
    $doctor = 'Eluabeva A.K';
    $clinics = 'PCRSFVSDFVSD';

    
    if (empty($phone)) {
        array_push($errors, "Phone is required!");
    }
    if (empty($age)) {
        array_push($errors, "Age is required!");
    }

    $stid = oci_parse($conn, 'INSERT INTO online_consultation (first_name, last_name, age, phone, city, doctor, clinics, consultation_date) VALUES(:first_name, :last_name, :age, :phone, :city, :doctor,:clinics, sysdate)');

    oci_bind_by_name($stid, ':first_name', $first_nameCN);
    oci_bind_by_name($stid, ':last_name', $last_nameCN);
    oci_bind_by_name($stid, ':age', $age);
    oci_bind_by_name($stid, ':phone', $phone);
    oci_bind_by_name($stid, ':city', $city);
    oci_bind_by_name($stid, ':doctor', $doctor);
    oci_bind_by_name($stid, ':clinics', $clinics);

    $r = oci_execute($stid);  // executes and commits

    if ($r) {
        header('location: consultation_schedule.php');
    }

    oci_free_statement($stid);
}
oci_close($conn);

?>