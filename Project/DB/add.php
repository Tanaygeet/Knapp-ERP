<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];

        include "db.php";
        $email = $_POST["email"];
        $erpid = $_POST["erpid"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phone = $_POST["pno"];
        $dob = $_POST["dob"];
        $gen = $_POST["gen"];
        $role = $_POST["role"];
        $degree = $_POST["degree"];
        $branch = $_POST["branch"];
        $stype = $_POST["type"];
        $sshift = $_POST["shift"];
        $password = password_hash($_POST["upasswd"], PASSWORD_DEFAULT);
        $sque = "What is your name?";
        $sans = "$fname $lname";
        $fn = $_GET['fn'];
        $ln = $_GET['ln'];
        $key = $_GET['key'];
        $id = $_GET['id'];
        $urole = $_GET['role'];
        date_default_timezone_set("Asia/Kolkata");
        $udateTime = date("g:i:sa l, M d, Y");
        $year = date("Y");

        $checkquery = "SELECT * FROM `accounts` where erpid = '$erpid';";
        $checkrun = mysqli_query($connection, $checkquery);

        if (mysqli_num_rows($checkrun) == 0) {
            $query = "INSERT INTO `accounts` (`mailid`, `erpid`, `mobile`, `firstname`, `lastname`, `age`, `gender`, `role`, `password`, `sequrityque`, `sequrityans`, `updation_time`, `first_login`, `year`, `degree`, `branch`, `staff_type`, `staff_shift`) VALUES ('$email', '$erpid', '$phone', '$fname', '$lname', '$dob', '$gen', '$role', '$password', '$sque', '$sans', '$udateTime', 'y', '$year', '$degree', '$branch', '$stype', '$sshift');";
            $chatquery = "INSERT INTO `knapp_chat_acc` (`first_name`, `last_name`, `erpid`) VALUES ('$fname', '$lname', '$erpid')";
            $mailquery = "INSERT INTO `knapp_mail_acc` (`name`, `mail`) VALUES ('$fname $lname', '$erpid@knapp.in')";
            $run = mysqli_query($connection, $query);
            $chatrun = mysqli_query($connection, $chatquery);
            $mailrun = mysqli_query($connection, $mailquery);
            if ($run && $chatrun && $mailrun) {
?>
                <script>
                    alert("User Added Successfully.");
                    window.location = '../display/register.php?<?php echo "fn=$fn&ln=$ln&key=$key&id=$id&role=$urole"; ?>';
                </script>
            <?php
            }
        } else {
?>
            <script>
                alert("This ERP-ID is already in use.");
                window.location = '../display/register.php?<?php echo "fn=$fn&ln=$ln&key=$key&id=$id&role=$urole"; ?>';
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
    header("location: ../index.php");
}
?>