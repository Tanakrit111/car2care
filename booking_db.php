<?php
session_start();
require_once 'config/connect.php';

if (isset($_SESSION['userid'])) {
    $id = $_SESSION['userid'];
}

$stmt = $pdo->prepare("INSERT INTO confirmation VALUES ('', ?, ?, ?)");
$stmt->bindParam(1, $_POST["booking_date"]);
$stmt->bindParam(2, $id);
$stmt->bindParam(3, $_REQUEST["car_id"]);
$stmt->execute(); 

$booking_id = $pdo->lastInsertId();

header("location: cf_booking.php?car_id=" . $_REQUEST["car_id"]);
?>
    

