<!-- Authentication for Edit Profile -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Edit Profile

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Editing Profile </h1>
    
    <p>Please Enter your password to continue editing.</p>
    
    <!-- Open Form Here with Form Helper in CodeIgniter -->
    <?= form_open("/profile/processAuthenticate") ?>
        
        <div>
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password">
        </div>

        <button>Submit</button>

        <!-- anchor for cancel delete action, redirecting back to show tasks page -->
        <a href="<?= site_url("/profile/show")?>"> Cancel</a>
    </form>
    <!-- Manually closing form -->

<?= $this ->endSection() ?>

<!-- end of section for content -->