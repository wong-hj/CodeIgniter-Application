<!-- Forgot Password Page-->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Forgot Password

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

<h1>Forgot Password</h1>
<?= form_open("/password/processForgot") ?>

<div>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?= old('email') ?>">
</div>

<button>Send</button>

</form>

<?= $this ->endSection() ?>

