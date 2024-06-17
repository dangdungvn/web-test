<?php
include 'Connect.php';
session_start();
$useradmin = isset($_POST['useradmin']) ? $_POST['useradmin'] : '';
$passadmin = isset($_POST['passadmin']) ? $_POST['passadmin'] : '';
$sqlCheckLogin = "SELECT * FROM `admin` WHERE `useradmin` = '$useradmin' AND `passadmin` = '$passadmin'";
$result = $conn->query($sqlCheckLogin);
if ($result->num_rows > 0) {
    $_SESSION['useradmin'] = $useradmin;
    $_SESSION['passadmin'] = $passadmin;
    header('Location:TrueListItem.php');
} else {
    header('Location:signup.php');
}
