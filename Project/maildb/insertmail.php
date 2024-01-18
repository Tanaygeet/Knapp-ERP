<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $prev = $_GET["prev"];
        $sender = "$erpid@knapp.in";
        $receiver = "$_POST[receiver]";
        include "../DB/db.php";
        $senderCheck = "SELECT * FROM knapp_mail_acc where mail = '$sender';";
        $senderRun = mysqli_query($connection, $senderCheck);
        if (mysqli_num_rows($senderRun) > 0) {
            while ($sRow = mysqli_fetch_assoc($senderRun)) {
                $senderName = $sRow["name"];
            }
            $receiverCheck = "SELECT * FROM knapp_mail_acc where mail = '$receiver';";
            $receiverRun = mysqli_query($connection, $receiverCheck);
            if (mysqli_num_rows($receiverRun) > 0) {
                while ($rRow = mysqli_fetch_assoc($receiverRun)) {
                    $receiverName = $rRow["name"];
                }
                $subject = $_POST['subject'];
                $mailText = $_POST['mailtext'];
                date_default_timezone_set("Asia/Kolkata");
                $mail_time = date("d/M/Y, g:m A");
                $sendMail = "INSERT INTO `knapp_mail` (`sender`, `receiver`, `subject`, `mail`, `mail_time`, `sender_mail`, `receiver_mail`, `send_by`) VALUES ('$senderName', '$receiverName', '$subject', '$mailText', '$mail_time', '$sender', '$receiver', '$sender');";
                $send = mysqli_query($connection, $sendMail);
                if ($send) {
                    header("location: ../mail/$prev?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role");
                } else {
?>
                    <script>
                        alert("Our server is facing some issue please try again later.");
                        location = window.history.back();
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("Wrong sender e-mail.\nPlease check mail Id.");
                    location = window.history.back();
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("oops! something bad happened with your account.\nPlease contact management...");
                location = window.history.back();
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