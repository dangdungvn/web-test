<?php
include 'Connect.php'; // đoạn kết nối
// đoạn xóa
include 'DeleteUser.php';
session_start();
if (isset($_SESSION['useradmin']) && isset($_SESSION['passadmin'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Danh sách người dùng</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/style.css">
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
                                        <a class="btn btn-outline-primary" href="AddData.php">Add User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-warning" href="ListItem.php">Style</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-warning" href="logout.php" name="logout">Đăng Xuất</a>
                                    </li>
                                </ul>
                                <form class="d-flex" role="search">
                                    <form action="TrueListItem.php" method="POST">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
                                        <button class="btn btn-outline-success" type="submit" name="btn_search">Search</button>
                                    </form>
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
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($_POST['btn_search'])) {
                                $input = $_POST['search'];
                            } else {
                                echo $input = false;
                            }
                            $sql = "SELECT * FROM `tung`";
                            $sqlSearch = "SELECT * FROM `tung` WHERE `fullname` LIKE '%$input%'";
                            $result = $conn->query($sqlSearch);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['fullname'] . '</td>';
                                    echo '<td>' . $row['username'] . '</td>';
                                    echo '<td>' . $row['password'] . '</td>';
                                    echo '<td>' . $row['mail'] . '</td>';
                                    echo '<td><img src= "http://localhost/phptest/testSQL/' . $row['avatar'] . '" alt="" width="100px" height="100px"></td>';
                                    echo '<td><a href="UpdateData.php?id=' . $row['id'] . '" class="btn btn-outline-warning">Update</a>
                                        <a href="TrueListItem.php?id=' . $row['id'] . '" class="btn btn-outline-danger">Delete</a></td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                            <div id="result"></div>
                        </tbody>
                    </table>
                </div><!-- Hết col-12 -->
            </div>
        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#search").keyup(function() {
                    var input = $(this).val();
                    if (input != "") {
                        $.ajax({
                            url: 'Search.php',
                            method: 'POST',
                            data: {
                                input: input
                            },
                            success: function(data) {
                                $("#result").html(data);
                            }
                        });
                    } else {
                        $("#result").css("display", "none");
                    }
                });
            });
        </script> -->

    </body>

    </html>
<?php
} else {
    header("Location:signup.php");
}
