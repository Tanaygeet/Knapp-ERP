<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $notice_serial = $_GET["serial"];
        include 'db.php';
        $query = "DELETE FROM `notices` WHERE `notices`.`serial` = $notice_serial";
        $run = mysqli_query($connection, $query);
        if ($run) {
?>
            <script>
                alert("Notice deleted.");
                window.location = '../notice/main.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>';
            </script>
        <?php
        } else {
?>
            <script>
                alert("Facing some issues please try again later...");
                window.location = '../notice/main.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>';
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