<?= $this->extend("layouts/default")?>

<?= $this->section("title")?>

    Home

<?= $this ->endSection() ?>

<?= $this->section("content")?>
    <h1>Home</h1>

    
    <a href="<?= site_url("/tasks")?>">View Task</a>
    <br>
    <a href="<?= site_url("/signup")?>">Sign Up</a>
    

    <?php if (current_user()): ?>
        <p> User is logged in</p>

        <p>Hello <?= esc(current_user()->name) ?></p>

        <a href="<?= site_url("/logout")?>">Log Out</a>

    <?php else: ?>
        <p> User is not logged in </p>

        <a href="<?= site_url("/login")?>">Login</a>

    <?php endif; ?>
<?= $this ->endSection() ?>