<!-- Show details of each user -->


<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Users

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1><?= $user->name ?></h1>
    <a href="<?= site_url('/admin/users') ?>">&laquo; Back to Index </a>

    <dl>
        
        <dt>Name</dt>
        <!-- esc() to escape special characters turn to string -->
        <dd><?= esc($user->name) ?></dd>
        <!-- show description base on the task -->

        <dt>Email</dt>
        <dd><?= esc($user->email) ?></dd>

        <dt>Active</dt>
        <dd><?= $user->is_active ? 'Yes' : 'No' ?></dd>

        <dt>Administrator</dt>
        <dd><?= $user->is_admin ? 'Yes' : 'No' ?></dd>

        <dt>Created At</dt>
        <dd><?= esc($user->created_at) ?></dd>

        <dt>Updated At</dt>
        <dd><?= esc($user->updated_at) ?></dd>
        
    </dl>
    <a href="<?= site_url('/admin/users/edit/' . $user->id)?>"> Edit </a> <!--Direct user to edit with anchor link-->

    <?php if($user->id != current_user()->id): ?>
        <a href="<?= site_url('/admin/users/delete/' . $user->id)?>"> Delete </a> <!-- Direct user to delete specific user with anchor link -->
    <?php endif ?>

<?= $this ->endSection() ?>

<!-- end of section for content -->