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
            <title>Manage Faculties</title>
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
                    <form action="../display/register.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" target="_blank" method="POST"><button type="submit">Registration</button>
                    </form>
                    <iframe src="https://free.timeanddate.com/clock/i8b9jg6n/n1041/szw80/szh80/hocfff/hbw1/hfc003f63/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw12/mqd100/mhcfff/mhl15/mhw4/mhd100/mmv0/hhcff9/hmcff9/hscfff/hsw3" frameborder="0" width="80" height="80"></iframe>
                </div>
                <section class="showContainer">
                    <nav class="filter">
                        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?><?php echo "?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' enctype="multipart/form-data" method="POST">
                            <select name="s1" id="s1" class="dropDown">
                                <option value="all" selected>Joining</option>
                                <?php
                                include '../DB/db.php';
                                $query1 = "select distinct year from accounts where role = 'faculty' or 'hoi' or 'hod' order by year;";
                                $run1 = mysqli_query($connection, $query1);
                                if (mysqli_num_rows($run1) > 0) {
                                    while ($row = mysqli_fetch_assoc($run1)) {
                                        echo "<option value='$row[year]'>$row[year]</option>";
                                    }
                                } else {
                                    echo "<option value='all'>-</option>";
                                }
                                ?>
                            </select>
                            <select name="s2" id="s2" class="dropDown">
                                <option value="all" selected>Degree</option>
                                <?php
                                $query2 = "select distinct degree from accounts where role = 'faculty' or role = 'hod' or role = 'hoi' order by degree;";
                                $run2 = mysqli_query($connection, $query2);
                                if (mysqli_num_rows($run1) > 0) {
                                    while ($row = mysqli_fetch_assoc($run2)) {
                                        echo "<option value='$row[degree]'>$row[degree]</option>";
                                    }
                                } else {
                                    echo "<option value='all'>-</option>";
                                }
                                ?>
                            </select>
                            <select name="s3" id="s3" class="dropDown">
                                <option value="all" selected>Branch</option>
                                <?php
                                $query3 = "select distinct branch from accounts where role = 'faculty' or role = 'hod' or role = 'hoi' order by branch;";
                                $run3 = mysqli_query($connection, $query3);
                                if (mysqli_num_rows($run3) > 0) {
                                    while ($row = mysqli_fetch_assoc($run3)) {
                                        echo "<option value='$row[branch]'>$row[branch]</option>";
                                    }
                                } else {
                                    echo "<option value='all'>-</option>";
                                }
                                ?>
                            </select><select name="s4" id="s4" class="dropDown">
                                <option value="faculty' or role = 'hod' or role = 'hoi" selected>Role</option>
                                <?php
                                $query5 = "select distinct role from accounts where role = 'faculty' or role = 'hod' or role = 'hoi' order by branch;";
                                $run5 = mysqli_query($connection, $query5);
                                if (mysqli_num_rows($run5) > 0) {
                                    while ($row = mysqli_fetch_assoc($run5)) {
                                        echo "<option value='$row[role]'>$row[role]</option>";
                                    }
                                } else {
                                    echo "<option value='all'>-</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" class="formBtn" name="filter">
                                <svg width="25" height="25" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27.873 40.3329L27.8824 40.3225L27.8911 40.3115L43.6731 20.4971L43.9839 20.1068L43.5943 19.7952L40.6303 17.424L40.24 17.1117L39.9276 17.502L26.2547 34.5876L16.7361 26.6567L16.352 26.3366L16.0319 26.7207L13.5999 29.6391L13.2798 30.0232L13.6639 30.3433L26.5535 41.0859L26.9248 41.3953L27.2466 41.0347L27.873 40.3329ZM0.5 28.5C0.5 21.0739 3.44999 13.952 8.70101 8.70101C13.952 3.44999 21.0739 0.5 28.5 0.5C35.9261 0.5 43.048 3.44999 48.299 8.70101C53.55 13.952 56.5 21.0739 56.5 28.5C56.5 35.9261 53.55 43.048 48.299 48.299C43.048 53.55 35.9261 56.5 28.5 56.5C21.0739 56.5 13.952 53.55 8.70101 48.299C3.44999 43.048 0.5 35.9261 0.5 28.5Z" fill="#003F63" stroke="#EB2A2A" />
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
                                    <th>Post</th>
                                    <th>Faculties ID</th>
                                    <th>Faculties Name</th>
                                    <th>Joining</th>
                                    <th>Degree</th>
                                    <th>Branch</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                $query4 = "select * from accounts where role = 'faculty' or role = 'hod' or role = 'hoi' order by erpid;";
                                $run4 = mysqli_query($connection, $query4);
                                if (isset($_POST["filter"])) {
                                    $s1 = $_POST["s1"];
                                    $s2 = $_POST["s2"];
                                    $s3 = $_POST["s3"];
                                    $s4 = $_POST["s4"];
                                    if ($s1 == "all" && $s2 == "all" && $s3 == "all") {
                                        $query4 = "select * from accounts where role = '$s4' order by erpid;";
                                        $run4 = mysqli_query($connection, $query4);
                                    } elseif ($s1 != "all" && $s2 == "all" && $s3 == "all") {
                                        $query4 = "select * from accounts where role = '$s4' and year='$s1' order by erpid;";
                                        $run4 = mysqli_query($connection, $query4);
                                    } elseif ($s1 == "all" && $s2 != "all" && $s3 == "all") {
                                        $query4 = "select * from accounts where role = '$s4' and degree='$s2' order by erpid;";
                                        $run4 = mysqli_query($connection, $query4);
                                    } elseif ($s1 == "all" && $s2 == "all" && $s3 != "all") {
                                        $query4 = "select * from accounts where role = '$s4' and branch='$s3' order by erpid;";
                                        $run4 = mysqli_query($connection, $query4);
                                    } elseif ($s1 != "all" && $s2 != "all" && $s3 == "all") {
                                        $query4 = "select * from accounts where role = '$s4' and year='$s1' and degree='$s2' order by erpid;";
                                        $run4 = mysqli_query($connection, $query4);
                                    } elseif ($s1 != "all" && $s2 == "all" && $s3 != "all") {
                                        $query4 = "select * from accounts where role = '$s4' and year='$s1' and branch='$s3' order by erpid;";
                                        $run4 = mysqli_query($connection, $query4);
                                    } elseif ($s1 == "all" && $s2 != "all" && $s3 != "all") {
                                        $query4 = "select * from accounts where role = '$s4' and degree='$s2' and branch='$s3' order by erpid;";
                                        $run4 = mysqli_query($connection, $query4);
                                    } else {
                                        $query4 = "select * from accounts where role = '$s4' and year='$s1' and degree='$s2' and branch='$s3' order by erpid;";
                                        $run4 = mysqli_query($connection, $query4);
                                    }
                                }
                                if (mysqli_num_rows($run4) > 0) {
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($run4)) {
                                        echo "<tr>
                                        <th scope='row' class='serial'>$no</th>
                                        <td>$row[role]</td>
                                        <td>$row[erpid]</td>
                                        <td>$row[firstname] $row[lastname]</td>
                                        <td>$row[year]</td>
                                        <td>$row[degree]</td>
                                        <td>$row[branch]</td>
                                        <td><a href ='../DB/edit.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&uemail=$row[mailid]&uerpid=$row[erpid]&ufn=$row[firstname]&uln=$row[lastname]&info1=$row[degree]&info2=$row[branch]&umobile=$row[mobile]&location=showFaculties'><i class='fas fa-edit'></i></a></td>
                                        <td><a href ='../DB/delete.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&uerpid=$row[erpid]&location=showFaculties'><i class='fas fa-trash-alt'></i></a></td>
                                    </tr>";
                                        $no++;
                                    }
                                } else {
                                    echo "<tr>
                                    <th scope='row' class='serial'>0</th>
                                    <td>N</td>
                                    <td>N</td>
                                    <td>N</td>
                                    <td>N</td>
                                    <td>N</td>
                                    <td>N</td>
                                    <td><i class='fas fa-edit'></i></td>
                                    <td><i class='fas fa-trash-alt'></i></td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
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
                            if (window.screen.width <= 1063) {
                                $(".tableContainer").css("width", $(".showContainer").width() / 10 + "vh");
                            }
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
    header("location: ../");
}
?>