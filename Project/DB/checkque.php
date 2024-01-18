<?php
include "db.php";
$erpid = $_GET['erpid'];
$sque = $_GET['sQue'];
$sans = $_GET['sAns'];
$query = "select * from accounts where erpid='$erpid' and sequrityque='$sque' and sequrityans='$sans';";
$run = mysqli_query($connection, $query);

if ($run) {
    session_start();
    $_SESSION['sid'] = $erpid;
    header("location: ../password.php?erpid=$erpid");
} else {
?>
<script>
    alert("Wrong sequrity question or answer. Please try again.")
    location = window.history.back();
</script>
<?php
}

?>