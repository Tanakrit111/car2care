<?php include('config/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/stylebooking.css">

    <?php include('assets/header.html') ?>
    <script>
        function check() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
        }
    </script>
    <style>
        
    </style>
    <title>Change Password</title>
</head>
<?php
if (empty(session_id()) && !headers_sent()) {
    session_start();
}
if (empty($_SESSION["name"])) {
    header("location: login.php");
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>

<body>
    <?php include('assets/html/navbar.html') ?>

    <div class="main-block">
        <form action="cf_updatepass.php" method="POST">
            <h1>Change Password</h1>
            <fieldset>
                <legend>
                    <h3>Details</h3>
                </legend>
                <div class="account-details">
                    <div><label>Doctor ID</label><input type="text" name="did" value="<?= $username ?>" readonly></div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h3>ChangePassword </h3>
                </legend>
                <div class="personal-details " id="personal-details">
                    <div>
                        <div><label>Old Password</label><input type="text" name="oldpass" required><br></div>
                        <div><label>New Password</label><input name="password" id="password" type="password" onkeyup='check();'
                                                                pattern="[0-9a-zA-Z]{1,19}" required /><br></div>
                        <div><label>Confirm New Password</label><input type="password" name="confirm_password" id="confirm_password"
                                                                 onkeyup='check();' pattern="[0-9a-zA-Z]{1,19}" required /> <br></div>
                        <div> <span id='message'></span><br> </div>
                    </div>
                </div>
            </fieldset>
            <button> <a href="index_user.php">back to home</a> </button>
            <button type="submit" href="/">Change</button>
        </form>
    </div>
</body>

</html>