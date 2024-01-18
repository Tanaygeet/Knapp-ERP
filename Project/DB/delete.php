<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $uerpid = $_GET["uerpid"];
        $location = $_GET["location"];
        include 'db.php';
        $query = "DELETE FROM `accounts` WHERE `erpid` = '$uerpid';";
        $run = mysqli_query($connection, $query);
        $query2 = "DELETE FROM `knapp_chat_acc` WHERE `erpid` = '$uerpid';";
        $run2 = mysqli_query($connection, $query2);
        $query3 = "DELETE FROM `knapp_mail_acc` WHERE `mail` = '$uerpid@knapp.in';";
        $run3 = mysqli_query($connection, $query3);
        $query4 = "DELETE FROM `knapp_chat_grp` WHERE `member_erpid` = '$uerpid';";
        $run4 = mysqli_query($connection, $query4);
        if ($run && $run2 && $run3 && $run4) {
?>
            <script>
                alert("User deleted successfully.");
                window.location = '../display/<?php echo "$location.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Facing some issues please try again later...");
                window.location = '../display/<?php echo "$location.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>';
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