<!-- Edit User -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Edit User

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Editing <?=$user->name?> Details</h1>
    <a href="<?= site_url('/admin/users') ?>">&laquo; Back to Index </a>
    
    <!-- if the current session contains errors (validations eg.) -->
    <!-- then for loop the errors and print out every errors -->

    <?php if (session()->has('errors')): ?>
        <ul>
            <!-- print out each errors -->
            <?php foreach(session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>
    
    <!-- Open Form Here with Form Helper in CodeIgniter -->
    <?= form_open("/admin/users/update/" . $user->id) ?>
        
        <!-- include the form from form.php, makes the code simpler -->
        <?= $this->include('/Admin/Users/form.php') ?>

        <button>Save</button>

        <!-- anchor for cancel delete action, redirecting back to show tasks page -->
        <a href="<?= site_url("/admin/users/show/" . $user->id)?>"> Cancel</a>
    </form>
    <!-- Manually closing form -->

<?= $this ->endSection() ?>

<!-- end of section for content -->