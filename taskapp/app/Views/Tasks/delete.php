<!-- Delete Task -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Delete Task

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

<h1>Delete Task <?=$task->id?></h1>

<p>Are you Sure?</p>

<?= form_open("/tasks/delete/" . $task->id) ?>

    <button>Delete</button>

    <!-- anchor for cancel delete action, redirecting back to show tasks page -->
    <a href="<?= site_url('/tasks/show/' . $task->id) ?>">Cancel</a>

</form>
<?= $this ->endSection() ?>

<!-- end of section for content -->