<?php
include 'Connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Sửa thông tin người dùng</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Sửa thông tin người dùng</h2>
                    <?php
                    $id = isset($_GET['id']) ? $_GET['id'] : 0;
                    $sql = "SELECT * FROM `tung` WHERE `id` = " . $id;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <form action="UpdateUser.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="row row-space">
                                    <div class="col-4">
                                        <div class="input-group">
                                            <label class="label">Full name</label>
                                            <input class="input--style-4" type="text" name="fullname" value="<?php echo $row['fullname']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <div class="input-group">
                                                <label class="label">Email</label>
                                                <input class="input--style-4" type="email" name="mail" value="<?php echo $row['mail']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">User name</label>
                                            <input class="input--style-4" type="text" name="username" value="<?php echo $row['username']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Password</label>
                                            <input class="input--style-4" type="password" name="password" value="<?php echo $row['password']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-space">
                                    <div class="col-4">
                                        <fieldset class="form-group">
                                            <input id="" class="form-control" type="hidden" name="anhcu" value="<?php echo $row['avatar']; ?>">
                                            <label for="exampleInputFile">Avatar</label>
                                            <input name="fileToUpload" type="file" class="form-control-file" id="exampleInputFile">
                                            <img src=" http://localhost/phptest/testSQL/<?php echo $row['avatar']; ?>" width="
                                        100px" height="100px" alt="">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="p-t-15">
                                    <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                                </div>
                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
<!-- end document-->