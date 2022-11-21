<?php include('config/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/f1413b38b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#live_search").keyup(function() {
            var query = $(this).val();
            if (query != "") {
                $.ajax({
                    url: 'livesearch.php',
                    method: 'POST',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#search_result').html(data);
                        $('#search_result').css('display', 'block');
                        $("#live_search").focusout(function() {
                            $('#search_result').css('display', 'none');
                        });
                        $("#live_search").focusin(function() {
                            $('#search_result').css('display', 'block');
                        });
                    }
                });
            } else {
                $('#search_result').css('display', 'none');
            }
        });
    });
    </script>

<script>
    async function getDataFromAPI() {
        let response = await fetch('data.json')
        let rawData = await response.text()
        let objectData = JSON.parse(rawData)
        let result = document.getElementById('result')

        let content = 'ที่อยู่ : ' + objectData.features[0].properties.address + ' เบอร์ติดต่อ' + objectData.features[0].properties.tel 
        let p = document.createElement('p')
        p.innerHTML = content
        result.appendChild(p)


        console.log(objectData)
    }
    getDataFromAPI()
    </script>
    <style>
    footer {
        text-align: center;
    }

    img {
        width: 350px;
        height: 200px;
    }

    .detail-car {
        margin-right: 50px;
    }

    input {
        width: 500px;
    }

    .row {
        display: grid;
        grid-template-columns: auto auto auto;
    }

    @media (max-width: 300px) {
        .row {
            display: block;

        }

        .detail-car {
            margin-left: 50px;
        }

        img {
            width: 200px;
            height: 100px;
        }
    }

    @media (min-width: 300px) and (max-width: 599.99px) {
        .row {
            display: grid;
            grid-template-columns: auto auto;
        }

        .detail-car {
            margin: 0px 20px;
        }

        img {
            width: 200px;
            height: 100px;
        }
    }
    </style>
    <title>car2care</title>
</head>




<?php
if (empty(session_id()) && !headers_sent()) {
    session_start();
}
if (empty($_SESSION["name"])) {
    header("location: login.php");
}
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    
}
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CAR<em style="color: #d40219;">2</em>CARE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index_user.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="history.php">Booking History</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Brand
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php">Toyota</a></li>
                            <li><a class="dropdown-item" href="brand/honda.html">Honda</a></li>
                            <li><a class="dropdown-item" href="brand/isuzu.html">Isuzu</a></li>
                        </ul>
                    </li>
                </ul>

                <span class="navbar-text">
                    <i class="fa-solid fa-phone"></i> 02-111-1111
                </span>
                <span class="navbar-text">
                    <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $name ?> <i class="fa-solid fa-circle-user"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="changepass.php">Change Password</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </span>
            </div>
        </div>
    </nav>

    <article class="search-car">
        <form>
            <input type="text" placeholder=" &#xF002; Search for cars by Brand or Model" name="live_search"
                id="live_search" autocomplete="off" style="font-family:Arial, FontAwesome">
        </form>
        <div id="search_result"></div>


    </article>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM car");
    $stmt->execute();
    ?>

    <article class="detail-car">
        <div class="row">
            <?php while ($row = $stmt->fetch()) { ?>
            <div class="box">
                <img src="img/<?= $row["car_id"] ?>.jpg" alt="car2" height="280px">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $row["car_year"] ?> <?= $row["car_brand"] ?> <?= $row["car_model"] ?>
                    </h5>
                    <a href="detail.php?car_id=<?= $row["car_id"] ?>" class="btn btn-outline-dark">details</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </article>

    <footer>
        <h1>About Us</h1>
        <h5 id="result"></h5>
    </footer>
</body>

</html>