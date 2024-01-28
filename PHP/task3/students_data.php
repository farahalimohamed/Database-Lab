<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    .heading{
        font-size: 18px;
        font-weight: bold;
        padding: 10px;
    }
    .data{
        padding: 10px;
    }
    .php-status {
            color: red;
        }
</style>
<body>
    <?php 
    require_once 'students.php';
    $titlee= define('table', 'PHP class registration');
    ?>

    <h2>Appplication name: <?php echo table ?></h2>
    <table>
        <tr>
            <td class='heading'>Name</td>
            <td class='heading'>Email</td>
            <td class='heading'>Status</td>
            </tr>
            <?php foreach ($students as $student): ?>
            <?php if ($student['status'] === 'PHP'): ?>
                <tr class="php-status">
            <?php else: ?>
                <tr>
            <?php endif; ?>
                <td class='data'><?php echo $student['name'] ?></td>
                <td class='data'><?php echo $student['email'] ?></td>
                <td class='data'><?php echo $student['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>