<?php
session_start();
require_once 'config/connect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];

    
        try {
            $check_email = $pdo->prepare("SELECT email FROM `user` WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);

            if ($row['email'] == $email) {
                $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว ! <a href='login.php'>Click here</a>";
                header("location: register.php");
            } else if (!isset($_SESSION['error'])) {
                
                $stmt = $pdo->prepare("INSERT INTO user(username, password, name, email, phone_number, age) 
                VALUES(:username, :password, :name, :email, :phone_number, :age)");
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":phone_number", $phone_number);
                $stmt->bindParam(":age", $age);
                $stmt->execute();
                
                $_SESSION['success'] = "Sign up Successfully ! <a href='login.php' class='alert-link'>Click here</a>";
                header("location: register.php");
            } else {
                $_SESSION['error'] = "have something wrong";
                header("location: register.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    
}
