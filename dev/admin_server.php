<?php
session_start();

$totalUsers = 0;

// connect to the database
$db =  oci_connect("ecoron", "qwerty123", "//localhost/orcl");

//if database not connected
if (!$db) {
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

function do_row_check($db){
    $stid = oci_parse($db, "BEGIN :temp :=usersAutoCommit; END;");
    oci_bind_by_name($stid, ':temp', $totalUsers);
    oci_execute($stid);
    oci_fetch_all($stid, $res);
    return $totalUsers;
}

$starttime = microtime(TRUE);
for ($i = 0; $i < 10000; $i++) {
    do_row_check($db);
    if(i == 10000){
        do_row_check($db);
    }
}

$endtime = microtime(TRUE) - $starttime;
echo "Time was ".round($endtime,3)." seconds<br>";

?>