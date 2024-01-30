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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .error {color: red;}
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
    <h2 class="col-9 mt-3">Users Table</h2>
    <a href="form.php" class="btn btn-success m-3 col-2">Add New User</a>
    </div>
    
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
                <th>Actions</th>
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
                    <td>
                        <a href='view.php?id={$row['id']}'><i class='fas fa-eye'></i></a>
                        <a href='edit.php?id={$row['id']}'><i class='fas fa-pencil-alt'></i></a>
                        <a href='delete.php?id={$row['id']}'><i class='fas fa-trash'></i></a>
                    </td>
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
