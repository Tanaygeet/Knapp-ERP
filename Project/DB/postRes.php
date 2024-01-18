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
        $ass = $_POST["assiName"];
        include "../DB/db.php";
        $i = 0;
        $len = 0;
        $ok = 1;
        do {
            $len++;
        } while ($_POST["c$len"]);
        do {
            $sterpi = $_POST["stErpid$i"];
            $stFnamei = $_POST["stFname$i"];
            $marki = $_POST["mark$i"];

            $resSet = "INSERT INTO `result` (`erpid`, `name`, `faculty`, `faculty_erpid`, `course`, `section`, `semester`, `assignment`, `marks`) VALUES ('$sterpi', '$stFnamei', '$fname $lname', '$erpid', '$course', '$sec', '$sem', '$ass', '$marki');";
            $resRun = mysqli_query($connection, $resSet);
            if ($resRun) {
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
                alert("Result uploaded..");
                window.location = "../fands/upload_result.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Some error occured while updating result.\nPlease try again later.");
                window.location = "../fands/upload_result.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
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