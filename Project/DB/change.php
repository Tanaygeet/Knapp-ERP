<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        include "db.php";
        $uerpid = $_POST["uerpid"];
        $uemail = $_POST["uemail"];
        $pno = $_POST["pno"];
        $udegree = $_POST["udegree"];
        $ubranch = $_POST["ubranch"];
        $utype = $_POST["utype"];
        $ushift = $_POST["ushift"];
        $location = $_GET['location'];
        $urole = $_GET['role'];
        date_default_timezone_set("Asia/Kolkata");
        $udateTime = date("g:i:sa l, M d, Y");
        $query = "UPDATE `accounts` SET `mailid` = '$uemail', `mobile` = '$pno', `updation_time` = '$udateTime', `degree` = '$udegree', `branch` = '$ubranch', `staff_type` = '$utype', `staff_shift` = '$ushift' WHERE `accounts`.`erpid` = '$uerpid'";
        $run = mysqli_query($connection, $query);
        if ($run) {
?>
        <script>
            alert("User updated successfully.");
            location = '../display/<?php echo "$location.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$urole"; ?>';
        </script>
<?php
        } else {
            ?>
            <script>
                alert("Our server is facing some issues please try agai later.");
                location = '../display/<?php echo "$location.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$urole"; ?>';
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