<!-- Show details of each task -->


<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Tasks

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Task <?= $task->id ?></h1>
    <a href="<?= site_url('/tasks') ?>">&laquo; Back to Index </a>

    <dl>
        <dt>ID</dt>
        <dd><?= $task->id ?></dd>
        <!-- show the id base on the task -->

        <dt>Description</dt>
        <!-- esc() to escape special characters turn to string -->
        <dd><?= esc($task->description) ?></dd>
        <!-- show description base on the task -->
    </dl>
    <a href="<?= site_url('/tasks/edit/' . $task->id)?>"> Edit </a> <!--Direct user to edit with anchor link-->
    <a href="<?= site_url('/tasks/delete/' . $task->id)?>"> Delete </a> <!-- Direct user to delete specific task with anchor link -->

<?= $this ->endSection() ?>

<!-- end of section for content -->