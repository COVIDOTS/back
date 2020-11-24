<?php
// Create connection to Oracle
$conn = oci_connect('cc', '123', 'localhost/orcl');
if (!$conn) {
   echo 'connection error';
}
else {
   echo "Connected to Oracle!";
}
?>

<html>
<head>

</head>
<body>
<hr>Test Connection</h2>
<?php

$result = oci_parse($conn, 'select name from komanda_krasavchikov');
oci_execute($result);  
while (($row = oci_fetch_array($result, OCI_ASSOC)) != false) {
   echo $row['NAME'] ."<br>\n";
}
?>

</body>
</html>