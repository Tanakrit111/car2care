<?php require_once 'config/connect.php';

if (isset($_POST["query"])) {
    $query = "%".$_POST["query"]."%";
    $stmt = $pdo->prepare("SELECT * FROM car WHERE car_brand LIKE ?");
    $stmt->bindParam(1, $query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) { ?>
        <div class="row" style="margin :100px">
            <?php while ($row = $stmt->fetch()) { ?>
                <div class="col-lg-4 col-md-4 col-12">
                    <img src="img/<?= $row["car_id"] ?>.jpg" class="card-img" alt="car2" height="280px">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $row["car_year"] ?> <?= $row["car_brand"] ?> <?= $row["car_model"] ?>
                        </h5>
                        <a href="detail.php?car_id=<?= $row["car_id"] ?>" class="btn btn-outline-dark">details</a>
                    </div>
                </div>
    <?php }
        } else {
            echo "<h6 class='text-danger text-center mt-3'>Data not found</h6>";
        }
    }

    ?>