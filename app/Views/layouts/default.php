<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("title") ?></title>
    
</head>
<body>

<a href="<?= site_url("/") ?>">Home</a>


    <?php if (current_user()): ?>

       <p>Hello <?= esc(current_user() ->name) ?> </p>

       <a href="<?= site_url("/tasks") ?>">Tasks</a>


        <a href="<?= site_url("/logout") ?>">Log out</a>

    <?php else: ?>

            <a href="<?= site_url("/signup") ?>">Sign Up</a>

            <a href="<?= site_url("/login") ?>">Login</a>

    <?php endif; ?>

    <?php if(session()->has('warning')): ?>
            <div class = "warning">
                <?= session('warning') ?>
            </div>

    <?php endif; ?>

    <?php if(session()->has('info')): ?>
            <div class = "info">
                <?= session('info') ?>
            </div>

    <?php endif; ?>

    <?php if(session()->has('error')): ?>
            <div class = "error">
                <?= session('error') ?>
            </div>

    <?php endif; ?>

    <?= $this->renderSection("content") ?>

</body>
</html>