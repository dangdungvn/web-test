<?php
$username1 = isset($_POST['username']) ? $_POST['username'] : '';
$password1 = isset($_POST['password']) ? $_POST['password'] : '';
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
$avatar = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl6VpwVhBh5olGluh6hdYrJYW_PdQfpf8bTrE_zWyzOA&s';
$email = isset($_POST['mail']) ? $_POST['mail'] : '';

include 'Connect.php';

$sql = "INSERT INTO tung VALUES (null,'$username1', '$password1', '$fullname', '$avatar', '$email' )";

if ($conn->query($sql) === TRUE) {
    header('Location:ListItem.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
