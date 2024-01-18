<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $bill = $_GET["bill"];
        $pay = $_GET["pay"];
        $otp = $_GET["otp"];
        date_default_timezone_set("Asia/Calcutta");
        $time = date("h:m:sa - d/m/y");
        include "../DB/db.php";
        if ($_POST["otp"] === $otp) {
            $payQuery = "INSERT INTO `payments` (`erpid`, `ammount`, `bill`, `payment_time`) VALUES ('$erpid', '$pay', '$bill', '$time');";
            $payUpdate = "UPDATE `accounts` SET `paid` = 'paid' WHERE `erpid` = '$erpid';";
            $payRun = mysqli_query($connection, $payQuery);
            $updateRun = mysqli_query($connection, $payUpdate);
            if ($payRun) {
                header("location: ../fee/success.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&bill=$bill&pay=$pay");
            } else {
?>
                <script>
                    alert("oops! Something went wrong.\nPlease retry payment.");
                    window.location = history.go(-2);
                </script>
        <?php
            }
        } else {
            header("location: ../fee/fail.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&bill=$bill&pay=$pay");
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