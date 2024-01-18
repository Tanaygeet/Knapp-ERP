<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $sem = $_POST["sem"];
        $sec = $_POST["sec"];
        $course = $_POST["course"];
        include "../DB/db.php";
        $i = 0;
        $len = 0;
        $ok = 1;
        date_default_timezone_set("Asia/Kolkata");
        $today = date("Y-m-d");
        $now = date("Y-m-d, g:i:s a");
        do {
            $len++;
        } while ($_POST["c$len"]);
        do {
            $sterpi = $_POST["stErpid$i"];
            $stFnamei = $_POST["stFname$i"];
            $stAtti = $_POST["atd$i"];

            $attSet = "INSERT INTO `attendance` (`erpid`, `name`, `faculty`, `faculty_erpid`, `course`, `section`, `semester`, `attend`, `date`, `attendancetime`) VALUES ('$sterpi', '$stFnamei', '$fname $lname', '$erpid', '$course', '$sec', '$sem', '$stAtti', '$today', '$now');";
            $attRun = mysqli_query($connection, $attSet);
            if ($attRun) {
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
?>
            <script>
                alert("Attendance updated..");
                window.close();
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Some error occured while uploading attendance.\nPlease try again later.");
                window.location = "../fands/takeAtt.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
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