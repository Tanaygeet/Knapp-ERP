<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    $_SESSION['skey'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        include '../DB/db.php';
        $stuquery = "select * from accounts where role = 'student';";
        $staffquery = "select * from accounts where role = 'staffmember';";
        $facquery = "select * from accounts where role = 'faculty' or role = 'hod' or role = 'hoi';";
        $adminquery = "select * from accounts where role = 'admin';";
        $sturun = mysqli_query($connection, $stuquery);
        $staffrun = mysqli_query($connection, $staffquery);
        $facrun = mysqli_query($connection, $facquery);
        $adminrun = mysqli_query($connection, $adminquery);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="Tanaygeet Shrivastava" content="Author, Developer">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap-grid.css" integrity="sha512-pM/iUb80UpXwRGB2/UbpFDyPtO31IE5aokTh7sYjpSY06pH3j0hXCNXGkyRn8gVod9Cbo4GdP/n98rfu6JC75Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="../css/menu.css">
            <link rel="icon" href="../images/logo/ico.png">
            <title>Admin Menu</title>
        </head>

        <body>

        </body>
        <header class="header"><i class="fa fa-bars" aria-hidden="true"></i> <span name="username" id="userName"><?php echo "$fname $lname"; ?> <svg width="5vh" height="5vh" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M29.5001 25.7369C33.0914 25.7369 35.7404 23.1672 35.7404 19.6762C35.7404 16.1852 33.0914 13.6155 29.5001 13.6155C25.9118 13.6155 23.2597 16.1852 23.2597 19.6762C23.2597 23.1672 25.9118 25.7369 29.5001 25.7369ZM29.5001 28.7673C22.6076 28.7673 17.0193 33.6522 17.0193 39.6765V40.8462H41.9808V39.6765C41.9808 33.6522 36.3926 28.7673 29.5001 28.7673Z" fill="white" />
                    <path d="M47.2757 5.6731H12.859C10.1475 5.6731 7.94238 7.87822 7.94238 10.5898V42.5481C7.94238 45.2596 10.1475 47.4648 12.859 47.4648H22.6924L30.0674 52.9488L37.4424 47.4648H47.2757C49.9873 47.4648 52.1924 45.2596 52.1924 42.5481V10.5898C52.1924 7.87822 49.9873 5.6731 47.2757 5.6731ZM35.1732 43.8719L30.0674 47.4648L24.9616 43.8719H11.3462V8.69883H48.7885V43.8719H41.4135H35.1732Z" fill="white" />
                </svg></span></header>
        <section class="main">
            <div class="sidebar">
                <form action="../notice/main.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" target="_blank" method="POST"><button type="submit">Notices</button></form>
                <form action="../events/main-event.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank" method="POST"><button type="submit">Events</button></form>
                <form action="../chat/message.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank" method="POST"><button type="submit">KNAPP Chats</button>
                </form>
                <form action="../mail/mail.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank" method="POST"><button type="submit">KNAPP Mails</button></form>
                <form action="account-menu.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank" method="POST"><button type="submit">Accounts</button>
                </form>
                <form action="management-menu.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank" method="POST"><button type="submit">Management</button>
                </form>
                <form action='../display/register.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' target="_blank" method="POST"><button type="submit">Registration</button>
                </form>
                <!-- <form action='library-menu.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' target="_blank" method="POST"><button type="submit">Library</button></form> -->
                <iframe src="https://free.timeanddate.com/clock/i8b9jg6n/n1041/szw80/szh80/hocfff/hbw1/hfc003f63/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw12/mqd100/mhcfff/mhl15/mhw4/mhd100/mmv0/hhcff9/hmcff9/hscfff/hsw3" frameborder="0" width="80" height="80"></iframe>
            </div>
            <section class="dashRight">
                <form method="POST" action='../display/showStudents.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>' target="_blank">
                    <button type="submit">
                        <div class="customCard" id="c1">
                            Students
                            <br>
                            <span class="Count"><?php echo mysqli_num_rows($sturun); ?></span>
                        </div>
                    </button>
                </form>
                <form method="POST" action="../display/showFaculties.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank">
                    <button type="submit">
                        <div class="customCard" id="c4">
                            Faculties
                            <br>
                            <span class="Count"><?php echo mysqli_num_rows($facrun); ?></span>
                        </div>
                    </button>
                </form>
                <form method="POST" action="../display/showStaff.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank">
                    <button type="submit">
                        <div class="customCard" id="c2">
                            Staff
                            <br>
                            <span class="Count"><?php echo mysqli_num_rows($staffrun); ?></span>
                        </div>
                    </button>
                </form>
                <form method="POST" action="../display/showBooks.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank">
                    <button type="submit">
                        <!-- <div class="customCard" id="c5">
                            Books
                            <br>
                            <span class="Count">50000</span>
                        </div> -->
                    </button>
                </form>
                <form method="POST" action="../display/showAdmins.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank">
                    <button type="submit">
                        <div class="customCard" id="c5">
                            Admins
                            <br>
                            <span class="Count"><?php echo mysqli_num_rows($adminrun); ?></span>
                        </div>
                    </button>
                </form>
            </section>

        </section>
        <div class="accountInfo">
            <img src="../images/download.jpg" alt="User Profile" class="userProfile">
            <form action="../display/viewUser.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&location=admin-menu.php"; ?>" method="POST"><button type="submit">Profile</button></form>
            <form action="../logout.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="POST"><button type="submit">Logout</button></form>
        </div>

        <script>
            $(function() {
                $(".fa-bars").click(function() {
                    $(".sidebar").toggle("slow");
                });
                $("#userName").click(function() {
                    $(".accountInfo").slideToggle("slow");
                    $(".accountInfo").css("display", "flex");
                });
                document.addEventListener('keydown', function(e) {
                    if (e.key == "Escape") {
                        $(".accountInfo").slideUp("slow");
                    }
                });
            });
        </script>

        </html>
    <?php
    } else {
    ?>
        <script>
            alert("oops! something went wrong.");
            // location = window.history.back();
        </script>
<?php
    }
} else {
    header("location: ../");
}
?>