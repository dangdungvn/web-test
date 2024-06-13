<?php
include 'Connect.php';
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $sql = "SELECT * FROM `tung` WHERE `username` LIKE '%" . $input . "%' OR `fullname` LIKE '%" . $input . "%' OR `mail` LIKE '%" . $input . "%' OR `password` LIKE '%" . $input . "%'";
    $result = $conn->query($sql);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-inverse">
                    <tbody><?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['username'] . '</td>';
                                    echo '<td>' . $row['password'] . '</td>';
                                    echo '<td>' . $row['fullname'] . '</td>';
                                    echo '<td>' . $row['mail'] . '</td>';
                                    echo '<td><img src= "http://localhost/phptest/testSQL/' . $row['avatar'] . '" alt="" width="100px" height="100px"></td>';
                                    echo '<td><a href="UpdateData.php?id=' . $row['id'] . '" class="btn btn-outline-warning">Update</a>
                                    <a href="TrueListItem.php?id=' . $row['id'] . '" class="btn btn-outline-danger">Delete</a></td>';
                                    echo '</tr>';
                                }
                            } ?>
                    </tbody>
                </table>
            </div><!-- Hết col-12 -->
        </div>
    </div>
<?php
}
?>