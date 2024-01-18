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
            <link rel="stylesheet" href="../css/menu.css">
            <link rel="icon" href="../images/logo/ico.png">
            <link rel="stylesheet" href="../css/show.css">
            <title>Books</title>
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
                <section class="showContainer">
                    <nav class="filter">
                        <form action="#" method="POST">
                            <select name="" id="" class="dropDown">
                                <option value="all" disabled selected>Joining</option>
                                <option value="">2021</option>
                                <option value="">2020</option>
                                <option value="">2019</option>
                                <option value="">2018</option>
                            </select>
                            <select name="" id="" class="dropDown">
                                <option value="all" disabled selected>Work</option>
                                <option value="">Cleaning</option>
                                <option value="">Gardening</option>
                            </select>
                            <select name="" id="" class="dropDown">
                                <option value="all" disabled selected>Shift</option>
                                <option value="">Day</option>
                                <option value="">Night</option>
                            </select>
                            <button type="submit" class="formBtn">
                                <svg width="18" height="18" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M38.8595 22.7031C37.3908 30.0468 31.8536 36.9617 24.0839 38.5068C20.2945 39.2615 16.3636 38.8014 12.8509 37.192C9.33822 35.5826 6.42282 32.906 4.51983 29.5433C2.61684 26.1806 1.82328 22.3032 2.25213 18.4633C2.68098 14.6234 4.31038 11.0166 6.90833 8.15658C12.237 2.28745 21.2345 0.671827 28.5783 3.60933" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M13.8906 19.7656L21.2344 27.1094L38.8594 8.01562" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </nav>
                    <div class="tableContainer">
                        <h2 class="headText">You searched for</h2>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Staff ID</th>
                                    <th>Staff Name</th>
                                    <th>Joining</th>
                                    <th>Work</th>
                                    <th>Work Shift</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <tr>
                                    <td class="serial">1</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td><i class="fas fa-edit"></i></td>
                                    <td><i class="fas fa-trash-alt"></i></td>
                                </tr>
                                <tr>
                                    <td class="serial">1</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td><i class="fas fa-edit"></i></td>
                                    <td><i class="fas fa-trash-alt"></i></td>
                                </tr>
                                <tr>
                                    <td class="serial">1</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td>Sample</td>
                                    <td><i class="fas fa-edit"></i></td>
                                    <td><i class="fas fa-trash-alt"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <div class="accountInfo">
                    <img src="../images/download.jpg" alt="User Profile" class="userProfile">
                    <form action="#" method="POST"><button type="submit">Edit Profile</button></form>
                    <form action="../logout.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="POST"><button type="submit">Logout</button></form>
                </div>

                <div class="pop" id="accountPop">
                    <i class="fa fa-window-close" aria-hidden="true"></i>
                    <div class="forms">
                        <form action="#" method="POST"><button type="submit">Faculties</button></form>
                        <form action="#" method="POST"><button type="submit">Staff</button></form>
                        <form action="#" method="POST"><button type="submit">Student</button></form>
                    </div>
                </div>
                <div class="pop" id="managementPop">
                    <i class="fa fa-window-close" aria-hidden="true"></i>
                    <div class="forms">
                        <form action="showFaculties.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="POST"><button type="submit">Faculties</button></form>
                        <form action="showStaff.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="POST"><button type="submit">Staff</button></form>
                        <form action="showStudents.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="POST"><button type="submit">Student</button></form>
                    </div>
                </div>
                <div class="pop" id="registrationPop">
                    <i class="fa fa-window-close" aria-hidden="true"></i>
                    <div class="forms">
                        <form action="#" method="POST"><button type="submit">Faculties</button></form>
                        <form action="#" method="POST"><button type="submit">Staff</button></form>
                        <form action="#" method="POST"><button type="submit">Student</button></form>
                    </div>
                </div>

                <script>
                    $(function() {
                        $(".fa-bars").click(function() {
                            $(".sidebar").toggle("slow");
                            if (window.screen.width < parseInt("537px")) {
                                $(".showContainer").toggle("slow");
                            }
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
                        setInterval(() => {
                            $(".tableContainer").css("width", $(".showContainer").width() / 8.3 + "vh");
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
    header("location: index.php");
}
?>