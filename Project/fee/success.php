<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $key = $_GET["key"];
        $bill = $_GET["bill"];
        $pay = $_GET["pay"];
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="Tanaygeet Shrivastava" content="Author, Developer">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="../css/transaction.css">
            <link rel="stylesheet" href="../css/style.css">
            <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
            <link href="../images/logo/ico.png" rel="icon">
            <title>Fees Paid</title>
        </head>

        <body>
            <div class="content">
                <svg width="87" height="87" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M43.5 7.25L53.0211 14.1955L64.8078 14.1738L68.4273 25.3895L77.9756 32.2987L74.3125 43.5L77.9756 54.7013L68.4273 61.6105L64.8078 72.8263L53.0211 72.8045L43.5 79.75L33.9789 72.8045L22.1923 72.8263L18.5727 61.6105L9.02444 54.7013L12.6875 43.5L9.02444 32.2987L18.5727 25.3895L22.1923 14.1738L33.9789 14.1955L43.5 7.25Z" stroke="#0FA958" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M30.8125 43.5L39.875 52.5625L58 34.4375" stroke="#0FA958" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <h2>Your Order has been successfully placed</h2>
                <strong>Your Bill Number: <?php echo $bill; ?></strong>
                <a href="../dashboard/<?php echo "$role-menu.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" class="btn btn-lg btn-block btn-success my-3">Go-To Home</a>
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