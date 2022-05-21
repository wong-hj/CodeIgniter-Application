<!-- Login Form -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Login

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Login</h1>

    <!-- Open Form Here with Form Helper in CodeIgniter -->
    <?= form_open("/login/create") ?>

        
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?=old("email")?>">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        
        <div>
            <label for="remember_me">
                <input type="checkbox" id="remember_me" name="remember_me" 
                    <?php if (old("remember_me")): ?>checked<?php endif ?>> Remember Me
            </label>
        </div>
        <button>Login</button>
        <a href="<?= site_url('/') ?>">&laquo; Back to Home Page </a>
        <br>

        <a href="<?= site_url('/password/forgot') ?>"> Forgot Password? </a>
    </form>
    <!-- Manually closing form -->

<?= $this ->endSection() ?>

<!-- end of section for content -->