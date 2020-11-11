<?php

include_once 'src/DBConnect.php';
include_once 'src/User.php';

$user = new User();
$users = $user->getAll();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="show-list-user">
        <h3>Danh sách người dùng</h3>
        <table id="list-users">
            <tr>
                <th>STT</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th></th>
            </tr>

            <?php foreach ($users as $key => $user): ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['address'] ?></td>
                    <td><a onclick="return confirm('Are you sure?')" href="action/delete.php?id=<?php echo $user['id'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div style="padding-top: 5px">
            <a href="view/create-user.php">Thêm mới</a>
        </div>
    </div>
</div>
</body>
</html>
