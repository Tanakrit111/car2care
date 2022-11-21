<?php include('config/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('assets/header.html') ?>
    <link rel="stylesheet" href="assets/style/styledetail.css">
    <style>
        footer {
            position: absolute;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
        }

        img {
            height: 200px;
            margin-top: 50px;
        }
    </style>
    <title>Detail</title>
</head>

<body>
    <?php include('assets/html/navbar.html') ?>

    <article>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM car WHERE car_id = ?");
        $stmt->bindParam(1, $_GET["car_id"]);
        $stmt->execute();
        $row = $stmt->fetch();
        ?>
        <div id="contentSection">
            <h2><?= $row["car_brand"] ?></h2>
            <h4><?= $row["car_model"] ?> <?= $row["car_year"] ?></h4>
            <p><?= $row["car_gear"] ?></p>
            <p>car miles : <?= $row["car_miles"] ?></p>
            <h4 id="price"><?= $row["price"] ?>฿</h4>
            <a href="booking.php?car_id=<?= $row["car_id"] ?>"><button>Booking now</button></a>
            <img src="img/mg.png" alt="">
        </div>

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src='img/<?= $row["car_id"] ?>_1.png' class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/<?= $row["car_id"] ?>_2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/<?= $row["car_id"] ?>_3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        </script>

    </article>

    <?php include('assets/html/footer.html') ?>
</body>

</html>