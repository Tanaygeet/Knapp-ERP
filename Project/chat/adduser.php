<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $grpname = $_GET["grpname"];
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
            <title>Add Users</title>
        </head>

        <body>
            <div class="main useraddMain">
                <div class="container usersadd">
                    <h2>ADD USERS <br><small>Later on you can add more users</small></h2>
                    <form action="../chatdb/useradd.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&grpname=$grpname"; ?>" method="POST">
                        <input name="u0" type="text" placeholder="User 1 ERP-ID" required autofocus>
                        <input name="u1" type="text" placeholder="User 2 ERP-ID">
                        <input name="u2" type="text" placeholder="User 3 ERP-ID">
                        <input name="u3" type="text" placeholder="User 4 ERP-ID">
                        <input name="u4" type="text" placeholder="User 5 ERP-ID">
                        <input name="u5" type="text" placeholder="User 6 ERP-ID">
                        <input name="u6" type="text" placeholder="User 7 ERP-ID">
                        <input name="u7" type="text" placeholder="User 8 ERP-ID">
                        <button type="submit">ADD</button>
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