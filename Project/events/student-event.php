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
        $fetchEvents = "SELECT * FROM events order by serial desc;";
        $runEvents = mysqli_query($connection, $fetchEvents);
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
            <link rel="stylesheet" href="../css/event.css">
            <title>Events</title>
        </head>

        <body>
            <div class="main">
                <h2>Available Events</h2>
                <div class="eventBox">
                    <?php
                    if (mysqli_num_rows($runEvents) > 0) {
                        while ($row = mysqli_fetch_assoc($runEvents)) {
                            $endDate = $row['last_date'];
                            date_default_timezone_set("Asia/Kolkata");
                            $today = date("Y-m-d");
                            if ($endDate >= $today) {
                                echo "<a href='studentReg.php?eventName=$row[event_name]&eventNo=$row[serial]&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role' target='_blank'>
                        <div><img src='https://source.unsplash.com/random/350x200/?festival,lori,galaxy,games,3d,seasons,season' alt='Event Image'></div>
                        <strong>$row[event_name]</strong>
                    </a>";
                            } else {
                                echo "<a>
    <div><img src='https://source.unsplash.com/random/350x200/?cancel,stop,delete,decline,no,never' alt='No-Events'></div>
    <strong>$row[event_name] (Expired)</strong>
</a>";
                            }
                        }
                    } else {
                        echo "<a>
    <div><img src='https://source.unsplash.com/random/350x200/?cancel,stop,delete,decline,no,never' alt='No-Events'></div>
    <strong>No Events Are Available</strong>
</a>";
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