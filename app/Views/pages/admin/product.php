<?= $this->extend("layout/admin/layout"); ?>
<?= $this->section("content"); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Product</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List products</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Address</th>
                        <th>Created By</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product as $k) : ?>
                        <tr>
                            <td><?= $k['judul']; ?></td>
                            <td><?= $k['price']; ?></td>
                            <td><?= $k['description']; ?></td>
                            <td><?= $k['address']; ?></td>
                            <td><?= $k['created_by']; ?></td>
                            <td><?= $k['created_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>