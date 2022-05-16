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

        <dt>Description</dt>
        <dd><?= esc($task->description) ?></dd>
    </dl>
    <a href="<?= site_url('/tasks/edit/' . $task->id)?>"> Edit </a>
    <a href="<?= site_url('/tasks/delete/' . $task->id)?>"> Delete </a>

<?= $this ->endSection() ?>

<!-- end of section for content -->