<!-- Delete Profile Image -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Delete Profile Image

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

<h1>Delete Profile Image</h1>

<p>Are you Sure?</p>

<?= form_open("/profileimage/delete") ?>

    <button>Delete</button>

    <!-- anchor for cancel delete action, redirecting back to show profile page -->
    <a href="<?= site_url('/profile/show/') ?>">Cancel</a>

</form>
<?= $this ->endSection() ?>

<!-- end of section for content -->