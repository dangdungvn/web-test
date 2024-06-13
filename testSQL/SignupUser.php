<?php
$username1 = isset($_POST['useradmin']) ? $_POST['useradmin'] : '';
$password1 = isset($_POST['passadmin']) ? $_POST['passadmin'] : '';
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
include 'Connect.php';

$sql = "INSERT INTO admin VALUES (null, '$fullname','$username1', '$password1')";
if ($conn->query($sql) === TRUE) {
    header('Location:TrueListItem.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
