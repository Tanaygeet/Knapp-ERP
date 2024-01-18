<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $mail = "$erpid@knapp.in";
        include "../DB/db.php";
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
            <title>Your account has been created.</title>
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
                    <h3 class="subject" id="subject">Subject: Your account has been created successfully.</h3>
                    <strong class="id">From: <i id="sender">no-reply@knapp.in | KNAPP</i></strong>
                    <span class="id">To: <i id="receiver"><?php echo $mail; ?></i></span>
                    <span class="id">Date: <i id="receiver"><?php date_default_timezone_set("Asia/Kolkata");
                                                            echo date("d/M/Y, g:m A"); ?></i></span>
                    <div class="mailContent">This is a default mail sent to you by team KNAPP.This mail is to verify that your mail has been configured successfully. And this mail will automatically be deleted when you will get some mails in your inbox.<br>
                        <br>Thanks & Regards!<br>Team KNAPP
                    </div>
                </div>
                <script>
                    $(function() {
                        $("#reload").click(function() {
                            window.location.reload();
                        });
                        $("#back").click(function() {
                            window.location = "<?php echo "mail.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>";
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