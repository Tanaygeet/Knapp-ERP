<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $grpname = $_GET["grpname"];
        include "../DB/db.php";
        for ($i = 0; $i < 8; $i++) {
            $ui = $_POST["u$i"];
            if ($ui != null) {
                $checkQuery = "SELECT * FROM knapp_chat_acc WHERE erpid='$ui';";
                $checkRun = mysqli_query($connection, $checkQuery);
                if (mysqli_num_rows($checkRun) > 0) {
                    $checkGrp = "SELECT * FROM knapp_chat_grp WHERE erpid='$ui' AND group_name='$grpname' AND group_owner_erpid='$erpid';";
                    $grpRun = mysqli_query($connection, $checkGrp);
                    if ($grpRun > 0) {
                        continue;
                    } else {
                        $createQuery = "INSERT INTO `knapp_chat_grp` (`member_erpid`, `group_name`, `group_owner_erpid`) VALUES ('$ui', '$grpname', '$erpid');";
                        $createRun = mysqli_query($connection, $createQuery);
                    }
                } else {
                    continue;
                }
            } else {
                header("location: ../chat/grpmessage.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grp=$grpname&grpOwner=$erpid");
                break;
            }
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