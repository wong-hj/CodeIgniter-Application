<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("title") ?></title>
</head>
<body>
    <!-- Flash data added - flashdata only occurs once, after refresh its no longer there. -->

    <!-- if the current session has warning has info it will write the message stated in tasks.php -->
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
    <?= $this->renderSection("content") ?>

</body>
</html>