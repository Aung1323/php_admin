<?php
   include ("vendor/autoload.php");

   use Helpers\Auth;

   $auth = Auth::check();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4" style="max-width: 600px">
        <h1 class="h3">Profile</h1>

        <?php if ("$auth->photo") : ?>
            <img src="_actions/photos/<?= $auth->photo ?> " width="300" height="200"class="img-thumbnail">
        <?php endif ?>

        <form class="input-group mt-2" action="_actions/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Upload</button>
        </form>

        <ul class="list-group mt-4 mb-3">
            <li class="list-group-item">Name: <?= $auth->name ?></li>
            <li class="list-group-item">Email: <?= $auth->email ?></li>
            <li class="list-group-item">Phone: <?= $auth->phone ?></li>
            <li class="list-group-item">Address: <?= $auth->address ?></li>
        </ul>
        
        <a href="admin.php">Admin</a>
        <a href="_actions/logout.php" class="text-danger">Logout</a>
    </div>
</body>
</html>
