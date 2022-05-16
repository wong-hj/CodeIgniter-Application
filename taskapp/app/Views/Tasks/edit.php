<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Edit Task

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Editing Task <?=$task->id?></h1>
    <a href="<?= site_url('/tasks') ?>">&laquo; Back to Index </a>
    
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach(session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>
    
    <!-- Open Form Here with Form Helper in CodeIgniter -->
    <?= form_open("/tasks/update/" . $task->id) ?>

        <?= $this->include('/Tasks/form.php') ?>

        <button>Save</button>
        <a href="<?= site_url("/tasks/show/" . $task->id)?>"> Cancel</a>
    </form>
    <!-- Manually closing form -->

<?= $this ->endSection() ?>

<!-- end of section for content -->