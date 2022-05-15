<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Tasks

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Welcome to Tasks</h1>

    <ul>
        <?php foreach($tasks as $task): ?>

            <li>
                <?= $task['id'] ?>
                <?= $task['description'] ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?= $this ->endSection() ?>

<!-- end of section for content -->