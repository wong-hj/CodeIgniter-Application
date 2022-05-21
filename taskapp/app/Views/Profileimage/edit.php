<!-- Add profile image -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Edit Profile Image

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Edit Profile Image</h1>
    
    <?= form_open_multipart("/profileimage/update") ?>

    <div>
        <label for="image">File</label>
        <input type="file" name="image" id="image">
    </div>

    <button>Upload</button>

     <!-- anchor for cancel delete action, redirecting back to show profile page -->
     <a href="<?= site_url("/profile/show")?>"> Cancel</a>

<?= $this ->endSection() ?>

<!-- end of section for content -->