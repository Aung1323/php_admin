<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
    <div class="container text-center" style="max-width: 600px">
        <h1 class="h3 my-4">Login</h1>
        <?php if(isset($_GET['incorrect'])) : ?>
            <div class="alert alert-danger">
                Incorrect email or password
            </div>
        <?php endif ?>

        <?php if (isset($_GET['register'])) : ?>
            <div class="alert alert-success">
                Account Created, please login
            </div>
            <?php endif ?>

            <?php if (isset($_GET['suspended'])) : ?>
            <div class="alert alert-danger">
                Account suspended
            </div>
            <?php endif ?>

        <form action="_actions/login.php" method="post" class="mb-2">
            <input type="text" class="form-control mb-2" name ="email" placeholder="Name" required>
            <input type="password" class="form-control mb-2" name ="password" placeholder="Password" required>
            <button class="btn btn-lg btn-primary w-100">Login</button>
        </form>
        <a href="register.php">Register</a>
    </div>

</body>
</html>