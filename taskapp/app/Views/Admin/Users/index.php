<!-- Main Page for admin users -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Users

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Users</h1>
    <a href="<?= site_url("/admin/users/new")?>">&rsaquo; Add New User</a>
    
    <!-- existence of tasks variable will return boolean value if found = true if not found = FALSE -->
    <!-- if $tasks is true then run the following code -->

    <?php if($users): ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Administrator</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                <!--for loop every $tasks-->
                <?php foreach($users as $user): ?>

                    <tr>
                        <td>
                            <a href="<?= site_url("/admin/users/show/" . $user->id)  ?>">
                                <?= esc($user->name) ?>
                            </a>
                        </td>
                        <td> <?=esc($user->email)?> </td>
                        <td> <?=esc($user->is_admin ? 'Yes' : 'No')?> </td>

                        <td> <?=esc($user->created_at)?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        
        <!-- links pagination simpleLinks (newer or older) -->
        <?= $pager->links() ?>
        
        <!-- links pagination links (page numbers eg 1 2 3) -->
        <!-- $pager->links() -->

    <?php else: ?>
        <p>No Users Found</p>
    <?php endif ?>

    

<?= $this ->endSection() ?>

<!-- end of section for content -->