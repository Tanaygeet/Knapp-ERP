<!-- Insert Query -->
<?php
include "db.php";
$erpid = "admin";
$pass = "admin123";
echo "$pass<br>";
$password = password_hash($pass, PASSWORD_BCRYPT);
$query = "INSERT INTO `accounts` (`mailid`, `erpid`, `mobile`, `firstname`, `lastname`, `age`, `gender`, `role`, `password`, `sequrityque`, `sequrityans`, `updation_time`, `first_login`) VALUES ('$erpid', '$erpid', '9669260964', 'sajal', 'chandaiya', '02/06/2000', 'M', 'Admin', '$password', 'what is your name?', 'sajal', '1:22Pm 15/04/2022', 'y');";
$run = mysqli_query($connection, $query);
echo $query;
echo $run;
?>

<!-- Page Basic PHP Template -->

?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>
../chat/message.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>
../mail/mail.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role" ?>

<span name="userName" id="userName"><?php echo "$fname $lname"; ?>

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
            <!-- All correct put whole code here -->
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

    <!--  -->
    <!--  -->
    <!--  -->
    <?php
    if (isset($_POST['imgBtn'])) {
        $image = $_FILES['image'];
        $imageName = $image['name'];
        if ($image['type'] == "image/png" || $image['type'] == "image/jpeg" || $image['type'] == "image/jpg") {
            $tempLocation = $image['tmp_name'];
            $permLocation = 'images/' . $imageName;
            $status = move_uploaded_file($tempLocation, $permLocation);
            $imgQuery = "INSERT INTO `imagetable` (`email`, `imagename`) VALUES ('$mail', '$permLocation')";
            $exec = mysqli_query($connect, $imgQuery);
            if ($exec) {
                echo "<script>
    alert('Image Uploaded Successfully!')
</script>";
                echo "<meta http-equiv='refresh' content='0'>";
            } else {
                echo "<script>
    alert('Some Error Occured While Uploading Image!')
</script>";
            }
        } else {
            $error = "Only Image Is Allowed To Upload";
        }
    }
    ?>
    <!--  -->
    <!--  -->
    <!--  -->