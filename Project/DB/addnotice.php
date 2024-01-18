<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $notice = $_POST['notice'];
        $notice_from = $_POST['notice_from'];
        date_default_timezone_set("Asia/Kolkata");
        $today = date("Y-m-d, g:i:s A");
        include 'db.php';
        $host = "INSERT INTO `notices` (`notice`, `notice_from`, `uploaded _by`, `time`) VALUES ('$notice', '$notice_from', '$erpid', '$today')";
        $run = mysqli_query($connection, $host);
        if ($run) {
?>
            <script>
                alert("Notice posted successfully.");
                location = '../notice/main.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("oops! server failed while posting.");
                location = window.history.back();
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