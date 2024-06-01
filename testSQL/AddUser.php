<?php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$fullname = $firstname . ' ' . $lastname;
$avatar = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl6VpwVhBh5olGluh6hdYrJYW_PdQfpf8bTrE_zWyzOA&s';
$email = isset($_POST['mail']) ? $_POST['mail'] : '';

include 'Connect.php';

$sql = "INSERT INTO tung VALUES (null,'$username', '$password', '$fullname', '$avatar', '$email' )";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location:ListItem.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
