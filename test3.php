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

// Each fetch populates the previously defined variables with the next row's data
while (oci_fetch($result)) {
    echo "First name $first_nameCN date $consultation_date<br>\n";
}

// Displays:
//   Location id 1000 is Roma
//   Location id 1100 is Venice

oci_free_statement($result);
oci_close($conn);