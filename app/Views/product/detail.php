<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Detail Product</h2>
            <div class="card mt-5" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $product['sampul']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['judul']; ?></h5>
                            <p class="card-text">Price: <b><?= $product['price']; ?></b></p>
                            <p class="card-text"><small class="text-muted">Description: <b><?= $product['description']; ?></b></small></p>
                            <a href="/product/edit/<?= $product['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/product/<?= $product['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">DELETE</button>
                            </form>
                            <br></br>
                            <a href="/pages/profile">Kembali Ke Daftar Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>