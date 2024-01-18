<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $pid = $_GET['pid'];
        $ename = $_GET['ename'];
        include 'db.php';
        $query = "DELETE FROM `event_registration` WHERE `event_registration`.`serial` = '$pid';";
        $run = mysqli_query($connection, $query);
        if ($run) {
?>
            <script>
                alert("Registration deleted successfully.");
                window.location = '../events/showReg.php?<?php echo "eventName=$ename&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Facing some issues please try again later...");
                window.location = '../events/showReg.php?<?php echo "eventName=$ename&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>';
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