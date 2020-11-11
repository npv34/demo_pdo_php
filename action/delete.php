<?php

include_once '../src/DBConnect.php';
include_once '../src/User.php';
$id = $_GET['id'];

try {
    $user = new User();
    $user->delete($id);
    header('location: ../index.php');

}catch (PDOException $PDOException) {
    echo $PDOException->getMessage();
    die();
}


