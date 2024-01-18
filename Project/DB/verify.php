<?php
include "db.php";
$erpid = $_GET["erpid"];
$pass = $_GET["passwd"];
$query = "select * from accounts where erpid='$erpid';";
$run = mysqli_query($connection, $query);
$count = mysqli_num_rows($run);

if ($count > 0) {
    while ($row = mysqli_fetch_assoc($run)) {
        $passwd = $row['password'];
        if (password_verify($pass, $passwd)) {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $role = $row["role"];
            $first_login = $row['first_login'];
            session_start();
            $_SESSION['sid'] = $erpid;
            $_SESSION['skey'] = $passwd;
            if ($first_login == "y") {
?>
                <script>
                    alert("This is your first login, so please do complete the form.");
                    location = '../qcreate.php?<?php echo "fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role"; ?>';
                </script>
            <?php
            } else {
                if ($role == "hod" || $role == "hoi" || $role == "faculty") {
                    header("location: ../dashboard/faculty-menu.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role");
                } else {
                    header("location: ../dashboard/$role-menu.php?fn=$fname&ln=$lname&key=$passwd&id=$erpid&role=$role");
                }
            }
        } else {
            ?>
            <script>
                window.alert("Incorrect Password! Please Retry...");
                window.location = window.history.back();
            </script>
    <?php
        }
    }
} else {
    ?>
    <script>
        alert("This ERP-ID is not registered.\nPlease contact management department.");
        location = window.history.back();
    </script>
<?php
}
?>