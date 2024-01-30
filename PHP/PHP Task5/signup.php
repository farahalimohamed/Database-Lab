<?php
require 'config.php';


function userExists($conn, $username) {
    $stmt = $conn->prepare("SELECT usrid FROM newuserz WHERE usrname = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->errno) {
        error_log("Error: " . $stmt->error);
    }

    $count = $stmt->num_rows;
    $stmt->close();
    return $count > 0;
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
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

    if (userExists($conn, $username)) {
        setSessionMessage('You already have an account. Please login.');
    } else {
        $hashedPassword = hashPassword($password);
        $stmt = $conn->prepare("INSERT INTO newuserz (usrname, usrpassword) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);
        $stmt->execute();
        $stmt->close();

        setSessionMessage('User registered successfully. Please login.');

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
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Sign Up</h2>
                
                <?php if ($message = getSessionMessage()): ?>
                    <div class="alert alert-danger"><?= $message ?></div>
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
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>

                <div class="mt-3">
                    <p>If you have an account, <a href="login.php">login here</a>.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
