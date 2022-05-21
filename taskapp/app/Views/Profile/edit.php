<!-- Edit Profile -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Edit Profile

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Editing <?=$user->name?>'s Profile </h1>
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
    <?= form_open("/profile/update") ?>
        
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?=old("name", esc($user->name))?>">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?=old("email", esc($user->email))?>">
        </div>

        <button>Save</button>

        <!-- anchor for cancel delete action, redirecting back to show tasks page -->
        <a href="<?= site_url("/profile/show")?>"> Cancel</a>
    </form>
    <!-- Manually closing form -->

<?= $this ->endSection() ?>

<!-- end of section for content -->