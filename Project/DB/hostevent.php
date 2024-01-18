<?php

use function PHPSTORM_META\type;

session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $eName = $_POST['eName'];
        $eDate = $_POST['eDate'];
        $eTime = $_POST['eTime'];
        $eVenue = $_POST['eVenue'];
        $eEnd = $_POST['eEnd'];
        $sQuote = $_POST['sQuote'];
        include 'db.php';
        $host = "INSERT INTO `events` (`event_name`, `event_date`, `event_time`, `event_venue`, `last_date`, `quote`, `organizer_erp`) VALUES ('$eName', '$eDate', '$eTime', '$eVenue', '$eEnd', '$sQuote', '$erpid')";
        $run = mysqli_query($connection, $host);
        if ($run) {
?>
            <script>
                alert("Event has been hosted successfully.");
                location = '../events/main-event.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("oops! server failed while hosting.");
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