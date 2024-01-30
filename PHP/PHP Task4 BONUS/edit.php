<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<?php
require 'config.php';

if (!$conn->select_db($dbname)) {
    die("Database selection failed: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['id'];
    $newName = $_POST['new_name'];
    $newEmail = $_POST['new_email'];

    $sql = "UPDATE userdata SET uname='$newName', email='$newEmail' WHERE id=$userId";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_users.php");
    } else {
        echo "<p class='text-danger'>Error updating user: " . $conn->error . "</p>";
    }

    $conn->close();
} else {
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        $sql = "SELECT * FROM userdata WHERE id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <h2 class="mb-4">Edit User</h2>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label for="new_name">New Name:</label>
                    <input type="text" class="form-control" name="new_name" value="<?php echo $row['uname']; ?>">
                </div>
                <div class="form-group">
                    <label for="new_email">New Email:</label>
                    <input type="email" class="form-control" name="new_email" value="<?php echo $row['email']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <?php
        } else {
            echo "<p class='text-danger'>User not found.</p>";
        }
    } else {
        echo "<p class='text-danger'>Invalid request.</p>";
    }
}
?>

</body>
</html>
