<?php

$SERVER = "localhost";
$USERNAME = "root";
$PASSWORD = "pass";
$DB = "asterisk";

$connection = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB);
if (mysqli_connect_errno()) {
    echo "Connection not established .";
}
?>