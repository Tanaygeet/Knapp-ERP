<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $mailserial = $_GET["mailno"];
        $sender = $_GET["sender"];
        include "../DB/db.php";
        $query1 = "SELECT * FROM knapp_mail where send_by='$sender' and serial='$mailserial';";
        $run1 = mysqli_query($connection, $query1);
        if (mysqli_num_rows($run1)) {
            while ($row1 = mysqli_fetch_assoc($run1)) {
                $receiverMail = $row1['receiver_mail'];
                $senderName = $row1['sender'];
                $receiverName = $row1['receiver'];
                $subject = $row1['subject'];
                $mailtext = $row1['mail'];
                $time = $row1['mail_time'];
            }
        } else {
?>
            <script>
                alert("Don't interrupt in others' e-mail.");
                location = window.history.back();
            </script>
        <?php
        }

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="Tanaygeet Shrivastava" content="Author, Developer">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="../css/mailmain.css">
            <link rel="stylesheet" href="../css/read.css">
            <link rel="icon" href="../images/logo/ico.png">
            <title><?php echo $subject; ?></title>
        </head>

        <body>
            <div class="main">
                <header class="header">
                    <ul>
                        <li><button type="submit" class="back" id="back">
                                <svg width="30" height="30" viewBox="0 0 41 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.875 12.584H18.5417C29.3575 12.584 38.125 21.3514 38.125 32.1673V34.1257" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.6667 2.79199L2.875 12.5837L12.6667 22.3753" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </header>
                <div class="msgBox">
                    <h3 class="subject" id="subject">Subject: <?php echo $subject; ?></h3>
                    <strong class="id">From: <i id="sender"><?php echo "$sender | $senderName"; ?></i></strong>
                    <span class="id">To: <i id="receiver"><?php echo "$receiverMail | $receiverName"; ?></i></span>
                    <span class="id">Date: <i id="receiver"><?php echo $time; ?></i></span>
                    <div class="mailContent"><?php echo $mailtext; ?></div>
                </div>
                <script>
                    $(function() {
                        $("#reload").click(function() {
                            window.location.reload();
                        });
                        $("#back").click(function() {
                            window.location = "sent.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
                        });
                    });
                </script>
        </body>

        </html>
    <?php
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