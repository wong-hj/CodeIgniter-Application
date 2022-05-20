<!-- Delete User -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Delete User

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

<h1>Delete <?=$user->name?> Record</h1>

<p>Are you Sure?</p>

<?= form_open("/admin/users/delete/" . $user->id) ?>

    <button>Delete</button>

    <!-- anchor for cancel delete action, redirecting back to show tasks page -->
    <a href="<?= site_url('/admin/users/show/' . $user->id) ?>">Cancel</a>

</form>
<?= $this ->endSection() ?>

<!-- end of section for content -->