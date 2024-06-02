<?php
include 'Connect.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$sqlDelete = "";
if ($id > 0) {
    $sqlDelete = "DELETE FROM `tung` WHERE `id` = " . $id;
    if ($conn->query($sqlDelete) === TRUE) {
        header('Location:TrueListItem.php');
    } else {
        echo "Error: " . $sqlDelete . "<br>" . $conn->error;
    }
}
