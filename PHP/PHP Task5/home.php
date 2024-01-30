<?php
session_start();
require 'config.php';

function getUserName($conn, $username) {
    $stmt = $conn->prepare("SELECT usrname FROM newuserz WHERE usrname = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userName);
    $stmt->fetch();
    $stmt->close();
    return $userName;
}

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $username = $_SESSION['username']; 

    $userName = getUserName($conn, $username);

    if ($userName) {
        $welcomeMessage = "Hi $userName, Welcome to our site!";
    }
} else {
    $welcomeMessage = "Unable to retrieve user name for $username";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .center-image {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($welcomeMessage)): ?>
                    <div class="alert alert-success"><?= $welcomeMessage ?></div>
                <?php endif; ?>
                <div class="col-12 center-image">
                    <img src="img/indexPage.jpg" class="img-fluid ">
                </div>
                <div class="mt-3">
                        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
