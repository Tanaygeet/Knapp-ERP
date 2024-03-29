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
            <link rel="stylesheet" href="../css/transaction.css">
            <link rel="stylesheet" href="../css/style.css">
            <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
            <link href="../images/logo/ico.png" rel="icon">
            <title>Transaction Failed</title>
        </head>

        <body>
            <div class="content">
                <svg width="109" height="109" viewBox="0 0 109 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M29.975 16.35C26.3614 16.35 22.8959 17.7855 20.3407 20.3407C17.7855 22.8959 16.35 26.3614 16.35 29.975V79.025C16.35 82.6386 17.7855 86.1042 20.3407 88.6593C22.8959 91.2145 26.3614 92.65 29.975 92.65H52.32C51.4288 90.9081 50.7113 89.0826 50.1781 87.2H29.975C27.8069 87.2 25.7275 86.3387 24.1944 84.8056C22.6613 83.2725 21.8 81.1931 21.8 79.025V38.15H87.2V50.1782C89.102 50.7177 90.9223 51.4317 92.65 52.32V29.975C92.65 26.3614 91.2145 22.8959 88.6593 20.3407C86.1041 17.7855 82.6386 16.35 79.025 16.35H29.975ZM21.8 29.975C21.8 27.8069 22.6613 25.7275 24.1944 24.1944C25.7275 22.6613 27.8069 21.8 29.975 21.8H79.025C81.1931 21.8 83.2725 22.6613 84.8056 24.1944C86.3387 25.7275 87.2 27.8069 87.2 29.975V32.7H21.8V29.975ZM103.55 79.025C103.55 85.5294 100.966 91.7675 96.3668 96.3668C91.7675 100.966 85.5294 103.55 79.025 103.55C72.5206 103.55 66.2825 100.966 61.6832 96.3668C57.0839 91.7675 54.5 85.5294 54.5 79.025C54.5 72.5206 57.0839 66.2825 61.6832 61.6832C66.2825 57.0839 72.5206 54.5 79.025 54.5C85.5294 54.5 91.7675 57.0839 96.3668 61.6832C100.966 66.2825 103.55 72.5206 103.55 79.025V79.025ZM79.025 65.4C78.3023 65.4 77.6092 65.6871 77.0981 66.1981C76.5871 66.7092 76.3 67.4023 76.3 68.125V79.025C76.3 79.7477 76.5871 80.4408 77.0981 80.9519C77.6092 81.4629 78.3023 81.75 79.025 81.75C79.7477 81.75 80.4408 81.4629 80.9519 80.9519C81.4629 80.4408 81.75 79.7477 81.75 79.025V68.125C81.75 67.4023 81.4629 66.7092 80.9519 66.1981C80.4408 65.6871 79.7477 65.4 79.025 65.4ZM79.025 93.3313C79.9284 93.3313 80.7948 92.9724 81.4336 92.3336C82.0724 91.6948 82.4312 90.8284 82.4312 89.925C82.4312 89.0216 82.0724 88.1552 81.4336 87.5164C80.7948 86.8776 79.9284 86.5188 79.025 86.5188C78.1216 86.5188 77.2552 86.8776 76.6164 87.5164C75.9776 88.1552 75.6187 89.0216 75.6187 89.925C75.6187 90.8284 75.9776 91.6948 76.6164 92.3336C77.2552 92.9724 78.1216 93.3313 79.025 93.3313V93.3313Z" fill="#F24E1E" />
                </svg>
                <h2>Something wents wrong</h2>
                <h3>Transition Fail</h3>
                <strong>Your Bill Number: <?php echo $bill; ?></strong>
                <a href="../fee/stfee.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&pay=$pay"; ?>" class=" btn btn-lg btn-block btn-danger my-3">Retry Payment</a>
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