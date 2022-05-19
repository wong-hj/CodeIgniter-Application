<!-- Default HTML Layout -->
<!-- Extends in every view files -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("title") ?></title>
</head>
<body>
    
    <a href="<?= site_url("/")?>">Home</a>

    <!-- If current_user() return value then run the code below -->
    <!-- current_user() finds current session user and id-->
    <?php if (current_user()): ?>

        <!-- Greet user name -->
        <p>Hello <?= esc(current_user()->name) ?></p>

        <a href="<?= site_url("/tasks")?>">View Task</a> <!-- Direct to view task with anchor -->
        <br>
        <a href="<?= site_url("/logout")?>">Log Out</a> <!-- Direct to logout with anchor -->

    <?php else: ?>
        

        <a href="<?= site_url("/signup")?>">Sign Up</a> <!-- Direct to Sign Up with anchor -->
        <a href="<?= site_url("/login")?>">Login</a> <!-- Direct to login with anchor -->

    <?php endif; ?>
    <!-- Flash data added - flashdata only occurs once, after refresh its no longer there. -->

    <!-- if the current session has warning has info it will write the message stated in tasks.php controller -->

    <?php if (session()->has('warning')): ?>
        <div class="warning">
            <?= session('warning') ?>
        </div>
    <?php endif ?>
    <?php if (session()->has('info')): ?>
        <div class="info">
            <?= session('info') ?>
        </div>
    <?php endif ?>
    <?php if (session()->has('error')): ?>
        <div class="error">
            <?= session('error') ?>
        </div>
    <?php endif ?>
    <?= $this->renderSection("content") ?>

</body>
</html>