<?php include('config/connect.php'); ?>

<?php

$stmt = $pdo->prepare("DELETE FROM confirmation WHERE booking_id = ?");
$stmt->bindParam(1, $_GET["booking_id"]); 
if ($stmt->execute()){ header("location: history.php"); } 


?>