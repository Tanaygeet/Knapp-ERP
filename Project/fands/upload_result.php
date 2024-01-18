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
            <link rel="stylesheet" href="../css/allot.css">
            <link rel="stylesheet" href="../css/att.css">
            <title>Upload Result</title>
        </head>

        <body>

            <header class="header"><i class="fa fa-bars" aria-hidden="true"></i> <span name="" id="userName"><?php echo "$fname $lname"; ?> <svg width="5vh" height="5vh" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M29.5001 25.7369C33.0914 25.7369 35.7404 23.1672 35.7404 19.6762C35.7404 16.1852 33.0914 13.6155 29.5001 13.6155C25.9118 13.6155 23.2597 16.1852 23.2597 19.6762C23.2597 23.1672 25.9118 25.7369 29.5001 25.7369ZM29.5001 28.7673C22.6076 28.7673 17.0193 33.6522 17.0193 39.6765V40.8462H41.9808V39.6765C41.9808 33.6522 36.3926 28.7673 29.5001 28.7673Z" fill="white" />
                        <path d="M47.2757 5.6731H12.859C10.1475 5.6731 7.94238 7.87822 7.94238 10.5898V42.5481C7.94238 45.2596 10.1475 47.4648 12.859 47.4648H22.6924L30.0674 52.9488L37.4424 47.4648H47.2757C49.9873 47.4648 52.1924 45.2596 52.1924 42.5481V10.5898C52.1924 7.87822 49.9873 5.6731 47.2757 5.6731ZM35.1732 43.8719L30.0674 47.4648L24.9616 43.8719H11.3462V8.69883H48.7885V43.8719H41.4135H35.1732Z" fill="white" />
                    </svg></span></header>
            <section class="main">
                <div class="sidebar">
                    <form action='../notice/main.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' target="_blank" method="POST"><button type="submit">Notices</button></form>
                    <form action="../events/main-event.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank" method="POST"><button type="submit">Events</button></form>
                    <form action="../chat/message.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" target="_blank" method="POST"><button type="submit">KNAPP Chats</button></form>
                    <form action="../mail/mail.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>" target="_blank" method="POST"><button type="submit">KNAPP Mails</button></form>
                    <iframe src="https://free.timeanddate.com/clock/i8b9jg6n/n1041/szw80/szh80/hocfff/hbw1/hfc003f63/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw12/mqd100/mhcfff/mhl15/mhw4/mhd100/mmv0/hhcff9/hmcff9/hscfff/hsw3" frameborder="0" width="80" height="80"></iframe>
                </div>
                <section class="showContainer">
                    <nav class="filter">
                        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?><?php echo "?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>' method="POST">
                            <select name="s1" id="s1" class="dropDown">
                                <option value="all" selected>Semester</option>
                                <?php
                                include '../DB/db.php';
                                $query1 = "select distinct semester from assignment where faculty_erpid = '$erpid';";
                                $run1 = mysqli_query($connection, $query1);
                                if (mysqli_num_rows($run1) > 0) {
                                    while ($row = mysqli_fetch_assoc($run1)) {
                                        echo "<option value='$row[semester]'>$row[semester]</option>";
                                    }
                                } else {
                                    echo "<option value='all'>-</option>";
                                }
                                ?>
                            </select>
                            <select name="s2" id="s2" class="dropDown">
                                <option value="all" selected>Section</option>
                                <?php
                                $query2 = "select distinct section from assignment where faculty_erpid = '$erpid';";
                                $run2 = mysqli_query($connection, $query2);
                                if (mysqli_num_rows($run2) > 0) {
                                    while ($row = mysqli_fetch_assoc($run2)) {
                                        $showSec = $row['section'];
                                        echo "<option value='$row[section]'>$row[section]</option>";
                                    }
                                } else {
                                    echo "<option value='all'>-</option>";
                                }
                                ?>
                            </select>
                            <select name="s3" id="s3" class="dropDown">
                                <option value="all" selected>Course Name</option>
                                <?php
                                $query3 = "select distinct subject from assignment where faculty_erpid = '$erpid';";
                                $run3 = mysqli_query($connection, $query3);
                                if (mysqli_num_rows($run3) > 0) {
                                    while ($row = mysqli_fetch_assoc($run3)) {
                                        echo "<option value='$row[subject]'>$row[subject]</option>";
                                    }
                                } else {
                                    echo "<option value='all'>-</option>";
                                }
                                ?>
                            </select>
                            <select name="s4" id="s4" class="dropDown">
                                <option value="all" selected>Assignment</option>
                                <?php
                                $query4 = "select distinct assi_no from assignment where faculty_erpid = '$erpid';";
                                $run4 = mysqli_query($connection, $query4);
                                if (mysqli_num_rows($run4) > 0) {
                                    while ($row = mysqli_fetch_assoc($run4)) {
                                        echo "<option value='$row[assi_no]'>$row[assi_no]</option>";
                                    }
                                } else {
                                    echo "<option value='all'>-</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" name="filter" class="formBtn">
                                <svg width="25" height="25" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27.873 40.3329L27.8824 40.3225L27.8911 40.3115L43.6731 20.4971L43.9839 20.1068L43.5943 19.7952L40.6303 17.424L40.24 17.1117L39.9276 17.502L26.2547 34.5876L16.7361 26.6567L16.352 26.3366L16.0319 26.7207L13.5999 29.6391L13.2798 30.0232L13.6639 30.3433L26.5535 41.0859L26.9248 41.3953L27.2466 41.0347L27.873 40.3329ZM0.5 28.5C0.5 21.0739 3.44999 13.952 8.70101 8.70101C13.952 3.44999 21.0739 0.5 28.5 0.5C35.9261 0.5 43.048 3.44999 48.299 8.70101C53.55 13.952 56.5 21.0739 56.5 28.5C56.5 35.9261 53.55 43.048 48.299 48.299C43.048 53.55 35.9261 56.5 28.5 56.5C21.0739 56.5 13.952 53.55 8.70101 48.299C3.44999 43.048 0.5 35.9261 0.5 28.5Z" fill="#003F63" stroke="#EB2A2A" />
                                </svg>

                            </button>
                        </form>
                    </nav>
                    <form class="allotForm" action="../DB/postRes.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" method="post">
                        <div class="tableContainer">
                            <nav class="allotment">
                                <?php
                                if (isset($_POST["filter"])) {
                                    $sem = $_POST["s1"];
                                    $sec = $_POST["s2"];
                                    $sub = $_POST["s3"];
                                    $assiName = $_POST["s4"];
                                ?>
                                    <label for="sem">Semester<input required type="text" value="<?php echo $sem; ?>" name="sem" id="sem" class="field" readonly required></label>
                                    <label for="sec">Section<input required type="text" name="sec" value="<?php echo $sec; ?>" id="sec" class="field" readonly required></label>
                                    <label for="course">Course Name<input required type="text" name="course" value="<?php echo $sub; ?>" id="course" class="field" readonly required></label>
                                    <input name="assiName" value="<?php echo $assiName; ?>" id="assiName" hidden>
                                <?php
                                } else {
                                ?>
                                    <label for="sem">Semester<input type="text" name="sem" id="sem" class="field" readonly required></label>
                                    <label for="sec">Section<input type="text" name="sec" id="sec" class="field" readonly required></label>
                                    <label for="course">Course Name<input type="text" name="course" id="course" class="field" readonly required></label>
                                    <input name="assiName" id="assiName" type="text" id="assiName" hidden>
                                <?php
                                }
                                ?>
                            </nav>
                            <table class="table tableForm">
                                <thead>
                                    <tr>
                                        <th scope="col">S. No.</th>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Assignment</th>
                                        <th scope="col">Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query4 = "select * from assignment where faculty_erpid = '$erpid';";
                                    $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid';";
                                    $run4 = mysqli_query($connection, $query4);
                                    $run4_1 = mysqli_query($connection, $query4_1);
                                    if (isset($_POST["filter"])) {
                                        $s1 = $_POST["s1"];
                                        $s2 = $_POST["s2"];
                                        $s3 = $_POST["s3"];
                                        $s4 = $_POST["s4"];
                                        if ($s1 == "all" && $s2 == "all" && $s3 == "all" && $s4 == "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid'";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 != "all" && $s2 == "all" && $s3 == "all" && $s4 == "all") {
                                            $query4 = "SELECT * FROM assignment WHERE faculty_erpid = '$erpid' AND semester = '$s1';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and semester='$s1' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 == "all" && $s2 != "all" && $s3 == "all" && $s4 == "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and section='$s2';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and section='$s2' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 == "all" && $s2 == "all" && $s3 != "all" && $s4 == "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and subject='$s3';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and subject='$s3' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 == "all" && $s2 == "all" && $s3 == "all" && $s4 != "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and assi_no='$s4';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 != "all" && $s2 != "all" && $s3 == "all" && $s4 == "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and semester='$s1' and section='$s2';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and semester='$s1' and section='$s2' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 != "all" && $s2 == "all" && $s3 != "all" && $s4 == "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and semester='$s1' and subject='$s3';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and semester='$s1' and subject='$s3' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 != "all" && $s2 == "all" && $s3 == "all" && $s4 != "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and semester='$s1' and assi_no='$s4';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and semester='$s1' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 == "all" && $s2 != "all" && $s3 != "all" && $s4 == "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and section='$s2' and subject='$s3';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and section='$s2' and subject='$s3' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 == "all" && $s2 != "all" && $s3 == "all" && $s4 != "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and section='$s2' and assi_no='$s4';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and section='$s2' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } elseif ($s1 == "all" && $s2 == "all" && $s3 != "all" && $s4 != "all") {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and subject='$s3' and assi_no='$s4';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and subject='$s3' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        } else {
                                            $query4 = "select * from assignment where faculty_erpid = '$erpid' and semester='$s1' and section='$s2' and subject='$s3' and assi_no='$s4';";
                                            $query4_1 = "SELECT * FROM student_table where faculty_erpid = '$erpid' and semester='$sem' and section='$sec' and subject='$sub' order by serial;";
                                            $run4 = mysqli_query($connection, $query4);
                                            $run4_1 = mysqli_query($connection, $query4_1);
                                        }
                                    }
                                    if (mysqli_num_rows($run4) > 0 && mysqli_num_rows($run4_1) > 0) {
                                        $cno = 0;
                                        $serial = 1;
                                        while ($row = mysqli_fetch_assoc($run4)) {
                                            $row2 = mysqli_fetch_assoc($run4_1);
                                            echo "<tr>
                                            <td>$serial</td>
                                            <input name='c$cno' value='$cno' hidden>
                                            <td>$row2[erpid]</td>
                                        <input type='text' name='stErpid$cno' value='$row2[erpid]' hidden>
                                        <td>$row2[fname] $row2[lname]</td>
                                        <td>$row[assi_no]</td>
                                        <input type='text' name='stFname$cno' value='$row2[fname] $row2[lname]' hidden>
                                        <td class='mar'><input type='text' class='marks' name='mark$cno' placeholder='10'></td>
                                    </tr>";
                                            $serial++;
                                            $cno++;
                                        }
                                    } else {
                                        echo "<tr>
                                    <th scope='row' class='serial'>0</th>
                                    <td>N</td>
                                    <td>N</td>
                                    <td>N</td>
                                    <td>N</td>
                                </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <button id="sub" type="submit">Upload Marks</button>
                        </div>
                    </form>
                </section>
                <div class="accountInfo">
                    <img src="../images/download.jpg" alt="User Profile" class="userProfile">
                    <form action="../display/viewUser.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&location=faculty-menu.php"; ?>" method="POST"><button type="submit">Profile</button></form>
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
                            let screen = $("html").width();
                            if (screen < 482) {
                                $(".tableContainer").css("width", $(".showContainer").width() / 10 + "vh");
                            } else if (screen < 640) {
                                $(".tableContainer").css("width", $(".showContainer").width() / 8.8 + "vh");
                            } else {
                                $(".tableContainer").css("width", $(".showContainer").width() / 8.5 + "vh");
                            }
                        }, 0);
                        $("#sub").click(function() {
                            if (!$("#sem").val() || !$("#sec").val() || !$("#course").val() || !$("#assiName").val()) {
                                alert("Please choose semester, section, course and assignment number.");
                                return false;
                            } else {
                                $(".allotForm").submit();
                            }
                        });
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