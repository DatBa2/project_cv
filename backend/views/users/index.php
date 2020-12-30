<div>
<?php                 echo "<pre>";
                print_r($_SESSION);
                echo "</pre>"; ?>
</div>
<h2>Danh sách Admin</h2>
<a href="index.php?controller=user" >
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Avatar</th>
        <th>Status</th>
        <th></th>
    </tr>
    <?php if (!empty($users)): ?>
        <?php  echo "<pre>";print_r($users); echo "</pre>"; ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td>
                    <?php if (!empty($user['avatar'])): ?>
                        <img height="120" src="assets/uploads/<?php echo $user['avatar']; ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo $user['status']; ?></td>
                <?php $url_update = "index.php?controller=user&action=update&id=" . $user['id']; ?>
                <td><a href="<?php echo $url_update ?>">Update</a></td>
            </tr>
        <?php endforeach ?>

    <?php else: ?>
        <tr>
            <td colspan="7">Không có bản ghi nào</td>
        </tr>
    <?php endif; ?>
</table>

