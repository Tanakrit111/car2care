<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/style/stlyelogin.css">
</head>

<body>

    <div class="container">
        <form class="content" action="register_db.php" method="post">
            
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['success'];
                    unset($_SESSION['success']); ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo $_SESSION['warning'];
                    unset($_SESSION['warning']); ?>
                </div>
            <?php } ?>

            <label for="" style="margin-top: 15px;">Username</label>
            <div>
                <input type="text" id="username" name="username" class="textbox" placeholder="Username" 
                pattern="[A-Z][a-z]{1,19}" required>
            </div>
            <label for="">Password</label>
            <div>
                <input type="password" id="password" name="password" placeholder="password" class="textbox" 
                pattern="[0-9a-zA-Z]{1,19}" required>
            </div>
            <label for="">Name</label>
            <div>
                <input type="text" id="name" name="name" class="textbox" placeholder="somsak eiei" 
                pattern="^[a-zA-Zก-๏\s]+$" required>
            </div>
            <label for="">Email</label>
            <div>
                <input type="email" id="email" name="email" class="textbox" placeholder="example@gmail.com" 
                pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            </div>
            <label for="">Phone Number</label>
            <div>
                <input type="tel" id="phone_number" name="phone_number" placeholder="ex 0999999999" class="textbox" 
                pattern="[0](6|8|9)[0-9]{8}" required>
            </div>
            <label for="">Age</label>
            <div>
                <input type="text" id="age" name="age" class="textbox" pattern="[0-9]{1,2}" required>
            </div>
            <input type="submit" name="submit" value="Sign up" class="btn-submit">
        </form>
    </div>

</body>

</html>