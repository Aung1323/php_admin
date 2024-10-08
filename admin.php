<?php

include ("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL);
$users = $table->getAll();

$auth = Auth::check();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <script></script>
</head>
<body class="bg-secondary">
    <div class="container">
        <nav class="navbar bg-dark navbar-dark navbar-expand">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">ADMIN</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link">
                            <b><?= $auth->name ?></b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="_actions/logout.php" class="nav-link text-danger">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <table class="table table-dark table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th></th>
            </tr>

            <?php foreach($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <?php if($user->role_id == 3):?>
                            <span class="badge bg-success">
                        <?= $user->role ?>
                    </span> 
                    <?php elseif($user->role_id == 2):?>
                            <span class="badge bg-primary">
                        <?= $user->role ?>
                    </span> 
                    <?php else: ?>
                            <span class="badge bg-secondary">
                        <?= $user->role ?>
                    </span> 
                    <?php endif ?>
                    </td>
                    <td>
                        <div class="btn-group">
                        
                            <?php if($user->suspended): ?>
                                <a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-warning">Ban</a>
                            <?php else: ?>
                                <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-warning">Ban</a>
                            <?php endif ?>

                            <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
        </table>
    </div>
</body>
</html>