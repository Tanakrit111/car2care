<?php include('config/connect.php'); ?>

<?php

$stmt = $pdo->prepare("UPDATE confirmation SET confirmation.booking_date = ? WHERE confirmation.booking_id = ?");
$stmt->bindParam(1, $_POST["booking_date"]); 
$stmt->bindParam(2, $_POST["booking_id"]); 
if ($stmt->execute()){ header("location: history.php"); } 


?>