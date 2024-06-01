<?php
include 'connect.php'; // đoạn kết nối
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách người dùng</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Danh sách dữ liệu</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Đăng ký</a>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                            </ul>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                                <a class="btn btn-outline-primary" href="AddData.php">Add</a>
                                <a class="btn btn-outline-primary" href="userlist.php">Style</a>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-inverse">
                    <thead>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tbl_user";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['username'] . '</td>';
                                echo '<td>' . $row['password'] . '</td>';
                                echo '<td>' . $row['fullname'] . '</td>';
                                echo '<td>' . $row['phone'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td><img src="' . $row['avatar'] . '" alt="" width="100px" height="100px"></td>';
                                echo '<td><a href="" class="btn btn-outline-warning">Update</a>
									<a href="" class="btn btn-outline-danger">Delete</a></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>

            </div><!-- Hết col-12 -->

        </div>
    </div>

</body>

</html>