<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $fee = $_POST["fee"];
        include "../DB/db.php";
        $i = 0;
        $len = 0;
        $ok = 1;
        do {
            $len++;
        } while ($_POST["c$len"]);
        do {
            $sterpi = $_POST["stErpid$i"];
            $addFee = "UPDATE `accounts` SET `payment` = '$fee', paid = '' WHERE `erpid` = '$sterpi';";
            $feeRun = mysqli_query($connection, $addFee);
            if ($feeRun) {
                $ok = 1;
            } else {
                $ok = 0;
            }

            if ($i < $len - 1) {
                $i++;
            } else {
                break;
            }
        } while ($_POST["c$i"]);
        if ($ok) {
            $note = "All students are informed that their current semester fees has been updated. Please pay fee on time.";
            $noticeCheck = "SELECT * FROM notices where notice = '$note';";
            $noticeRunCheck = mysqli_query($connection, $noticeCheck);
            if ($role == "admin") {
                $createNotice = "INSERT INTO `notices` (`notice`, `notice_from`, `uploaded _by`, `time`) VALUES ('$note', '$fname $lname<br>(College Admin)', '$erpid', 'today');";
            } else {
                $createNotice = "INSERT INTO `notices` (`notice`, `notice_from`, `uploaded _by`, `time`) VALUES ('$note', '$fname $lname<br>(Account Department)', '$erpid', 'today');";
            }
            if (mysqli_num_rows($noticeRunCheck) == 0) {
                $noticeRun = mysqli_query($connection, $createNotice);
            } else {
                $noticeRun = 1;
            }
            if ($noticeRun) {
?>
                <script>
                    alert("Students Fees updated successfully..");
                    window.location = '../payments/fees.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>';
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Server error occured while posting notice..");
                    window.location = "../payments/fees.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("Some error occured while updating fees.\nPlease try again later.");
                window.location = "../payments/fees.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
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