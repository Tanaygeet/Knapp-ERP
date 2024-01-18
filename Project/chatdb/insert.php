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
        $receiver = $_GET["receiver"];
        $msg = $_POST["textMsg"];
        date_default_timezone_set("Asia/Kolkata");
        $msgTime = date("g:ia d.M.y");
        $insert = "INSERT INTO `knapp_chat` (`sender`, `receiver`, `message`, `msg_time`, `sender_erpid`, `receiver_erpid`, `send_by`) VALUES ('$fname $lname', '$ufn $uln', '$msg', '$msgTime', '$erpid', '$receiver', '$erpid');";
        include "../DB/db.php";
        $run = mysqli_query($connection, $insert);
        if ($run) {
            header("location: ../chat/usermessage.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&search=$receiver");
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