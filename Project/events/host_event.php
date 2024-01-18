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
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="Tanaygeet Shrivastava" content="Author, Developer">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap-grid.css" integrity="sha512-pM/iUb80UpXwRGB2/UbpFDyPtO31IE5aokTh7sYjpSY06pH3j0hXCNXGkyRn8gVod9Cbo4GdP/n98rfu6JC75Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="../css/event.css">
            <link rel="icon" href="../images/logo/ico.png">
            <link rel="stylesheet" href="../css/eventReg.css">
            <title>Event Form</title>
        </head>

        <body>
            <div class="regMain">
                <h1 class="h2">Host event</h1>
                <div class="registrationForm">
                    <div class="form">
                        <form action='../DB/hostevent.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' autocomplete="on" method="POST">
                            <ul>
                                <li>Event Name*
                                    <input type="text" name="eName" autofocus placeholder="College Fest" required>
                                </li>
                                <li>
                                    Event Date*
                                    <input type="date" name="eDate" required>
                                </li>
                                <li>
                                    Event Time *
                                    <input type="time" name="eTime" required>
                                </li>
                                <li>
                                    Event Venu*
                                    <input type="text" name="eVenue" placeholder="College Auditorium" required>
                                </li>
                                <li>
                                    Register Till*
                                    <input type="date" name="eEnd" required>
                                </li>
                                <li>
                                    Any Special Quote
                                    <input type="text" placeholder="Any Special Message" name="sQuote">
                                </li>
                            </ul>
                            <button type="submit">Host</button>
                        </form>
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