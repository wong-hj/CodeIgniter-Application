<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Tasks

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Welcome to Tasks</h1>
    <a href="<?= site_url("")?>">&laquo; Back to Home Page</a>
    <ul>
        <?php foreach($tasks as $task): ?>

            <li>
                <a href="<?= site_url("/tasks/show/" . $task['id'])  ?>">
                    <?= $task['description'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

<?= $this ->endSection() ?>

<!-- end of section for content -->