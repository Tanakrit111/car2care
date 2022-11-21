<?php include('config/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/stylebooking.css">

    <?php include('assets/header.html') ?>
    <!-- <script src="assets/sheet.js"></script> -->
    <title>History</title>

    <script>
        function confirmDelete(booking_id) {
            var ans = confirm("confirm cancle booking id: " + booking_id);
            if (ans == true)
                document.location = "cf_delete.php?booking_id=" + booking_id;
        }
        
    </script>
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

    <article id="history">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM confirmation JOIN user ON user.user_id=confirmation.user_id JOIN car ON car.car_id=confirmation.car_id WHERE user.user_id = $id");
        $stmt->execute();
        while ($row = $stmt->fetch()) :
        ?>
            รหัสการจอง : <?= $row[0] ?><br>
            ชื่อสมาชิก : <?= $row["name"] ?><br>
            อีเมล : <?= $row["email"] ?><br>
            รถยนต์ที่จอง : <?= $row["car_brand"] ?> <?= $row["car_model"] ?><br>
            วันที่จอง : <?= $row["booking_date"] ?><br>
            <a href='#' onclick='confirmDelete("<?= $row[0] ?>")'>Cancle</a>
            <a href='edit_date.php?booking_id=<?= $row[0] ?>'>Edit</a>
            <hr style="margin: 25px 350px 0px 350px;"><br>
        <?php endwhile; ?>
    </article>


</body>

</html>