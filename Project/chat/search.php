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
                <h2>SEARCH USER</h2>
                <div class="container user">
                    <form action="../chatdb/uSearch.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="POST">
                        <input type="search" name="username" title="ERP-ID" placeholder="Search ERPID..." required><button type="submit"><svg width="25" height="25" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M29.8143 32.2907L29.9708 32.4472L38.586 41.0624L41.0604 38.588L32.4452 29.9728L32.2887 29.8163L32.4251 29.6419C34.5787 26.8893 35.7491 23.495 35.75 20L29.8143 32.2907ZM29.8143 32.2907L29.64 32.4271M29.8143 32.2907L29.64 32.4271M29.64 32.4271C26.8876 34.5795 23.4941 35.7493 19.9999 35.75M29.64 32.4271L19.9999 35.75M19.9999 35.75C11.3161 35.75 4.25 28.6839 4.25 20C4.25 11.3161 11.3161 4.25 20 4.25C28.6839 4.25 35.75 11.316 35.75 19.9999L19.9999 35.75ZM32.25 20C32.25 13.2439 26.7561 7.75 20 7.75C13.2439 7.75 7.75 13.2439 7.75 20C7.75 26.7561 13.2439 32.25 20 32.25C26.7561 32.25 32.25 26.7561 32.25 20Z" fill="white" stroke="white" stroke-width="0.5" />
                                <path d="M22.8241 17.1722C23.5821 17.9322 24.0001 18.9362 24.0001 20.0002H28.0001C28.0019 18.949 27.7953 17.908 27.3923 16.9371C26.9893 15.9663 26.3978 15.085 25.6521 14.3442C22.6241 11.3202 17.3741 11.3202 14.3481 14.3442L17.1721 17.1762C18.6921 15.6602 21.3121 15.6642 22.8241 17.1722Z" fill="#9FB8CC" />
                            </svg>
                        </button>
                    </form>
                </div>
                <h2>
                    CREATE GROUP
                    <br>
                    <small style="font-size: medium; color: #fff; border-radius: 2vh; width:fit-content; background-color: #0000009d; opacity: 1; padding: 0.2% 2%; border: solid;">Try avoiding spaces in group name</small>
                </h2>
                <div class="container grp">
                    <form action="../chatdb/grpcheck.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="POST">
                        <input type="search" placeholder="my_group_name" name="grpname" title="Group name" required><button type="submit"><svg width="25" height="15" viewBox="0 0 40 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.0527 15.0786L19.0614 13.0786L19.0527 13.0786L19.0527 15.0786ZM38.5135 16.5776C39.298 15.7999 39.3035 14.5336 38.5258 13.7492L25.8535 0.965958C25.0758 0.181516 23.8095 0.176001 23.0251 0.953642C22.2406 1.73128 22.2351 2.9976 23.0127 3.78204L34.2771 15.1449L22.9142 26.4092C22.1298 27.1869 22.1242 28.4532 22.9019 29.2376C23.6795 30.0221 24.9458 30.0276 25.7303 29.25L38.5135 16.5776ZM9.5 15.0786L9.4815 17.0785L9.49075 17.0786L9.5 17.0786L9.5 15.0786ZM19.044 17.0786L37.0968 17.1572L37.1142 13.1572L19.0614 13.0786L19.044 17.0786ZM0.981504 16.9999L9.4815 17.0785L9.5185 13.0787L1.0185 13.0001L0.981504 16.9999ZM9.5 17.0786L19.0527 17.0786L19.0527 13.0786L9.5 13.0786L9.5 17.0786Z" fill="#E1F0F9" />
                            </svg>
                        </button>
                    </form>
                </div>
                <span class="btn">
                    <a href="message.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>">MY CHATS</a>
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