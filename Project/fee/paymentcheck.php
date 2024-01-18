<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $pay = $_GET["pay"];
        $bill = $_POST["bill"];
        $otp = $_GET["otp"];
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="Tanaygeet Shrivastava" content="Author, Developer">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Payment Verification</title>
            <link href="../images/logo/ico.png" rel="icon">
            <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" rel="stylesheet">
            <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Exo:900|Fjalla+One|Lato|Merriweather|Ultra" rel="stylesheet">

            <link href="../css/style.css" rel="stylesheet">
            <link rel="stylesheet" href="../css/pcheck.css">
        </head>

        <body>
            <form class="form-signin" action="../DB/check.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&bill=$bill&pay=$pay&otp=$otp"; ?>" method="POST" style="text-align: center; margin-top:0;">
                <label for="otp">OTP</label>
                <input type="password" id="otp" name="otp" class="form-control my-4" placeholder="000000" maxlength="6" minlength="6" required autofocus>
                <button id="otpBtn" name="otpBtn" class="btn btn-lg btn-success btn-block" type="submit">Pay <?php echo "₹$pay"; ?></button>
            </form>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
    header("location: ../index.php");
}
?>