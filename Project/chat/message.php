<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
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
            <title>My Chat</title>
        </head>

        <body>
            <div class="main">
                <h1>MY CHATS</h1>
                <h2>GROUPS</h2>
                <div class="container grp">
                    <ul>
                        <?php
                        include "../DB/db.php";
                        $grpQuery = "SELECT DISTINCT group_name, group_owner_erpid FROM knapp_chat_grp WHERE member_erpid='$erpid' and blocked!='y';";
                        $grpRun = mysqli_query($connection, $grpQuery);
                        if (mysqli_num_rows($grpRun) > 0) {
                            while ($row = mysqli_fetch_assoc($grpRun)) {
                                echo "<li>
                                <a href='grpmessage.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grp=$row[group_name]&grpOwner=$row[group_owner_erpid]'>$row[group_name]</a>
                            </li>";
                            }
                        } else {
                            echo "<li>
                            <a>No Groups Available</a>
                        </li>";
                        }
                        ?>
                    </ul>
                </div>
                <h2>PERSONAL CHAT</h2>
                <div class="container user">
                    <ul>
                        <?php
                        $userQuery = "SELECT DISTINCT receiver_erpid, receiver, sender_erpid, sender, send_by FROM knapp_chat WHERE sender_erpid='$erpid' OR receiver_erpid='$erpid' group by sender_erpid and receiver_erpid order by `knapp_chat`.`serial` desc;";
                        $userRun = mysqli_query($connection, $userQuery);
                        if (mysqli_num_rows($userRun) > 0) {
                            while ($row = mysqli_fetch_assoc($userRun)) {
                                if ($row['send_by'] == $erpid) {
                                    echo "<li>
<a href='../chat/usermessage.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&search=$row[receiver_erpid]'>$row[receiver]</a>
</li>";
                                } else {
                                    echo "<li>
<a href='../chat/usermessage.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&search=$row[send_by]'>$row[sender]</a>
</li>";
                                }
                            }
                        } else {
                            echo "<li>
                            <a>No Users</a>
                        </li>";
                        }
?>
                    </ul>
                </div>
                <span class="btn">
                    <a href="search.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>">Add & Search</a>
                </span>
            </div>
        </body>
        <script>
            $(function () {
                setInterval(() => {
                    window.location.reload();
                }, 10000);
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