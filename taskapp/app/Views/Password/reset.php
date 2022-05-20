<!-- Resetting Password -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Reset Password

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Password Reset</h1>
    
    <!-- if the current session has any errors, will print out all with foreach loop -->
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach(session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>

    <?= form_open("/password/processreset/$token") ?>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        
        <div>
            <label for="password_confirmation">Repeat Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <button>Reset Password</button>

    </form>

<?= $this ->endSection() ?>

<!-- end of section for content -->