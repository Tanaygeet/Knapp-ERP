<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $eName = $_GET['eventName'];
        $eNo = $_GET['eventNo'];
        include 'db.php';
        $check = "SELECT * FROM event_registration where participant_id='$erpid' and event_name='$eName';";
        $runCheck = mysqli_query($connection, $check);
        if (mysqli_num_rows($runCheck) > 0) {
?>
            <script>
                alert("Your are already registered in the event.");
                location = '../events/student-event.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>';
            </script>
            <?php
        } else {
            $eventGet = "SELECT * FROM events where serial='$eNo';";
            $eventRun = mysqli_query($connection, $eventGet);
            if (mysqli_num_rows($eventRun) > 0) {
                while ($rowGet = mysqli_fetch_assoc($eventRun)) {
                    $eTime = "$rowGet[event_date], $rowGet[event_time]";
                    $eVenue = $rowGet["event_venue"];
                    $quote = $rowGet["quote"];
                    $eEnd = $rowGet["last_date"];
                }
                date_default_timezone_set("Asia/Kolkata");
                $today = date("Y-m-d, G:i:s");
                $add = "INSERT INTO `event_registration` (`participant_name`, `participant_id`, `event_name`, `event_id`, `registered`, `registration_time`, `event_time`) VALUES ('$fname $lname', '$erpid', '$eName','$eNo', 'y', '$today', '$eTime')";
                $run = mysqli_query($connection, $add);
            } else {
            ?>
                <script>
                    alert("oops! some server error happened.\nPlease try again later.")
                </script>
            <?php
            }
        }
        if ($run) {
            ?>
            <script>
                alert("Hurray! You are registered.");
                location = '../events/student-event.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("oops! server failed while registering.\nPlease try again later.");
                location = window.history.back();
            </script>
        <?php
        }
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