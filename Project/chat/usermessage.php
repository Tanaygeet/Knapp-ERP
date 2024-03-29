<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $user = $_GET["search"];
        include "../DB/db.php";
        $userInfo = "SELECT * FROM knapp_chat_acc where erpid = '$user';";
        $userRun = mysqli_query($connection, $userInfo);
        if (mysqli_num_rows($userRun) > 0) {
            while ($row = mysqli_fetch_assoc($userRun)) {
                $ufn = $row["first_name"];
                $uln = $row["last_name"];
            }
        }
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
            <link rel="icon" href="../images/logo/ico.png">
            <link rel="stylesheet" href="../css/message.css">
            <link rel="stylesheet" href="../css/messagebox.css">
            <title>Chat :-: <?php echo "$ufn $uln"; ?></title>
        </head>

        <body>
            <div class="main chatMain">
                <header class="header"><button id="back"><svg width="25" height="15" viewBox="0 0 40 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.9473 15.0786L20.9386 13.0786L20.9473 13.0786L20.9473 15.0786ZM1.48649 16.5776C0.702045 15.7999 0.696531 14.5336 1.47417 13.7492L14.1465 0.965958C14.9242 0.181516 16.1905 0.176001 16.9749 0.953642C17.7594 1.73128 17.7649 2.9976 16.9873 3.78204L5.72293 15.1449L17.0858 26.4092C17.8702 27.1869 17.8758 28.4532 17.0981 29.2376C16.3205 30.0221 15.0542 30.0276 14.2697 29.25L1.48649 16.5776ZM30.5 15.0786L30.5185 17.0785L30.5092 17.0786L30.5 17.0786L30.5 15.0786ZM20.956 17.0786L2.90324 17.1572L2.88582 13.1572L20.9386 13.0786L20.956 17.0786ZM39.0185 16.9999L30.5185 17.0785L30.4815 13.0787L38.9815 13.0001L39.0185 16.9999ZM30.5 17.0786L20.9473 17.0786L20.9473 13.0786L30.5 13.0786L30.5 17.0786Z" fill="#E1F0F9" />
                        </svg>
                    </button><span id="user" class="user"><?php echo "$ufn $uln"; ?></span>
                </header>
                <div class="chats">
                    <span class="you">
                        ...
                        <br>
                        <p class="urTime time">~~ ~~ ~~</p>
                    </span>
                    <span class="sender">
                        ...
                        <br>
                        <p class="sTime time">~~ ~~ ~~</p>
                    </span>
                    <script>
                        $(function() {
                            setInterval(() => {
                                $(".chats").load("fetchusermsg.php?<?php echo "receiver=$user&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>");
                            }, 1000);
                        });
                    </script>
                </div>
                <div class="msg">
                    <form action="../chatdb/insert.php?<?php echo "receiver=$user&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&ufn=$ufn&uln=$uln"; ?>" method="POST">
                        <input name="textMsg" id="textMsg" class="textMsg" placeholder="Message..." autofocus required>
                        <button type="submit"><svg width="30" height="30" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.02009 7.23822L18.824 23.9865L10.2284 42.0958C10.1203 42.3244 10.0872 42.5814 10.1339 42.8301C10.1805 43.0787 10.3046 43.3062 10.4883 43.4801C10.672 43.654 10.9059 43.7654 11.1567 43.7984C11.4075 43.8314 11.6623 43.7843 11.8847 43.6638L47.2344 24.4192C47.4301 24.3127 47.5922 24.1537 47.7027 23.9602C47.8131 23.7667 47.8675 23.5463 47.8598 23.3236C47.852 23.1009 47.7824 22.8848 47.6588 22.6995C47.5351 22.5141 47.3623 22.3668 47.1597 22.2741L10.5542 5.54117C10.3224 5.43541 10.0628 5.40622 9.81324 5.45784C9.56367 5.50945 9.337 5.63919 9.16609 5.82825C8.99518 6.01731 8.8889 6.25587 8.86265 6.50937C8.8364 6.76288 8.89155 7.01816 9.02009 7.23822V7.23822ZM13.0082 9.30184L43.9794 23.4587L13.9772 39.7929L21.2644 24.4413C21.3477 24.2649 21.3867 24.0709 21.3781 23.876C21.3696 23.6811 21.3136 23.4913 21.2151 23.3229L13.0082 9.30184Z" fill="white" />
                                <path d="M45.1456 22.4523L45.1456 24.8519L18.9872 24.8519L18.9872 22.4523H45.1456Z" fill="white" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </body>
        <script>
            $(function() {
                $("#back").click(function() {
                    <?php
                    if ($role == "student") {
                        echo "window.location = 'smessage.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role'";
                    } else {
                        echo "window.location = 'message.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role'";
                    }
?>
                });
            });
        </script>

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