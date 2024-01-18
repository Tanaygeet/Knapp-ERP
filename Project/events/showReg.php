<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $en = $_GET['eventName'];
        include "../DB/db.php";
        $fetchReg = "SELECT * FROM event_registration WHERE event_name='$en';";
        $run = mysqli_query($connection, $fetchReg);

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
            <link rel="icon" href="../images/logo/ico.png">
            <link rel="stylesheet" href="../css/event.css">
            <link rel="stylesheet" href="../css/eventReg.css">
            <title><?php echo $en; ?> Registrations</title>
        </head>

        <body>
            <div class="main">
                <h2 class="h2">Event Name</h2>
                <div class="tableContainer">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>S.No.</th>
                                <th>Participant ID</th>
                                <th>Participant Name</th>
                                <th>Event</th>
                                <th>Event Date</th>
                                <th>Remove</th>
                            </tr>
                            <?php
                            if (mysqli_num_rows($run) > 0) {
                                $serial = 1;
                                while ($row = mysqli_fetch_assoc($run)) {
                                    echo "<tr>
                                    <td class='serial'>$serial</td>
                                    <td>$row[participant_id]</td>
                                    <td>$row[participant_name]</td>
                                    <td>$row[event_name]</td>
                                    <td>$row[event_time]</td>
                                    <td><a href='../DB/deleteEuser.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&pid=$row[serial]&ename=$en'><i class='fas fa-trash-alt'></i></a></td>
                                </tr>";
                                    $serial++;
                                }
                            } else {
                                echo "<tr>
                                <td class='serial'>0</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td><i class='fas fa-trash-alt'></i></td>
                            </tr>";
                            }
?>
                        </tbody>
                    </table>
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