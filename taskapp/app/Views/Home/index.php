<?= $this->extend("layouts/default")?>

<?= $this->section("title")?>

    Home

<?= $this ->endSection() ?>

<?= $this->section("content")?>
    <h1>Home</h1>

    <a href="<?= site_url("/tasks")?>">View Task</a>
    <a href="<?= site_url("/signup")?>">Sign Up</a>
<?= $this ->endSection() ?>