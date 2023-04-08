<?php
$sname= "localhost";
$unmae= "root";
$code = "B]OAEuUipt1f7UFA";

$db_name = "usergamezone";

$conn = mysqli_connect($sname, $unmae, $code, $db_name);

if (!$conn) {
    echo "failed";
}
