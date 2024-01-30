<?php
session_start();
require 'config.php';

$sessionId = session_id();

$_SESSION = array();

session_id($sessionId);
session_destroy();

setcookie(session_name(), '', time() - 3600, '/');

header('Location: login.php');
exit();

mysqli_close($conn);
?>
