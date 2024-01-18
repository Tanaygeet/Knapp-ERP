<?php
session_start();
if ($_SESSION['sid']) {
    $erpid = $_GET['erpid'];
    if ($_SESSION['sid'] == $erpid) {
        include "db.php";
        $password = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        $query = "UPDATE `accounts` SET `password` = '$password' WHERE `accounts`.`erpid` = '$erpid';";
        $run = mysqli_query($connection, $query);

        if ($run) {
?>
            <script>
                alert("Password updated successfully, please do login.")
                location = "../";
            </script>
        <?php
        } else {
?>
            <script>
                alert("oops! it's our server mistake please try again.")
                location = window.history.back();
            </script>
        <?php
        }
    } else {
?>
        <script>
            alert("oops! something went wrong.");
        </script>
<?php
    }
} else {
    header("location: ../");
}
?>