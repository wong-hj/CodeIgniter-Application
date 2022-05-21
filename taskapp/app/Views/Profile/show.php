<!-- Show Profile -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Profile

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

<h1>Profile</h1>

<dl>
    <dt>Name</dt>
    <dd><?= esc($user->name) ?></dd>

    <dt>Email</dt>
    <dd><?= esc($user->email) ?></dd>
</dl>

<a href="<?= site_url('/profile/edit') ?>">Edit</a>
<a href="<?= site_url('/profile/editPassword') ?>">Change Password</a>

<?= $this ->endSection() ?>

<!-- end of section for content -->