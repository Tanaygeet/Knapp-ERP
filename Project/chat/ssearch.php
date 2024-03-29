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
            <title>Search Users</title>
        </head>

        <body>
            <div class="main">
                <h1>USER AND GROUP</h1>
                <div class="container user">
                    <h2>SEARCH USER</h2>
                    <form action="../chatdb/uSearch.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="POST">
                        <input type="search" name="username" title="ERP-ID" placeholder="Search ERPID..." required><button type="submit"><svg width="25" height="25" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M29.8143 32.2907L29.9708 32.4472L38.586 41.0624L41.0604 38.588L32.4452 29.9728L32.2887 29.8163L32.4251 29.6419C34.5787 26.8893 35.7491 23.495 35.75 20L29.8143 32.2907ZM29.8143 32.2907L29.64 32.4271M29.8143 32.2907L29.64 32.4271M29.64 32.4271C26.8876 34.5795 23.4941 35.7493 19.9999 35.75M29.64 32.4271L19.9999 35.75M19.9999 35.75C11.3161 35.75 4.25 28.6839 4.25 20C4.25 11.3161 11.3161 4.25 20 4.25C28.6839 4.25 35.75 11.316 35.75 19.9999L19.9999 35.75ZM32.25 20C32.25 13.2439 26.7561 7.75 20 7.75C13.2439 7.75 7.75 13.2439 7.75 20C7.75 26.7561 13.2439 32.25 20 32.25C26.7561 32.25 32.25 26.7561 32.25 20Z" fill="white" stroke="white" stroke-width="0.5" />
                                <path d="M22.8241 17.1722C23.5821 17.9322 24.0001 18.9362 24.0001 20.0002H28.0001C28.0019 18.949 27.7953 17.908 27.3923 16.9371C26.9893 15.9663 26.3978 15.085 25.6521 14.3442C22.6241 11.3202 17.3741 11.3202 14.3481 14.3442L17.1721 17.1762C18.6921 15.6602 21.3121 15.6642 22.8241 17.1722Z" fill="#9FB8CC" />
                            </svg>
                        </button>
                    </form>
                </div>
                <span class="btn">
                    <a href="smessage.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>">MY CHATS</a>
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