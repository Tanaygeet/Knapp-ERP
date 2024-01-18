<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $grpname = $_GET["grp"];
        $grpOwner = $_GET["grpOwner"];
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
            <title>Group Chat::<?php echo $grpname; ?></title>
        </head>

        <body>
            <div class="main chatMain">
                <header class="header">
                    <button id="back"><svg width="25" height="15" viewBox="0 0 40 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.9473 15.0786L20.9386 13.0786L20.9473 13.0786L20.9473 15.0786ZM1.48649 16.5776C0.702045 15.7999 0.696531 14.5336 1.47417 13.7492L14.1465 0.965958C14.9242 0.181516 16.1905 0.176001 16.9749 0.953642C17.7594 1.73128 17.7649 2.9976 16.9873 3.78204L5.72293 15.1449L17.0858 26.4092C17.8702 27.1869 17.8758 28.4532 17.0981 29.2376C16.3205 30.0221 15.0542 30.0276 14.2697 29.25L1.48649 16.5776ZM30.5 15.0786L30.5185 17.0785L30.5092 17.0786L30.5 17.0786L30.5 15.0786ZM20.956 17.0786L2.90324 17.1572L2.88582 13.1572L20.9386 13.0786L20.956 17.0786ZM39.0185 16.9999L30.5185 17.0785L30.4815 13.0787L38.9815 13.0001L39.0185 16.9999ZM30.5 17.0786L20.9473 17.0786L20.9473 13.0786L30.5 13.0786L30.5 17.0786Z" fill="#E1F0F9" />
                        </svg>
                    </button> <span id="grp" class="grp"><?php echo $grpname; ?></span>
                    <button id="info"><svg width="30" height="30" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.3713 32.1295C25.3603 32.1332 24.3464 32.4705 23.4664 32.4705C22.9806 32.4705 22.7844 32.3697 22.7221 32.3257C22.4141 32.1112 21.8421 31.7097 22.8211 29.759L24.6544 26.1033C25.7416 23.9327 25.9029 21.8335 25.1036 20.1908C24.4509 18.847 23.1988 17.9248 21.5836 17.5948C21.0056 17.4765 20.4172 17.417 19.8273 17.417C16.4374 17.417 14.1549 19.397 14.0596 19.4813C13.9004 19.6216 13.7949 19.8128 13.7609 20.0222C13.7269 20.2316 13.7666 20.4463 13.8732 20.6297C13.9799 20.8132 14.1468 20.9539 14.3456 21.028C14.5444 21.1021 14.7628 21.1049 14.9634 21.036C14.9726 21.0323 15.9883 20.6932 16.8683 20.6932C17.3504 20.6932 17.5448 20.794 17.6053 20.8362C17.9151 21.0525 18.4889 21.4595 17.5118 23.4065L15.6784 27.064C14.5894 29.2365 14.4299 31.3357 15.2293 32.9765C15.8819 34.3203 17.1323 35.2425 18.7511 35.5725C19.3268 35.688 19.9171 35.7503 20.5001 35.7503C23.8918 35.7503 26.1761 33.7703 26.2714 33.686C26.4307 33.546 26.5366 33.3552 26.571 33.1459C26.6053 32.9367 26.5661 32.722 26.4599 32.5384C26.3538 32.3549 26.1873 32.2138 25.9888 32.1392C25.7903 32.0646 25.572 32.0612 25.3713 32.1295V32.1295Z" fill="white" />
                            <path d="M23.8333 15.5856C26.3646 15.5856 28.4167 13.5336 28.4167 11.0023C28.4167 8.47097 26.3646 6.41895 23.8333 6.41895C21.302 6.41895 19.25 8.47097 19.25 11.0023C19.25 13.5336 21.302 15.5856 23.8333 15.5856Z" fill="white" />
                        </svg>
                    </button>
                </header>
                <div class="chats">
                    <span class="you">
                        <p><small style='font-size: 1.5vh;'>You</small></p>
                        ...
                        <br>
                        <p class="urTime time"><small style='font-size: 1.5vh;'>~~ ~~ ~~</small></p>
                    </span>
                    <span class="sender">
                        <p class="senderName"><small style='font-size: 1.5vh;'>User</small></p>
                        ...
                        <br>
                        <p class="sTime time"><small style='font-size: 1.5vh;'>~~ ~~ ~~</small></p>
                    </span>
                    <script>
                        $(function() {
                            $(function() {
                                setInterval(() => {
                                    $(".chats").load("fetchgrpmsg.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grpname=$grpname&grpOwner=$grpOwner"; ?>");
                                }, 1000);
                            });
                        });
                    </script>
                </div>
                <div class="msg">
                    <form action='../chatdb/grpmsginsert.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grpname=$grpname&grpOwner=$grpOwner"; ?>' method="POST">
                        <input name="textMsg" id="textMsg" class="textMsg" autofocus placeholder="Message..." required>
                        <button type="submit"><svg width="30" height="30" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.02009 7.23822L18.824 23.9865L10.2284 42.0958C10.1203 42.3244 10.0872 42.5814 10.1339 42.8301C10.1805 43.0787 10.3046 43.3062 10.4883 43.4801C10.672 43.654 10.9059 43.7654 11.1567 43.7984C11.4075 43.8314 11.6623 43.7843 11.8847 43.6638L47.2344 24.4192C47.4301 24.3127 47.5922 24.1537 47.7027 23.9602C47.8131 23.7667 47.8675 23.5463 47.8598 23.3236C47.852 23.1009 47.7824 22.8848 47.6588 22.6995C47.5351 22.5141 47.3623 22.3668 47.1597 22.2741L10.5542 5.54117C10.3224 5.43541 10.0628 5.40622 9.81324 5.45784C9.56367 5.50945 9.337 5.63919 9.16609 5.82825C8.99518 6.01731 8.8889 6.25587 8.86265 6.50937C8.8364 6.76288 8.89155 7.01816 9.02009 7.23822V7.23822ZM13.0082 9.30184L43.9794 23.4587L13.9772 39.7929L21.2644 24.4413C21.3477 24.2649 21.3867 24.0709 21.3781 23.876C21.3696 23.6811 21.3136 23.4913 21.2151 23.3229L13.0082 9.30184Z" fill="white" />
                                <path d="M45.1456 22.4523L45.1456 24.8519L18.9872 24.8519L18.9872 22.4523H45.1456Z" fill="white" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="grpInfo" id="grpInfo">
                    <h2>ADD USERS</h2>
                    <ul>
                        <?php
                        include "../DB/db.php";
                        $fetchUsers = "SELECT distinct group_name, member_erpid, group_owner_erpid, blocked FROM knapp_chat_grp where group_name = '$grpname' and group_owner_erpid = '$grpOwner';";
                        $runUsers = mysqli_query($connection, $fetchUsers);
                        $show = 0;
                        if (mysqli_num_rows($runUsers) > 0) {
                            while ($row = mysqli_fetch_assoc($runUsers)) {
                                if ($row['group_owner_erpid'] == $erpid) {
                                    $show = 1;
                                    if ($row['member_erpid'] == $row['group_owner_erpid']) {
                                        echo "<li><span class='uName'>$row[member_erpid]</span><a>OWNER</a></li>";
                                    } else {
                                        if ($row['blocked'] == 'y') {
                                            echo "<li><span class='uName'>$row[member_erpid]</span><a class='unblock' href='../chatdb/operation.php?op=unblock&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grp=$row[group_name]&grpOwner=$row[group_owner_erpid]&member=$row[member_erpid]'>UNBLOCK</a></li>";
                                        } else {
                                            echo "<li><span class='uName'>$row[member_erpid]</span><a class='block' href='../chatdb/operation.php?op=block&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grp=$row[group_name]&grpOwner=$row[group_owner_erpid]&member=$row[member_erpid]'>BLOCK</a></li>";
                                        }
                                    }
                                } else {
                                    if ($row['member_erpid'] == $row['group_owner_erpid']) {
                                        echo "<li><span class='uName'>$row[member_erpid]</span><a>OWNER</a></li>";
                                    } else {
                                        if ($row['blocked'] != 'y') {
                                            echo "<li><span class='uName'>$row[member_erpid]</span><a>-</a></li>";
                                        }
                                    }
                                }
                            }
                        } else {
                            echo "<li><span class='uName'>No Users</span><a>-</a></li>";
                        }
?>
                    </ul>
                    <?php
                    if ($show) {
                        echo "<a class='new' href='adduser.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grpname=$grpname'>ADD NEW MEMBER</a>";
                    }
?>
                </div>
            </div>
        </body>
        <script>
            $(function() {
                $("#info").click(function() {
                    $(".chats, .msg, #grpInfo").toggle("");
                });
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
                document.addEventListener('keydown', function(e) {
                    if (e.key == "Escape") {
                        $(".chats, .msg, #grpInfo").toggle("");
                    }
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