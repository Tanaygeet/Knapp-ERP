<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $receiver = $_GET["receiver"];
        include '../DB/db.php';
        $msgs = "SELECT * FROM knapp_chat where sender_erpid = '$erpid' and receiver_erpid = '$receiver' OR receiver_erpid = '$erpid' and sender_erpid = '$receiver' order by serial desc;";
        $msgrun = mysqli_query($connection, $msgs);
        if (mysqli_num_rows($msgrun) > 0) {
            while ($row = mysqli_fetch_assoc($msgrun)) {
                if ($row['send_by'] == $erpid) {
                    echo "<span class='you'>
                    $row[message]
                    <br>
                    <p class='urTime time'><small style='font-size: 1.2vh;text-decoration: overline;' title='$row[msg_time]'>$row[msg_time]</small></p>
                </span>";
                } else {
                    echo "<span class='sender'>
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