<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            color: transparent;
        }
    </style>
</head>

</html>
<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $loc = $_GET["loc"];
        include "../DB/db.php";
        $i = 0;
        $len = 0;
        $ok = 1;
        do {
            $len++;
        } while ($_POST["c$len"]);
        do {
            $fidi = $_POST["fid$i"];
            $sali = $_POST["sal$i"];
            if ($sali == null) {
                $salary = "UPDATE `accounts` SET `payment` = '', `paid` = '' WHERE `erpid` = '$fidi';";
            } else {
                $salary = "UPDATE `accounts` SET `payment` = '$sali', `paid` = 'paid' WHERE `erpid` = '$fidi';";
            }
            $salRun = mysqli_query($connection, $salary);
            if ($salRun) {
                $ok = 1;
            } else {
                $ok = 0;
            }

            if ($i < $len - 1) {
                $i++;
            } else {
                break;
            }
        } while ($_POST["c$i"]);
        if ($ok) {
?>
            <script>
                alert("Salary Posted Succesfully..");
                window.location = "../payments/<?php echo "$loc.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Some error occured while updating salary.\nPlease try again later.");
                window.location = "../payments/<?php echo "$loc.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>";
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