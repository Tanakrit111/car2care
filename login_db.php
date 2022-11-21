<?php
require_once 'config/connect.php';
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    try {
        $check_data = $pdo->prepare("SELECT * FROM user WHERE user.email = ? AND user.password = ?");
        $check_data->bindParam(1, $email);
        $check_data->bindParam(2, $password);
        $check_data->execute();
        $row = $check_data->fetch(PDO::FETCH_ASSOC);

        if (!empty($row)) {
            session_regenerate_id();

            $_SESSION['userid'] = $row["user_id"];
            $_SESSION['name'] = $row["name"];
            $_SESSION['username'] = $row["username"];
            header("location: index_user.php");
            
        } else {
            $_SESSION['error'] = "have something wrong";
            header("location: login.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
exit();
