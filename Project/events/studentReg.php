<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $eName = $_GET['eventName'];
        $eNo = $_GET['eventNo'];
        include "../DB/db.php";
        $check = "SELECT * FROM event_registration where participant_id='$erpid' and event_name='$eName';";
        $runCheck = mysqli_query($connection, $check);
        if (mysqli_num_rows($runCheck) > 0) {
?>
            <script>
                alert("Your are already registered in the event.");
                location = '../events/student-event.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>';
            </script>
            <?php
        } else {
            $eventGet = "SELECT * FROM events where serial='$eNo';";
            $eventRun = mysqli_query($connection, $eventGet);
            if (mysqli_num_rows($eventRun) > 0) {
                while ($rowGet = mysqli_fetch_assoc($eventRun)) {
                    $eTime = "$rowGet[event_date], $rowGet[event_time]";
                    $eVenue = $rowGet["event_venue"];
                    $quote = $rowGet["quote"];
                    $eEnd = $rowGet["last_date"];
                }
            } else {
            ?>
                <script>
                    alert("Sorry, server is not responding.")
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
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap-grid.css" integrity="sha512-pM/iUb80UpXwRGB2/UbpFDyPtO31IE5aokTh7sYjpSY06pH3j0hXCNXGkyRn8gVod9Cbo4GdP/n98rfu6JC75Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <link rel="stylesheet" href="../css/event.css">
                <link rel="icon" href="../images/logo/ico.png">
                <link rel="stylesheet" href="../css/eventReg.css">
                <title><?php echo $eName; ?> Form</title>
            </head>

            <body class='stdReg'>
                <div class='regMain'>
                    <h1 class='top'><strong>! Register Here !</strong></h1>
                    <div class='registrationForm'>
                        <div class='form'>
                            <h1 class="h2"><?php echo $eName; ?></h1>
                            <h4 style='text-align: center;'><strong>Venue: <?php echo $eVenue; ?><br>
                                    Event Time: <?php echo $eTime; ?><br>
                                    <marquee direction="right"><?php echo $quote; ?></marquee>
                                </strong></h4>
                            <h2 style='color: #fb3232;'>Last Date to Apply: <?php echo $eEnd; ?></h2><br>
                            <form action='../DB/studentRegister.php?<?php echo "eventName=$eName&eventNo=$eNo&fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' method="POST">
                                <button type='submit'>! Register Me !</button>
                            </form>
                        </div>
                    </div>
            </body>

            </html>
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