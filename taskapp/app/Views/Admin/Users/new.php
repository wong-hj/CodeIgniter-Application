<!-- Add new user -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Add New User

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Adding New User</h1>
    <a href="<?= site_url('/admin/users') ?>">&laquo; Back to Index </a>
    
    <!-- if the current session has any errors, will print out all with foreach loop -->
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach(session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>

    <!-- Open Form Here with Form Helper in CodeIgniter -->
    <?= form_open("/admin/users/create") ?>
        
        <!-- include the form from form.php, makes the code simpler -->

        <?= $this->include('/Admin/Users/form.php') ?>

        <button>Save</button>
    </form>
    <!-- Manually closing form -->

<?= $this ->endSection() ?>

<!-- end of section for content -->