<?php
session_start();
if ($_SESSION['sid'] && $_SESSION['skey']) {
    $erpid = $_GET["id"];
    $passwd = $_GET['key'];
    if ($_SESSION['sid'] == $erpid && $_SESSION['skey'] == $passwd) {
        $fname = $_GET["fn"];
        $lname = $_GET["ln"];
        $role = $_GET["role"];
        $search = $_POST['username'];
        if ($search == $erpid) {
?>
            <script>
                alert("You can't search yourself.");
                location = window.history.back();
            </script>
        <?php
        } else {
            include "../DB/db.php";
            $checkuser = "select * from knapp_chat_acc where erpid = '$search';";
            $check = mysqli_query($connection, $checkuser);
            if (mysqli_num_rows($check) > 0) {
                header("location: ../chat/usermessage.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role&search=$search");
            } else {
?>
                <script>
                    alert("Invalid ERP-ID.\nPlese check ID again.");
                    location = window.history.back();
                </script>
            <?php
            }
            
        }
    } else {
    ?>
        <script>
            alert("oops! something went wrong.");
            window.location = "../index.php";
        </script>
<?php
    }
} else {
    header("location: ../");
}
?>