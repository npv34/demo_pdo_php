<?php
include_once '../src/DBConnect.php';
include_once '../src/User.php';
$userModel = new User();

$username = $_POST['username'];
$password = $_POST['password'];
$address = $_POST['address'];
$email = $_POST['email'];

$user = [
    'username' => $username,
    'email' => $email,
    'address' => $address,
    'password' => $password,
    'group_id' => 1
];

$userModel->add($user);
header('location: ../index.php');

