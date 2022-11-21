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
    <title>editdate</title>
</head>


<body>
    <?php include('assets/html/navbar.html') ?>
    <article id="booking">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM confirmation JOIN user ON user.user_id=confirmation.user_id JOIN car ON car.car_id=confirmation.car_id WHERE confirmation.booking_id = ?");
        $stmt->bindParam(1, $_GET["booking_id"]);
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

    <form action="cf_update.php" method="POST">
        <label for="bookday">Booking Day</label>
        <input type="date" id="booking_date" name="booking_date" value="2022-05-11" min="2022-11-05" max="2025-06-14">

        <div class="button">
            
            <button type="submit" class="btn btn-outline-danger">Confirm Update</button>
        </div>
    </form>




</body>

</html>