<?php
session_start();
require 'config.php';

function verifyUser($conn, $username, $password) {
    $stmt = $conn->prepare("SELECT usrid, usrpassword FROM newuserz WHERE usrname = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userId, $hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($userId && password_verify($password, $hashedPassword)) {
        return $userId;
    }

    return false;
}

function setSessionMessage($message) {
    $_SESSION['message'] = $message;
}

function getSessionMessage() {
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
    unset($_SESSION['message']);
    return $message;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userId = verifyUser($conn, $username, $password);

    if ($userId) {
        $_SESSION['username'] = $username; 

        $_SESSION['user_id'] = $userId;
        header('Location: home.php');
        exit();
    } else {
        setSessionMessage('Invalid username or password. Please try again or sign up.');
        header('Location: login.php');
        exit();
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Login</h2>

                <?php if ($message = getSessionMessage()): ?>
                    <div class="alert alert-info"><?= $message ?></div>
                <?php endif; ?>

                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>

                <div class="mt-3">
                    <p>If you don't have an account, <a href="signup.php">sign up here</a>.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
