<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        include "../DB/db.php";
        $fetchNotices = "SELECT * FROM notices order by serial desc;";
        $runNotices = mysqli_query($connection, $fetchNotices);
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
            <link rel="icon" href="../images/logo/ico.png">
            <link rel="stylesheet" href="../css/notice-main.css">
            <title>Notices</title>
        </head>

        <body>
            <div class="main">
                <h2>Notice</h2>
                <div class="notices" style="max-height: 85vh">
                    <?php
                    if (mysqli_num_rows($runNotices) > 0) {
                        while ($row = mysqli_fetch_assoc($runNotices)) {
                            echo "<span class='notice'>
                        <h3 class='from'>Notice form : $row[notice_from]</h3>
                        $row[notice]
                    </span>";
                        }
                    } else {
                        echo "<span class='notice'>
                        <h3 class='from'>~~ ~~ ~~</h3>
                        No new notices...<br>Check later.
                    </span>";
                    }
                    ?>
                </div>
            </div>
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