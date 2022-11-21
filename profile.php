<?php include('config/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/stylebooking.css">

    <?php include('assets/header.html') ?>
    <style>

    </style>
    <title>Booking</title>
</head>
<?php
if (empty(session_id()) && !headers_sent()) {
    session_start();
}
if (empty($_SESSION["name"])) {
    header("location: login.php");
}
if (isset($_SESSION['userid'])) {
    $id = $_SESSION['userid'];
    
}
?>

<body>
    <?php include('assets/html/navbar.html') ?>
    <article id="booking">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = $id");
        $stmt->execute();
        $row = $stmt->fetch();
        ?>

        <img src='user/<?= $row["user_id"] ?>.jpg' width="300px" alt="...">
        <section class="data">
            <h2><?= $row["username"] ?></h2>
            <h5>Name: <?= $row["name"] ?> </h5>
            <p>Email: <?= $row["email"] ?></p>
            <p>Tel: <?= $row["phone_number"] ?></p>
            <p>Age: <?= $row["age"] ?> </p>
        </section>
    </article>

    




</body>

</html>