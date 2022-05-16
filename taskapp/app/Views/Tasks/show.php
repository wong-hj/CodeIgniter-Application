<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Tasks

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Welcome to Tasks</h1>

    <dl>
        <dt>ID</dt>
        <dd><?= $task['id'] ?></dd>

        <dt>Description</dt>
        <dd><?= $task['description'] ?></dd>
    </dl>

<?= $this ->endSection() ?>

<!-- end of section for content -->