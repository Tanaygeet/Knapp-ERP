<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $grp = $_GET["grpname"];
        $grpOwner = $_GET["grpOwner"];
        include '../DB/db.php';
        $msgs = "SELECT * FROM knapp_chat_grp where group_name = '$grp' and group_owner_erpid = '$grpOwner' and message != '';";
        $msgrun = mysqli_query($connection, $msgs);
        if (mysqli_num_rows($msgrun) > 0) {
            while ($row = mysqli_fetch_assoc($msgrun)) {
                if ($row['sender'] == $erpid) {
                    echo "<span class='you'>
                    <p><small style='font-size: 1.5vh;text-decoration: underline;'>You</small></p>
                    $row[message]
                    <br>
                    <p class='urTime time'><small style='font-size: 1.2vh;text-decoration: overline;' title='$row[msg_time]'>$row[msg_time]</small></p>
                </span></p>
                </span>";
                } else {
                    echo "<span class='sender'>
                    <p class='senderName'><small style='font-size: 1.5vh;text-decoration: underline;'>$row[sender]</small></p>
                    $row[message]
                    <br>
                    <p class='sTime time'><small style='font-size: 1.2vh;text-decoration: overline;' title='$row[msg_time]'>$row[msg_time]</small></p>
                </span>";
                }
            }
        } else {
?>
            <div class="gmsg"><strong>
                    👋
                    <br>
                </strong>
                Send a Wave
                <br>
                <small>Start Your Conversations...</small>
            </div>
            <script>
                $(function() {
                    $(".gmsg").click(function() {
                        $("#textMsg").val("👋 Hii ...");
                        $("#textMsg").focus();
                    });
                });
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