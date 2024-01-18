<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $num = $_GET["num"];
        include "../DB/db.php";
        $get = "SELECT * FROM assignment where serial = '$num';";
        $run = mysqli_query($connection, $get);
        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_assoc($run)) {
                $sec = $row["section"];
                $sem = $row["semester"];
                $sub = $row["subject"];
                $sub_c = $row["subject_code"];
                $que = $row["questions"];
                $ass_n = $row["assi_no"];
            }
        } else {
?>
            <script>
                alert("It looks like assignment is missing..");
                window.close();
            </script>
        <?php
        }

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
            <link rel="stylesheet" href="../css/newassi.css">
            <title>Assignment - <?php echo "$ass_n - $sec - $sem - $sub :: $sub_c"; ?></title>
        </head>

        <body>
            <div class="main">
                <div class="assignmentForm">
                    <h1><?php echo "$sub - A$ass_n"; ?></h1>
                    <div class="questions"><?php echo $que; ?></div>
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