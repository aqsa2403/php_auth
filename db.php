<?php
$serverName = "LAB9-6\SQL2022ENT"; 
$connectionInfo = array(
    "Database" => "auth_form",
    "UID" => "sa",
    "PWD" => "sa9",
    "CharacterSet" => "UTF-8",
    "TrustServerCertificate" => true
);

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
}
?>