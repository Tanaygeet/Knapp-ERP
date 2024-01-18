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
                <div class="notices">
                    <?php
                    if (mysqli_num_rows($runNotices) > 0) {
                        while ($row = mysqli_fetch_assoc($runNotices)) {
                            echo "<span class='notice'>
                        <h3 class='from'>Notice form : $row[notice_from]</h3>
                        $row[notice]";
                            if ($row['uploaded _by'] == $erpid) {
                                echo "<a href='../DB/deleteNotice.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&serial=$row[serial]' class='delete'><svg width='20' height='25' viewBox='0 0 28 33' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                <path d='M15.361 0H12.6388C11.4289 0 10.4351 0.397461 9.6573 1.19238C8.87952 1.9873 8.49063 2.96484 8.49063 4.125V5.47852H2.91656C2.18199 5.47852 1.54464 5.75781 1.00452 6.31641C0.464398 6.875 0.194336 7.51953 0.194336 8.25V9.60352C0.194336 10.377 0.464398 11.0322 1.00452 11.5693C1.54464 12.1064 2.18199 12.375 2.91656 12.375H3.04619L5.57397 30.6797C5.61718 31.3672 5.90884 31.9258 6.44897 32.3555C6.98909 32.7852 7.62643 33 8.361 33H19.6388C20.3734 33 21.0107 32.7852 21.5508 32.3555C22.0909 31.9258 22.3826 31.3672 22.4258 30.6797L24.9536 12.375H25.0832C25.8178 12.375 26.4551 12.1064 26.9953 11.5693C27.5354 11.0322 27.8055 10.377 27.8055 9.60352V8.25C27.8055 7.51953 27.5354 6.875 26.9953 6.31641C26.4551 5.75781 25.8178 5.47852 25.0832 5.47852H19.5092V4.125C19.5092 2.96484 19.1203 1.9873 18.3425 1.19238C17.5647 0.397461 16.5709 0 15.361 0ZM11.2129 4.125C11.2129 3.22266 11.6882 2.77148 12.6388 2.77148H15.361C16.3116 2.77148 16.7869 3.22266 16.7869 4.125V5.47852H11.2129V4.125ZM8.361 30.2285L8.16656 28.875H19.9629L19.8332 30.2285H8.361ZM20.2221 26.1035H7.77767L5.83323 12.375H22.0369L20.2221 26.1035ZM25.0832 8.25V9.60352H2.91656V8.25H25.0832Z' fill='#FF3F3F' />
                            </svg>
                        </a>";
                            }
                            echo "</span>";
                        }
                    } else {
                        echo "<span class='notice'>
                        <h3 class='from'>~~ ~~ ~~</h3>
                        No new notices...<br>Check later.
                    </span>";
                    }
                    ?>
                </div>
                <span class="btn">
                    <a href='newNotice.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' class="add">New Notice</a>
                </span>
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