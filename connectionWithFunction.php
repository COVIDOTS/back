<?php

/*
  CREATE OR REPLACE FUNCTION myfunc(p IN NUMBER) RETURN NUMBER AS
  BEGIN
      RETURN p * 3;
  END;

*/

$conn = oci_connect('cc', '123', 'localhost/orcl');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$p = 8;

$stid = oci_parse($conn, 'begin :r := myfunc(:p); end;');
oci_bind_by_name($stid, ':p', $p);
oci_bind_by_name($stid, ':r', $r, 40);

oci_execute($stid);

print "$r\n";   // prints 24

oci_free_statement($stid);
oci_close($conn);

?>