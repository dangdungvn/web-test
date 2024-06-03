<?php
include 'Connect.php';
include 'UploadImg.php';

$id = isset($_POST['id']) ? $_POST['id'] : 0;

$username1 = isset($_POST['username']) ? $_POST['username'] : '';
$password1 = isset($_POST['password']) ? $_POST['password'] : '';
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
$avatar = $target_file;
$email = isset($_POST['mail']) ? $_POST['mail'] : '';

$sql = "UPDATE `tung` SET `username` = '$username1', `password` = '$password1', `fullname` = '$fullname', `avatar` = '$avatar', `mail` = '$email' WHERE `tung`.`id` = " . $id;

if ($conn->query($sql) === TRUE) {
    header('Location:TrueListItem.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
