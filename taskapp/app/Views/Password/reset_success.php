<!-- Success message after password reset -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Password Reset

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Password Reset</h1>
    
    <p> Password Reset Successfully </p>

    <p><a href="<?= site_url("/login") ?>">Login</a></p>

<?= $this ->endSection() ?>

<!-- end of section for content -->