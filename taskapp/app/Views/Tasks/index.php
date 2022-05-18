<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Tasks

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Welcome to Tasks</h1>
    <a href="<?= site_url("/tasks/new")?>">&rsaquo; Add New Task</a>
    
    <?php if($tasks): ?>
        <ul>
            <?php foreach($tasks as $task): ?>

                <li>
                    <a href="<?= site_url("/tasks/show/" . $task->id)  ?>">
                        <?= esc($task->description) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <?= $pager->simpleLinks() ?>
    <?php else: ?>
        <p>No Tasks Found</p>
    <?php endif ?>

    

<?= $this ->endSection() ?>

<!-- end of section for content -->