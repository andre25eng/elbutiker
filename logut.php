<?php
session_start();
$_SESSION['loggedin'] = false;
$_SESSION['anamn'] = $user[''];
header('Location: hem.php');
?>