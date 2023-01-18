<?= $this->extend("layout/admin/layout"); ?>
<?= $this->section("content"); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
    <a href="/admin/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add user</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $k) : ?>
                        <tr>
                            <td><?= $k['username']; ?></td>
                            <td><?= $k['email']; ?></td>
                            <td>Member</td>
                            <td><?= $k['address']; ?></td>
                            <td><?= $k['phone_number']; ?></td>
                            <td><?= $k['created_at']; ?></td>
                            <td>
                                <a href="/user/edit" onclick="">Edit</a>
                                <span>||</span>
                                <a href="" class="text-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>