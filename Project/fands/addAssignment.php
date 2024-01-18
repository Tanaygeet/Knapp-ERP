<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        include "../DB/db.php";
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
            <link rel="stylesheet" href="../css/newassi.css">
            <title>New Assignment</title>
        </head>

        <body>
            <div class="main">
                <h1>New Assignment</h1>
                <form action="../DB/addAssi.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>" class="assignmentForm" method="POST">
                    <span>
                        <label for="section">Section : <select name="section" id="section" required>
                                <option disabled selected>Select</option>
                                <?php
                                $getQuery1 = "SELECT DISTINCT `section` FROM student_table where faculty_erpid = '$erpid';";
                                $getRun1 = mysqli_query($connection, $getQuery1);
                                if (mysqli_num_rows($getRun1) > 0) {
                                    while ($row = mysqli_fetch_assoc($getRun1)) {
                                        echo "<option value='$row[section]'>$row[section]</option>";
                                    }
                                } else {
                                    echo "<option disabled>No Data</option>";
                                }
                                ?>
                            </select></label>
                        <label for="semester">Semester : <select name="sem" id="sem" required>
                                <option disabled selected>Select</option>
                                <?php
                                $getQuery4 = "SELECT DISTINCT `semester` FROM student_table where faculty_erpid = '$erpid';";
                                $getRun4 = mysqli_query($connection, $getQuery4);
                                if (mysqli_num_rows($getRun4) > 0) {
                                    while ($row = mysqli_fetch_assoc($getRun4)) {
                                        echo "<option value='$row[semester]'>$row[semester]</option>";
                                    }
                                } else {
                                    echo "<option disabled>No Data</option>";
                                }
                                ?>
                            </select></label>
                        <label for="subject">Course name : <select name="sub" id="sub" required>
                                <option disabled selected>Select</option>
                                <?php
                                $getQuery2 = "SELECT DISTINCT `subject` FROM student_table where faculty_erpid = '$erpid';";
                                $getRun2 = mysqli_query($connection, $getQuery2);
                                if (mysqli_num_rows($getRun2) > 0) {
                                    while ($row = mysqli_fetch_assoc($getRun2)) {
                                        echo "<option value='$row[subject]'>$row[subject]</option>";
                                    }
                                } else {
                                    echo "<option disabled>No Data</option>";
                                }
                                ?>
                            </select></label>
                        <label for="subject_code">Course code : <select name="sub_code" id="sub_code" required>
                                <option disabled selected>Select</option>
                                <?php
                                $getQuery3 = "SELECT DISTINCT `subject_code` FROM student_table where faculty_erpid = '$erpid';";
                                $getRun3 = mysqli_query($connection, $getQuery3);
                                if (mysqli_num_rows($getRun3) > 0) {
                                    while ($row = mysqli_fetch_assoc($getRun3)) {
                                        echo "<option value='$row[subject_code]'>$row[subject_code]</option>";
                                    }
                                } else {
                                    echo "<option disabled>No Data</option>";
                                }
                                ?>
                            </select></label>
                        <label for="last_date">Submit till :<input type="date" name="last" id="last" required></label>
                        <label for="assi_no">Assign. No. :
                            <?php
                            $getQuery5 = "SELECT DISTINCT assi_no FROM assignment where faculty_erpid = '$erpid' order by serial desc limit 1;";
                            $getRun5 = mysqli_query($connection, $getQuery5);
                            if (mysqli_num_rows($getRun5) > 0) {
                                while ($row = mysqli_fetch_assoc($getRun5)) {
                                    $num = (int)$row['assi_no'] + 1;
                                    echo "<input type='text' style='text-align: center;' name='assi_no' maxlength='1' placeholder='eg.- 1' id='assi_no' value='$num' required>";
                                }
                            } else {
                                echo "<input type='text' style='text-align: center;' name='assi_no' maxlength='1' placeholder='eg.- 1' id='assi_no' required>";
                            }
                            ?></label>
                    </span>
                    <textarea name="question" id="question" placeholder="Please use HTML tags for formatting question to make it look good. Like,
                    <strong>Q.1-</strong> This is question number 1.<br>
                    <strong>Q.2-</strong> This is sample question number 2.<br>
                    <strong>Q.1-</strong> This is <i>question number 3 with italic tag</i>.<br>
                    <strong>Q.2-</strong> This is sample <u>question number 4 with underline tag.</u>" required></textarea>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </body>
        <script>
            $(function() {
                $("#last").click(function() {
                    if ($("#section").val() == null || $("#sem").val() == null || $("#sub").val() == null || $("#sub_code").val() == null) {
                        alert("Please fill out all previous fields.");
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
            location = window.history.back();
        </script>
<?php
    }
} else {
    header("location: ../");
}
?>