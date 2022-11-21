<?php include('config/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('assets/header.html') ?>
    <style>
        #head {
            text-align: center;
            margin-top: 30px;
        }

        #booking {
            margin: 50px 100px;
        }

        .button {
            margin-left: 80%;
            margin-bottom: 20px;
        }

        .button a {
            margin-left: 2%;
        }

        .data {
            display: block;
            margin: 10px 30px;
        }

        legend {
            background-color: #d40219;
            color: #fff;
            padding: 3px 6px;
        }
    </style>
    <title>Confirm Booking</title>
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
    <?php
    $stmt = $pdo->prepare("SELECT * FROM confirmation JOIN user ON user.user_id=confirmation.user_id JOIN car ON car.car_id=confirmation.car_id WHERE car.car_id = ?");
    $stmt->bindParam(1, $_GET["car_id"]);
    $stmt->execute();
    $row = $stmt->fetch();
    ?>
    <article id="head">
        <h1>Booking Confirmation</h1>
    </article>

    <?php
    $data = $pdo->prepare("SELECT * FROM user WHERE user_id = $id");
    $data->execute();
    $row2 = $data->fetch();
    ?>
    <article id="booking">

        <section class="data">
            <b>booking # </b> <br>
            <p><b>booking date </b><?= $row["booking_date"] ?></p>

        </section>


        <legend>BOOKED BY</legend>
        <section class="data">
            <p><b>Username :</b> <?= $row2["username"] ?></p>
            <p><b>Name :</b> <?= $row2["name"] ?> (<?= $row2["age"] ?>)</p>
            <p><b>Email :</b> <?= $row2["email"] ?></p>
            <p><b>Tel :</b> <?= $row2["phone_number"] ?></p>
        </section>

        <legend>BOOKING DETAILS</legend>
        <section class="data">
            <h2><?= $row["car_brand"] ?></h2>
            <p><b>Model :</b> <?= $row["car_model"] ?> <?= $row["car_year"] ?></p>
            <p><b>Transmission :</b> <?= $row["car_gear"] ?></p>
            <p><b>Car Miles :</b> <?= $row["car_miles"] ?></p>
            <p><b>Price :</b> <?= $row["price"] ?> ฿</p>
        </section>
    </article>

    <div class="button" style="display: flex;">
        <a id="a" href="booking.php?car_id=<?= $row["car_id"] ?>"><button type="button" class="btn btn-outline-danger">Back</button></a>
        <a id="a" href="history.php"><button type="button" class="btn btn-outline-danger">Confirm Booking</button></a>
    </div>


</body>

</html>