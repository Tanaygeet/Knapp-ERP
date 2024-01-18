<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $old_pass = $_POST["old_pass"];
        $new_pass = $_POST["new_pass"];
        $sQue = $_POST["sQue"];
        $sAns = $_POST["sAns"];
        $mobile = $_POST["pno"];
        $email = $_POST["uemail"];
        include "../DB/db.php";
        if (password_verify($old_pass, $passwd)) {
            if ($new_pass != null) {
                $pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $update = "UPDATE `accounts` SET `mailid` = '$email', `mobile` = '$mobile', `password` = '$pass', `sequrityque` = '$sQue', `sequrityans` = '$sAns' WHERE `erpid` = '$erpid';";
                $updateRun = mysqli_query($connection, $update);
            } else {
                $update = "UPDATE `accounts` SET `mailid` = '$email', `mobile` = '$mobile', `sequrityque` = '$sQue', `sequrityans` = '$sAns' WHERE `erpid` = '$erpid';";
                $updateRun = mysqli_query($connection, $update);
            }
            if ($updateRun) {
                if ($new_pass != null) {
?>
                    <script>
                        alert("Details updated successfully.\nPlese re-login to verify your changes");
                        <?php
                        $_SESSION['skey'] == password_hash($new_pass, PASSWORD_DEFAULT);
                        ?>
                        window.location = "../logout.php";
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert("Details updated successfully.\nPlese re-login to verify your changes");
                        window.location = "../logout.php";
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("Server error.");
                    <?php
                    if ($role == "hod" || $role == "hoi" || $role == "faculty") {
                    ?>
                        window.location = "../dashboard/faculty-menu.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?> ";
                    <?php
                    } else {
                    ?>
                        window.location = "<?php echo "../dashboard/$role-menu.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?> ";
                    <?php
                    }
                    ?>
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("You entered a wrong current password.\nPlease re enter password to update changes.")
                window.location = "../display/editUser.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&location=admin-menu.php"; ?>";
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
    header('location: ../index.php');
}
?>