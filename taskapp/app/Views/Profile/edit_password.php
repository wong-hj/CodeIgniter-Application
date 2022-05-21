<!-- Edit Password -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Edit Password

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Editing Password </h1>
    <a href="<?= site_url('/tasks') ?>">&laquo; Back to Index </a>
    
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
    <?= form_open("/profile/updatePassword") ?>
        
        <div>
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password">
        </div>

        <div>
            <label for="password">New Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Repeat New Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <button>Save</button>

        <!-- anchor for cancel delete action, redirecting back to show tasks page -->
        <a href="<?= site_url("/profile/show")?>"> Cancel</a>
    </form>
    <!-- Manually closing form -->

<?= $this ->endSection() ?>

<!-- end of section for content -->