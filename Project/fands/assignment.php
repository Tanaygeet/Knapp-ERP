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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="icon" href="../images/logo/ico.png">
            <link rel="stylesheet" href="../css/message.css">
            <link rel="stylesheet" href="../css/assignment.css">
            <title>All Assignments</title>
        </head>

        <body>
            <div class="main ass-main">
                <h1>Assignments</h1>
                <div class="container">
                    <ul>
                        <?php
                        include "../DB/db.php";
                        $assQuery = "SELECT * FROM `assignment` where faculty_erpid='$erpid' order by `serial` desc;";
                        $assRun = mysqli_query($connection, $assQuery);
                        if (mysqli_num_rows($assRun) > 0) {
                            while ($row = mysqli_fetch_assoc($assRun)) {
                                echo "<li>
                                <a target='_blank' href='viewAssi.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&num=$row[serial]'><span>$row[section]-$row[semester]_$row[subject]-A$row[assi_no]</span> <span style='color: red; font-size: large;'>$row[last_date]</span></a>
                            </li>";
                            }
                        } else {
                            echo "<li>
                            <a><span>No Assignments</span> <span>~~</span></a>
                        </li>";
                        }
                        ?>
                    </ul>
                </div>
                <span class="btn">
                    <a href="addAssignment.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" target="_blank">New Assignment</a>
                </span>
            </div>
        </body>
        <script>
            $(function() {
                setInterval(() => {
                    window.location.reload();
                }, 10000);
            });
        </script>

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