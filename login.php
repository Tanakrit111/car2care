<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="assets/style/stlyelogin.css">
    <script src="assets/sheet.js"></script>
</head>

<body>
    <div class="container">
        <form class="content" action="login_db.php" method="POST">
            <h2>Login</h2>
            <input type="email" name="email" id="email" placeholder="example@gmail.com" class="textbox" required>
            <input type="password" name="password" id="password" placeholder="Password" class="textbox" required>
            <input type="checkbox" id="checkbox" class="checkbox" onclick="showpass();">
            <input type="submit" id="submit" name="submit" value="Sign in" class="btn-submit">
            <div class="link">
                Not a member ? <a href="register.php"> Sign up</a>
            </div>
        </form>
    </div>
</body>

</html>