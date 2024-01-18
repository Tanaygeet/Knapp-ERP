<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $section = $_POST['section'];
        $sem = $_POST['sem'];
        $subject = $_POST['sub'];
        $subject_code = $_POST['sub_code'];
        $last_date = $_POST['last'];
        $assi_no = $_POST['assi_no'];
        $question = $_POST['question'];
        include 'db.php';
        $insert = "INSERT INTO `assignment` (`section`, `semester`, `subject`, `assi_no`, `subject_code`, `faculty_erpid`, `faculty_name`, `questions`, `last_date`) VALUES ('$section', '$sem', '$subject', '$assi_no', '$subject_code', '$erpid', '$fname $lname', '$question', '$last_date ')";
        $run = mysqli_query($connection, $insert);
        if ($run) {
?>
            <script>
                alert("Assignment assigned to section <?php echo $section; ?> students.");
                window.close();
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("oops! server failed while assigning assignment.");
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