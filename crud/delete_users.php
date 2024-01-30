<?php
// Lista e perdoruesve index
require '../config/Databasee.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = 'DELETE FROM users WHERE id=:id';
$query = $conn -> prepare($sql);
$query->execute(['id' => $id]);

header("Location: users.php ");