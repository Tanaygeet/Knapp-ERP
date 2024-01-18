<?php
session_start();
    if ($_SESSION['sid'] && $_SESSION['skey']) {
        unset($_SESSION['sid']);
        unset($_SESSION['skey']);
        session_destroy();
?>
<script>
    window.location = "index.php";
</script>
<?php
    }
?>