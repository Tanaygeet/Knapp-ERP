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
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="Tanaygeet Shrivastava" content="Author, Developer">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="../css/mailmain.css">
            <link rel="icon" href="../images/logo/ico.png">
            <title>Sent Mail - <?php echo $mail; ?></title>
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
                            </button></li>
                        <li>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" class="search">
                                <button id="reload" type="reset"><svg width="30" height="30" viewBox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.8131 25.3761C22.2349 25.0888 22.5252 24.6458 22.6203 24.1445C22.7153 23.6431 22.6073 23.1246 22.3201 22.7029C22.0328 22.2811 21.5898 21.9908 21.0885 21.8957C20.5871 21.8007 20.0686 21.9086 19.6468 22.1959C17.8707 23.4034 15.7415 23.9817 13.5985 23.8387C11.4556 23.6958 9.42207 22.8398 7.82201 21.4071C6.22196 19.9744 5.14738 18.0475 4.76947 15.9332C4.39157 13.819 4.73207 11.6391 5.73673 9.74088C6.7414 7.84261 8.35243 6.33517 10.3132 5.45869C12.2739 4.58222 14.4716 4.38713 16.5561 4.90451C18.6406 5.42189 20.492 6.62197 21.8153 8.31358C23.1386 10.0052 23.8578 12.091 23.8582 14.2387C23.8582 14.749 24.0609 15.2383 24.4217 15.5991C24.7825 15.9599 25.2719 16.1626 25.7821 16.1626C26.2924 16.1626 26.7817 15.9599 27.1425 15.5991C27.5033 15.2383 27.706 14.749 27.706 14.2387C27.7055 11.2317 26.6987 8.31137 24.8459 5.94297C22.9931 3.57457 20.401 1.89438 17.4825 1.1701C14.5641 0.445831 11.4871 0.719143 8.742 1.94649C5.99688 3.17384 3.74148 5.28462 2.33517 7.94251C0.928864 10.6004 0.452546 13.6525 0.982111 16.6125C1.51168 19.5725 3.01665 22.2702 5.25726 24.2756C7.49787 26.281 10.3452 27.4789 13.3456 27.6783C16.346 27.8778 19.3268 27.0673 21.8131 25.3761Z" fill="black" />
                                        <path d="M21.0475 9.41726C20.8346 9.28109 20.597 9.18817 20.3483 9.14381C20.0995 9.09946 19.8444 9.10454 19.5976 9.15876C19.3508 9.21297 19.1171 9.31528 18.9098 9.45982C18.7026 9.60436 18.5258 9.78831 18.3896 10.0012C18.2535 10.214 18.1605 10.4516 18.1162 10.7004C18.0718 10.9491 18.0769 11.2042 18.1311 11.451C18.1853 11.6978 18.2876 11.9315 18.4322 12.1388C18.5767 12.3461 18.7607 12.5228 18.9735 12.659L25.6725 16.9435C26.1022 17.2095 26.6194 17.2956 27.1122 17.1834C27.605 17.0712 28.0338 16.7695 28.306 16.3437C28.5782 15.9178 28.6718 15.402 28.5668 14.9076C28.4617 14.4133 28.1664 13.9801 27.7445 13.7018L21.0475 9.41726Z" fill="black" />
                                        <path d="M31.3672 9.60266C31.5636 9.13872 31.5701 8.61625 31.3855 8.14752C31.2008 7.67879 30.8397 7.30119 30.3796 7.09585C29.9196 6.89052 29.3973 6.87383 28.9251 7.04938C28.4529 7.22493 28.0684 7.5787 27.8542 8.03469L24.9529 14.5374C24.8442 14.7689 24.7827 15.0198 24.7721 15.2754C24.7614 15.5309 24.8018 15.786 24.891 16.0258C24.9801 16.2655 25.1161 16.4851 25.2911 16.6717C25.4661 16.8582 25.6766 17.008 25.9101 17.1122C26.1437 17.2165 26.3957 17.2731 26.6515 17.2788C26.9072 17.2845 27.1615 17.2392 27.3994 17.1454C27.6374 17.0517 27.8543 16.9114 28.0374 16.7328C28.2206 16.5542 28.3662 16.3409 28.466 16.1054L31.3672 9.60266Z" fill="black" />
                                    </svg></button>
                                <input type="search" name="word" id="search" placeholder="Search mail" required>
                                <button type="submit" name="mail_search"><svg width="30" height="30" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.4707 8.14944C25.1851 9.86593 26.2581 12.1191 26.5103 14.532C26.7624 16.9448 26.1784 19.3711 24.8559 21.405C25.0868 21.5974 25.2791 21.809 25.5485 22.0014C25.9333 22.3092 26.4527 22.694 27.1068 23.1365C27.7609 23.5982 28.1842 23.8868 28.3766 24.0407C29.1846 24.6371 29.781 25.1373 30.185 25.5413C30.8007 26.157 31.3394 26.7919 31.8011 27.4652C32.2821 28.1386 32.6476 28.7927 32.9362 29.4661C33.2055 30.1394 33.3402 30.7743 33.2825 31.39C33.244 32.0056 33.0132 32.525 32.5899 32.9483C32.1666 33.3716 31.6472 33.6024 31.0316 33.6409C30.4351 33.6794 29.781 33.5639 29.1269 33.2754C28.4535 33.006 27.7802 32.6212 27.1261 32.1403C26.4527 31.6785 25.8178 31.1398 25.2022 30.5242C24.7982 30.1202 24.298 29.5238 23.7208 28.735C23.5284 28.4849 23.2398 28.0616 22.8166 27.4652C22.3933 26.8496 22.047 26.3686 21.7392 25.9646C21.4314 25.5798 21.1813 25.2912 20.8927 25.0027C18.8958 26.0483 16.6173 26.4293 14.3888 26.0901C12.1604 25.751 10.0984 24.7095 8.50287 23.1173C4.38576 18.9809 4.38576 12.2665 8.50287 8.14944C9.48525 7.16588 10.6519 6.38561 11.936 5.85325C13.2202 5.32089 14.5967 5.04688 15.9868 5.04688C17.3769 5.04688 18.7534 5.32089 20.0375 5.85325C21.3217 6.38561 22.4883 7.16588 23.4707 8.14944ZM20.758 20.3853C22.0149 19.1193 22.7202 17.4077 22.7202 15.6237C22.7202 13.8398 22.0149 12.1282 20.758 10.8621C20.1334 10.2356 19.3912 9.73855 18.5742 9.39939C17.7571 9.06023 16.8811 8.88565 15.9964 8.88565C15.1117 8.88565 14.2357 9.06023 13.4186 9.39939C12.6016 9.73855 11.8594 10.2356 11.2348 10.8621C10.6083 11.4867 10.1112 12.2289 9.77207 13.046C9.43291 13.8631 9.25833 14.739 9.25833 15.6237C9.25833 16.5084 9.43291 17.3844 9.77207 18.2015C10.1112 19.0186 10.6083 19.7607 11.2348 20.3853C11.8594 21.0118 12.6016 21.5089 13.4186 21.8481C14.2357 22.1872 15.1117 22.3618 15.9964 22.3618C16.8811 22.3618 17.7571 22.1872 18.5742 21.8481C19.3912 21.5089 20.1334 21.0118 20.758 20.3853Z" fill="black" />
                                    </svg></button>
                            </form>
                        </li>
                    </ul>
                </header>
                <div class="container">
                    <h1>KNAPP - OUTBOX</h1>
                    <div class="mails">
                        <ul class="mail">
                            <?php
                            include "../DB/db.php";
                            if (isset($_POST['mail_search'])) {
                                $words = $_POST['word'];
                                $fetch_mail = "SELECT * FROM knapp_mail where sender_mail = '$mail' and send_by ='$mail' and receiver like '%$words%' or sender_mail = '$mail' and send_by ='$mail' and subject like '%$words%' or sender_mail = '$mail' and send_by ='$mail' and mail like '%$words%' or sender_mail = '$mail' and send_by ='$mail' and receiver_mail like '%$words%' order by serial desc;";
                            } else {
                                $fetch_mail = "SELECT * FROM knapp_mail where sender_mail = '$mail' and send_by ='$mail' order by serial desc;";
                            }
                            $run_fetch = mysqli_query($connection, $fetch_mail);
                            if (mysqli_num_rows($run_fetch) > 0) {
                                while ($row = mysqli_fetch_assoc($run_fetch)) {
                                    echo "<li class='label'><a href='readSend.php?mailno=$row[serial]&sender=$row[send_by]&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role'>
    <ul>
        <li>$row[receiver_mail]</li>
        <li class='sub'>$row[subject]</li>
    </ul>
</a></li>";
                                }
                            } else {
                                echo "<li class='label'><ul><li>No Data</li><li class='sub'>No Data found related to your search.</li></ul></li>";
                            }

                            ?>
                        </ul>
                    </div>
                    <footer class="footer">
                        <a href='mail.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' class="bottombtn">Inbox</a>
                        <button id="compose" class="bottombtn">Compose</button>
                    </footer>
                    <div class="composepop">
                        <h3>NEW MAIL</h3>
                        <button id="closepop"><i class="fas fa-window-close"></i>
                        </button>
                        <form action="../maildb/insertmail.php?<?php echo "prev=sent.php&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" autocomplete="on" method="POST">
                            <input type="text" name="receiver" autofocus id="receiver" placeholder="To" required>
                            <input type="text" name="subject" id="subject" placeholder="Subject" required>
                            <span class="mainmsg">
                                <textarea name="mailtext" id="mailtext"></textarea>
                                <button type="submit"><svg width="18" height="25" viewBox="0 0 21 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.6718 13.0229H3.49962L1.77002 3.46585C1.75895 3.41031 1.7522 3.35328 1.7499 3.29573C1.73066 2.41962 2.4253 1.81206 3.0272 2.21305L19.2471 13.0229L3.0272 23.8327C2.43229 24.23 1.7464 23.6395 1.7499 22.7792C1.75167 22.7023 1.7614 22.6262 1.77877 22.5532L3.06219 16.6683" stroke="#424248" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(function() {
                    $("#reload").click(function() {
                        window.location.reload();
                    });
                    $("#back").click(function() {
                        window.location = "mail.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
                    });
                    $("#compose").click(function() {
                        $(".composepop").toggle("");
                    });
                    $("#closepop").click(function() {
                        $(".composepop").hide("");
                    });
                    document.addEventListener('keydown', function(e) {
                        if (e.key == "Escape") {
                            $(".composepop").hide("");
                        }
                    });
                    setInterval(() => {
                        window.reload();
                    }, 5000);
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