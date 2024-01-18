<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $ufn = $_GET["ufn"];
        $uln = $_GET["uln"];
        $grp = $_GET["grpname"];
        $grpOwner = $_GET["grpOwner"];
        $msg = $_POST["textMsg"];
        date_default_timezone_set("Asia/Kolkata");
        $msgTime = date("g:ia d.M.y");
        $insert = "INSERT INTO `knapp_chat_grp` (`member_erpid`, `group_name`, `group_owner_erpid`, `sender`, `message`, `msg_time`) VALUES ('$erpid', '$grp', '$grpOwner', '$erpid', '$msg', '$msgTime');";
        include "../DB/db.php";
        $run = mysqli_query($connection, $insert);
        if ($run) {
            header("location: ../chat/grpmessage.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grp=$grp&grpOwner=$grpOwner");
        } else {
?>
<script>
    alert("Sorry for the inconvenience,\nOur server is facing some issue. Please try again in some movements.");
    location = window.history.back(-2);
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