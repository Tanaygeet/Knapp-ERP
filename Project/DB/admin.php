<?php
include "db.php";
$erpid = "2023admin0";
$pass = "123";
$password = password_hash($pass, PASSWORD_DEFAULT);
$query = "INSERT INTO `accounts` (`mailid`, `erpid`, `mobile`, `firstname`, `lastname`, `age`, `gender`, `role`, `password`, `sequrityque`, `sequrityans`, `updation_time`, `first_login`, `year`, `degree`, `branch`) VALUES ('guptasajal0206@gmail.com', '$erpid', '+919669260964', 'Sajal', 'Chandaiya', '02/06/2000', 'M', 'admin', '$password', 'what is your name?', 'sajal', '1:22Pm 15/04/2022', 'y', '2022', 'B-Tech', 'CSE');";
$query2 = "INSERT INTO `knapp_chat_acc` (`first_name`, `last_name`, `erpid`) VALUES ('Sajal', 'Chandaiya', '$erpid')";
$query3 = "INSERT INTO `knapp_mail_acc` (`name`, `mail`) VALUES ('Sajal Chandaiya', '$erpid@knapp.in')";
$run = mysqli_query($connection, $query);
$run2 = mysqli_query($connection, $query2);
$run3 = mysqli_query($connection, $query3);
if ($run) {
    echo "inserted...";
} else {
    echo "Error...";
}

?>