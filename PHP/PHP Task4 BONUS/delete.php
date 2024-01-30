<?php
require 'config.php';

if (!$conn->select_db($dbname)) {
    die("Database selection failed: " . $conn->error);
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $sql = "DELETE FROM userdata WHERE id = $userId";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_users.php");
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
