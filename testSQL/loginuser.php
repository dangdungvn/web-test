<?php
include 'Connect.php';

$useradmin = isset($_POST['useradmin']) ? $_POST['useradmin'] : '';
$passadmin = isset($_POST['passadmin']) ? $_POST['passadmin'] : '';

$sqlCheckLogin = "SELECT * FROM `admin` WHERE `useradmin` = '$useradmin' AND `passadmin` = '$passadmin'";


$result = $conn->query($sqlCheckLogin);
if ($result->num_rows > 0) {
    header("Location:TrueListItem.php");
}
$conn->close();
