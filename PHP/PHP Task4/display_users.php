<?php
require 'config.php';
if (!$conn->select_db($dbname)) {
    die("Database selection failed: " . $conn->error);
}
$sql = "SELECT * FROM userdata";
$result = $conn->query($sql);
?>

<!DOCTYPE HTML>  
<html>
<head>
    <title>Users Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .error {color: red;}
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Users Table</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Group#</th>
                <th>Course Details</th>
                <th>Gender</th>
                <th>Selected Courses</th>
                <th>Mail Status</th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($row = $result->fetch_assoc()) {
                $receiveEmails = ($row['agree'] === '0' || $row['agree'] === null) ? 'Yes' : 'No';

                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['uname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['gp']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['courses']}</td>
                    <td>{$receiveEmails}</td>

                </tr>";
            }
            ?>

        </tbody>
    </table>
</div>

<?php
$conn->close();
?>

</body>
</html>
