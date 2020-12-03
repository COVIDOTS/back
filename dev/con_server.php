<?php
session_start();

$age = "";
$phone = "";
$first_nameCN = "";
$last_nameCN = "";
$cityOption = isset($_POST['cityOption']) ? $_POST['cityOption'] : false;
$medicalOption = isset($_POST['medicalOption']) ? $_POST['medicalOption'] : false;
$doctorOption = isset($_POST['doctorOption']) ? $_POST['doctorOption'] : false;
$dateTimeOption = isset($_POST['dateTimeOption']) ? $_POST['dateTimeOption'] : false;
// $consultation_date = "";
$errors = array(); 

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
    if ($cityOption) {
        $city = htmlentities($_POST['cityOption'], ENT_QUOTES, "UTF-8");}
    else {
        echo "task option is required";
    }
    if ($medicalOption) {
        $clinics = htmlentities($_POST['medicalOption'], ENT_QUOTES, "UTF-8");}
    else {
        echo "task option is required";
    }
    if ($doctorOption) {
        $doctor = htmlentities($_POST['doctorOption'], ENT_QUOTES, "UTF-8");}
    else {
        echo "task option is required";
    }
    if ($dateTimeOption) {
        $consultation_date = htmlentities($_POST['dateTimeOption'], ENT_QUOTES, "UTF-8");}
    else {
        echo "task option is required";
    }
    
    if (empty($phone)) {
        array_push($errors, "Phone is required!");
    }
    if (empty($age)) {
        array_push($errors, "Age is required!");
    }
    if (count($errors) == 0) {
        $stid = oci_parse($conn, 'INSERT INTO online_consultation (first_name, last_name, age, phone, city, doctor, clinics, consultation_date) VALUES(:first_name, :last_name, :age, :phone, :city, :doctor,:clinics, :consultation_date)');

        oci_bind_by_name($stid, ':first_name', $first_nameCN);
        oci_bind_by_name($stid, ':last_name', $last_nameCN);
        oci_bind_by_name($stid, ':age', $age);
        oci_bind_by_name($stid, ':phone', $phone);
        oci_bind_by_name($stid, ':city', $city);
        oci_bind_by_name($stid, ':doctor', $doctor);
        oci_bind_by_name($stid, ':clinics', $clinics);
        oci_bind_by_name($stid, ':consultation_date', $consultation_date);

        $r = oci_execute($stid);  // executes and commits

        if ($r) {
            header('location: consultation_schedule.php');
        }

        oci_free_statement($stid);
    }
}
oci_close($conn);

?>