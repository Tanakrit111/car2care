<?php include('config/connect.php'); ?>

<?php
if (empty(session_id()) && !headers_sent()) {
    session_start();
}
if (isset($_SESSION['userid'])) {
    $id = $_SESSION['userid'];
}

$stmt = $pdo->prepare("UPDATE user SET user.password = ? WHERE user.user_id = ?");
$stmt->bindParam(1, $_POST["password"]); 
$stmt->bindParam(2, $id); 

$old = $pdo->prepare("SELECT password FROM user WHERE user_id = ?");
    $old->bindParam(1, $id);
    $old->execute();
    $row = $old->fetch();
    if($old->execute()){
        $row = $old->fetch();
        if($_POST['oldpass'] != $row['password']){
            echo "old password is not correct<br>";
            echo "<a href='index_user.php'>Home</a>";
            
        }else{
            if($stmt->execute()){
                echo "finish " . $id . " password changed <br>";
                header( "refresh:1; url=index_user.php" );
            }
        }
    }


?>