<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $grp = $_GET["grp"];
        $grpOwner = $_GET["grpOwner"];
        $member = $_GET["member"];
        $op = $_GET["op"];
        include "../DB/db.php";
        if ($op == "block") {
            $query = "UPDATE `knapp_chat_grp` SET `blocked` = 'y' WHERE `member_erpid` = '$member' AND `group_name` = '$grp' and `group_owner_erpid` = '$grpOwner';";
            $run = mysqli_query($connection, $query);
        } else {
            $query = "UPDATE `knapp_chat_grp` SET `blocked` = '' WHERE `member_erpid` = '$member' AND `group_name` = '$grp' and `group_owner_erpid` = '$grpOwner';";
            $run = mysqli_query($connection, $query);
        }
        if ($run) {
?>
            <script>
                alert('User <?php echo "$member $op"; ?>ed successfully.');
                window.location = '../chat/grpmessage.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grp=$grp&grpOwner=$grpOwner"; ?>';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Server error.\nPlease try again later.');
                window.location = '../chat/grpmessage.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grp=$grp&grpOwner=$grpOwner"; ?>';
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