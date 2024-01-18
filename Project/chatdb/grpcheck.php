<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $grpname = $_POST['grpname'];
        include "../DB/db.php";
        $checkQuery = "SELECT * FROM knapp_chat_grp WHERE group_name='$grpname' and group_owner_erpid='$erpid';";
        $checkRun = mysqli_query($connection, $checkQuery);
        if (mysqli_num_rows($checkRun) > 0) {
?>
            <script>
                alert("This group name is already in use by you.\nPlease choose any other group name.");
                window.location = "../chat/search.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>";
            </script>
            <?php
        } else {
            $createQuery = "INSERT INTO `knapp_chat_grp` (`member_erpid`, `group_name`, `group_owner_erpid`) VALUES ('$erpid', '$grpname', '$erpid');";
            $createRun = mysqli_query($connection, $createQuery);
            if ($createRun) {
                header("location: ../chat/adduser.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grpname=$grpname");
            } else {
?>
                <script>
                    alert("oops! some error occured. Please try again later.")
                </script>
        <?php
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