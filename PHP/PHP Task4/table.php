<?php
   //create
$sql = "create database $dbname";
$retval = mysqli_query( $conn,$sql );

if(! $retval ) {
 die('Could not create database: ' . mysqli_error($conn));
}
mysqli_select_db( $conn,$dbname );
echo "Database <span style='color:red'>$dbname </span>created & selected successfully\n";


$sql = 'CREATE TABLE userdata( id INT AUTO_INCREMENT PRIMARY KEY,
uname VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
gp VARCHAR(255),
course TEXT,
gender VARCHAR(10) NOT NULL,
courses VARCHAR(255),
agree BOOLEAN NOT NULL)';

$retval = mysqli_query( $conn, $sql );

if(! $retval ) {
 die('Could not create table: ' . mysqli_error($conn));
}

echo "<br>Database Table  created successfully\n";

?>