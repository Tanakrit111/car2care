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
?>

<body>
    <?php include('assets/html/navbar.html') ?>
    <article id="booking">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM car WHERE car_id = ?");
        $stmt->bindParam(1, $_GET["car_id"]);
        $stmt->execute();
        $row = $stmt->fetch();
        ?>

        <img src='img/<?= $row["car_id"] ?>.jpg' width="300px" alt="...">
        <section class="data">
            <h2><?= $row["car_brand"] ?></h2>
            <h5>Model : <?= $row["car_model"] ?> <?= $row["car_year"] ?></h5>
            <p>transmission : <?= $row["car_gear"] ?></p>
            <p>car miles : <?= $row["car_miles"] ?></p>
            <h4 id="price"><?= $row["price"] ?> ฿</h4>
        </section>
    </article>

    <form action="booking_db.php?car_id=<?= $row["car_id"] ?>" method="POST">
        <label for="bookday">Booking Day</label>
        <input type="date" id="booking_date" name="booking_date" value="2022-05-11" min="2022-11-05" max="2025-06-14">

        <div class="button">
            <a id="a" href="detail.php?car_id=<?= $row["car_id"] ?>"><button type="button" class="btn btn-outline-danger">Back</button></a>
            <button type="submit" class="btn btn-outline-danger">Confirm Booking</button>
        </div>
    </form>




</body>

</html>