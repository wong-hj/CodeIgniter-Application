<!-- Main Page for tasks -->

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
    
    <!-- existence of tasks variable will return boolean value if found = true if not found = FALSE -->
    <!-- if $tasks is true then run the following code -->

    <?php if($tasks): ?>
        <ul>
            //for loop every $tasks 
            <?php foreach($tasks as $task): ?>

                <li>
                    <a href="<?= site_url("/tasks/show/" . $task->id)  ?>">
                        <?= esc($task->description) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- links pagination simpleLinks (newer or older) -->
        <?= $pager->simpleLinks() ?>
        
        <!-- links pagination links (page numbers eg 1 2 3) -->
        <?= //$pager->links() ?>
    <?php else: ?>
        <p>No Tasks Found</p>
    <?php endif ?>

    

<?= $this ->endSection() ?>

<!-- end of section for content -->