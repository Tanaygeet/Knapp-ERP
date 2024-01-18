<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $sname = $_POST["sname"];
        $scode = $_POST["scode"];
        $sem = $_POST["sem"];
        $section = $_POST["section"];
        $grpname = "$section-$sem-$scode";
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
            $stLnamei = $_POST["stLname$i"];
            $addYou = "INSERT INTO `knapp_chat_grp` (`member_erpid`, `group_name`, `group_owner_erpid`) VALUES ('$erpid', '$grpname', '$erpid');";
            $createRun = mysqli_query($connection, $addYou);
            $createQuery = "INSERT INTO `knapp_chat_grp` (`member_erpid`, `group_name`, `group_owner_erpid`) VALUES ('$sterpi', '$grpname', '$erpid');";
            $createRun = mysqli_query($connection, $createQuery);
            $allotCourse = "INSERT INTO `student_table` (`erpid`, `fname`, `lname`, `semester`, `section`, `subject`, `subject_code`, `faculty_erpid`) VALUES ('$sterpi', '$stFnamei', '$stLnamei', '$sem', '$section', '$sname', '$scode', '$erpid')";
            $allotRun = mysqli_query($connection, $allotCourse);
            if ($createRun && $allotRun && $addYou) {
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
                alert("Students added successfully..");
                window.close();
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Some error occured while adding students.\nPlease try again later.");
                window.location = "../fands/allot.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
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