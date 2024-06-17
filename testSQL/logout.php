<?php
include 'Connect.php';
session_start();
if (isset($_SESSION['useradmin']) && isset($_SESSION['passadmin'])) {
    session_destroy();
    header('Location:signup.php');
} else {
    header('Location:signup.php');
}
