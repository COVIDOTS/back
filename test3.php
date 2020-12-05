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

?>
<?php

function do_insert($conn)
{
  $stmt = "insert into mytable values (to_date('01-JAN-08 10:20:35', 
       'DD:MON:YY HH24:MI:SS'))";
  $s = oci_parse($conn, $stmt);
  $r = oci_execute($s);  // automatically commit
}
function do_row_check($conn)
{
  $stid = oci_parse($conn, "select count(*) c from mytable");
  oci_execute($stid);
  oci_fetch_all($stid, $res);
  echo "Number of rows: ", $res['C'][0], "<br>";
}
function do_delete($conn)
{
  $stmt = "delete from mytable";
  $s = oci_parse($conn, $stmt);
  $r = oci_execute($s);
}

// Program starts here
$c = oci_connect("phphol", "welcome", "//localhost/orcl");

$starttime = microtime(TRUE);
for ($i = 0; $i < 10000; $i++) {
  do_insert($c);
}



$endtime = microtime(TRUE) - $starttime;
echo "Time was ".round($endtime,3)." seconds<br>";

do_row_check($c);  // Check insert done
do_delete($c);     // cleanup committed rows

?>