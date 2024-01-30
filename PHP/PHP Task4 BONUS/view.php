<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<?php
require 'config.php';

if (!$conn->select_db($dbname)) {
    die("Database selection failed: " . $conn->error);
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $sql = "SELECT * FROM userdata WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2 class='mb-4'>User Details</h2>";
        echo "<p><strong>ID:</strong> {$row['id']}</p>";
        echo "<p><strong>Name:</strong> {$row['uname']}</p>";
        echo "<p><strong>Email:</strong> {$row['email']}</p>";
        echo "<p><strong>Group#:</strong> {$row['gp']}</p>";
        echo "<p><strong>Course Details:</strong> {$row['course']}</p>";
        echo "<p><strong>Gender:</strong> {$row['gender']}</p>";
        echo "<p><strong>Selected Courses:</strong> {$row['courses']}</p>";
        echo "<p><strong>Mail Status:</strong> " . ($row['agree'] === '0' || $row['agree'] === null ? 'Yes' : 'No') . "</p>";

        echo "<br><a href='display_users.php' class='btn btn-primary'>Back</a>";
    } else {
        echo "<p class='text-danger'>User not found.</p>";
    }

    $conn->close();
} else {
    echo "<p class='text-danger'>Invalid request.</p>";
}
?>

</body>
</html>
