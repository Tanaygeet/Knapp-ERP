<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        include 'db.php';
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET['role'];
        $sque = $_POST["sQue"];
        $sans = $_POST["sAns"];
        $newpass = password_hash($_POST["newPass"], PASSWORD_DEFAULT);
        $query = "UPDATE `accounts` SET `password` = '$newpass', `sequrityque` = '$sque', `sequrityans` = '$sans', `first_login` = 'n' WHERE `accounts`.`erpid` = '$erpid';";
        $run = mysqli_query($connection, $query);
        if ($run) {
            $_SESSION['skey'] = $newpass;
            if ($role == "hod" || $role == "hoi" || $role == "faculty") {
                header("location: ../dashboard/faculty-menu.php?fn=$fname&ln=$lname&key=$newpass&id=$erpid&role=$role");
            } else {
                header("location: ../dashboard/$role-menu.php?fn=$fname&ln=$lname&key=$newpass&id=$erpid&role=$role");
            }
        } else {
?>
            <script>
                alert("Error while updating.");
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("oops! something went wrong.");
            location = window.history.back();
        </script>
<?php
    }
} else {
    header("location: ../");
}
?>