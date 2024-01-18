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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap-grid.css" integrity="sha512-pM/iUb80UpXwRGB2/UbpFDyPtO31IE5aokTh7sYjpSY06pH3j0hXCNXGkyRn8gVod9Cbo4GdP/n98rfu6JC75Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="../css/menu.css">
            <link rel="icon" href="../images/logo/ico.png">
            <link rel="stylesheet" href="../css/show.css">
            <link rel="stylesheet" href="../css/reg.css">
            <title>Registration</title>
        </head>

        <body>

            <header class="header"><i class="fa fa-bars" aria-hidden="true"></i> <span name="userName" id="userName"><?php echo "$fname $lname"; ?> <svg width="5vh" height="5vh" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M29.5001 25.7369C33.0914 25.7369 35.7404 23.1672 35.7404 19.6762C35.7404 16.1852 33.0914 13.6155 29.5001 13.6155C25.9118 13.6155 23.2597 16.1852 23.2597 19.6762C23.2597 23.1672 25.9118 25.7369 29.5001 25.7369ZM29.5001 28.7673C22.6076 28.7673 17.0193 33.6522 17.0193 39.6765V40.8462H41.9808V39.6765C41.9808 33.6522 36.3926 28.7673 29.5001 28.7673Z" fill="white" />
                        <path d="M47.2757 5.6731H12.859C10.1475 5.6731 7.94238 7.87822 7.94238 10.5898V42.5481C7.94238 45.2596 10.1475 47.4648 12.859 47.4648H22.6924L30.0674 52.9488L37.4424 47.4648H47.2757C49.9873 47.4648 52.1924 45.2596 52.1924 42.5481V10.5898C52.1924 7.87822 49.9873 5.6731 47.2757 5.6731ZM35.1732 43.8719L30.0674 47.4648L24.9616 43.8719H11.3462V8.69883H48.7885V43.8719H41.4135H35.1732Z" fill="white" />
                    </svg></span></header>
            <section class="main">
                <div class="sidebar">
                    <form action='../notice/main.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' target="_blank" method="POST"><button type="submit">Notices</button></form>
                    <form action="../chat/message.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" target="_blank" method="POST"><button type="submit">KNAPP Chats</button>
                    </form>
                    <form action="../mail/mail.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank" method="POST"><button type="submit">KNAPP Mails</button></form>
                    <iframe src="https://free.timeanddate.com/clock/i8b9jg6n/n1041/szw80/szh80/hocfff/hbw1/hfc003f63/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw12/mqd100/mhcfff/mhl15/mhw4/mhd100/mmv0/hhcff9/hmcff9/hscfff/hsw3" frameborder="0" width="80" height="80"></iframe>
                </div>
                <section class="regRight">
                    <div class="registrationForm">
                        <div class="form">
                            <form action="../DB/add.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role";?>" method="POST" autocomplete="on">
                                <ul>
                                    <li>Mail Id*
                                        <input type="email" name="email" autofocus placeholder="abc@xyz.com" required>
                                    </li>
                                    <li>
                                        ERP Id*
                                        <input type="text" name="erpid" required>
                                    </li>
                                    <li>
                                        Contact No.*
                                        <input type="text" name="pno" required value="+91" maxlength="13">
                                    </li>
                                    <li>
                                        First Name*
                                        <input type="text" name="fname" required>
                                    </li>
                                    <li>
                                        Last Name*
                                        <input type="text" name="lname" required>
                                    </li>
                                    <li>
                                        Date Of Birth*
                                        <input type="date" name="dob" required>
                                    </li>
                                    <li>Gender*
                                        <input type="text" name="gen" required maxlength="1" placeholder="M/ F/ T">
                                    </li>
                                    <li>
                                        Role*
                                        <select name="role" id="role" required>
                                            <option disabled selected>- - Select - -</option>
                                            <option value="admin">Admin</option>
                                            <option value="hod">HOD</option>
                                            <option value="hoi">HOI</option>
                                            <option value="faculty">Faculty</option>
                                            <option value="account">Accountant</option>
                                            <option value="management">Account Manager</option>
                                            <!-- <option value="library">Librarian</option> -->
                                            <option value="student">Student</option>
                                            <option value="staffmember">Staff Member</option>
                                        </select>
                                    </li>
                                    <li>
                                        Password
                                        <input type="text" id="upasswd" name="upasswd" readonly value="*******************">
                                    </li>
                                    <li><small style="width: 100%; text-align:center;">For Students and HODs/ HOIs/ Faculties</small></li>
                                    <li>
                                        Degree
                                        <select name="degree" id="degree">
                                            <option value="" selected>- - Select - -</option>
                                            <option value="BBA">BBA</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BE">BE</option>
                                            <option value="B-Tech">B-Tech</option>
                                            <option value="BSC">BSC</option>
                                            <option value="MBA">MBA</option>
                                            <option value="MCA">MCA</option>
                                            <option value="M-Tech">M-Tech</option>
                                            <option value="MSC">MSC</option>
                                            <option value="PHD">PHD</option>
                                        </select>
                                    </li>
                                    <li>
                                        Branch/ Stream
                                        <select name="branch" id="branch">
                                            <option value="" selected>- - Select - -</option>
                                            <option value="CSE">CSE</option>
                                            <option value="Mechanical">Mechanical</option>
                                            <option value="Electrical">Electrical</option>
                                            <option value="Civil">Civil</option>
                                            <option value="EC">EC</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Mechatronics">Mechatronics</option>
                                            <option value="Cloud Computing">Cloud Computing</option>
                                            <option value="AI">AI</option>
                                            <option value="Robotics">Robotics</option>
                                        </select>
                                    </li>
                                    <li><small style="width: 100%; text-align:center;">For Staff Members</small></li>
                                    <li>
                                        Staff Type
                                        <select name="type" id="type">
                                            <option value="" selected>- - Select - -</option>
                                            <option value="Cleaing">Cleaing</option>
                                            <option value="Security">Security</option>
                                            <option value="peon">Peon</option>
                                        </select>
                                    </li>
                                    <li>
                                        Working Shift
                                        <select name="shift" id="shift">
                                            <option value="" selected>- - Select - -</option>
                                            <option value="Day">Day</option>
                                            <option value="Night">Night</option>
                                        </select>
                                    </li>
                                </ul>
                                <button type="submit">Register</button>
                            </form>
                            <script>
                                $(function() {
                                    var user = $("#role");
                                    setInterval(() => {
                                        if (user.val() != null) {
                                            switch (user.val()) {
                                                case "admin":
                                                    $("#upasswd").val("Admin@123");
                                                    break;
                                                case "hod":
                                                    $("#upasswd").val("hod123");
                                                    break;
                                                case "hoi":
                                                    $("#upasswd").val("hoi123");
                                                    break;
                                                case "faculty":
                                                    $("#upasswd").val("faculty123");
                                                    break;
                                                case "account":
                                                    $("#upasswd").val("account123");
                                                    break;
                                                case "management":
                                                    $("#upasswd").val("manager123");
                                                    break;
                                                // case "library":
                                                //     $("#upasswd").val("lib123");
                                                //     break;
                                                case "student":
                                                    $("#upasswd").val("student123");
                                                    break;
                                                case "staffmember":
                                                    $("#upasswd").val("* No Login Member *");
                                                    break;
                                                    break;
                                                default:
                                                    $("#upasswd").val("*******************");
                                            };
                                        }
                                    }, 1000);
                                });
                            </script>
                        </div>
                    </div>
                    </div>
                </section>
                <div class="accountInfo">
                    <img src="../images/download.jpg" alt="User Profile" class="userProfile">
                    <form action="../display/viewUser.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&location=$role-menu.php"; ?>" method="POST"><button type="submit">Profile</button></form>
                    <form action="../logout.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="POST"><button type="submit">Logout</button></form>
                </div>

                <script>
                    $(function() {
                        $(".fa-bars").click(function() {
                            $(".sidebar").toggle("slow");
                            if (window.screen.width < parseInt("537px")) {
                                $(".regRight").toggle("slow");
                            }
                        });
                        $("#userName").click(function() {
                            $(".accountInfo").slideToggle("slow");
                            $(".accountInfo").css("display", "flex");
                        });
                        setInterval(() => {
                            $(".form").css("margin-inline", $(".regRight").width() / 8.3 + "px");
                        }, 0);
                    });
                </script>
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
    header('location: ../index.php');
}
?>