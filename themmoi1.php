<?php
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$avatar = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl6VpwVhBh5olGluh6hdYrJYW_PdQfpf8bTrE_zWyzOA&s';
$email = isset($_POST['mail']) ? $_POST['mail'] : '';
$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : '';

include 'connect.php';

$sql = "INSERT INTO tung VALUES (null, '$fullname', '$phone', '$avatar', '$email', '$diachi')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location:list.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
