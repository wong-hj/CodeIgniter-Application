<!-- registration -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Signup

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Sign Up</h1>
    
    <!-- Show all errors if there is any -->
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach(session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>

    <!-- Open Form Here with Form Helper in CodeIgniter -->
    <?= form_open("/signup/create") ?>
        
        <!-- Registration Form -->
        <!-- old() to preserve input in the from after validation -->
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?=old("name")?>">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?=old("email")?>">
        </div>

        <!-- Not for password for security purposes -->
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        
        <div>
            <label for="password_confirmation">Repeat Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <button>Sign Up</button>
        <a href="<?= site_url('/') ?>">&laquo; Back to Home Page </a> <!-- Direct to homepage -->
    </form>
    <!-- Manually closing form -->

<?= $this ->endSection() ?>

<!-- end of section for content -->