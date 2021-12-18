<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Detail Komik</h2>
            <div class="card mt-5" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $komik['sampul']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
<<<<<<< HEAD:app/Views/product/detail.php
                            <h5 class="card-title"><?= $product['judul']; ?></h5>
                            <p class="card-text">Price: <b><?= $product['price']; ?></b></p>
                            <p class="card-text"><small class="text-muted">Description: <b><?= $product['description']; ?></b></small></p>
                            <a href="/product/edit/<?= $product['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/product/<?= $product['id']; ?>" method="POST" class="d-inline">
=======
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text">Penulis: <b><?= $komik['penulis']; ?></b></p>
                            <p class="card-text"><small class="text-muted">Penerbit: <b><?= $komik['penerbit']; ?></b></small></p>
                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/komik/<?= $komik['id']; ?>" method="POST" class="d-inline">
>>>>>>> parent of c2983ff (migrasi ke final project yaitu lelang):app/Views/komik/detail.php
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">DELETE</button>
                            </form>
                            <br></br>
<<<<<<< HEAD:app/Views/product/detail.php
                            <a href="/pages/profile">Kembali Ke Daftar Product</a>
=======
                            <a href="/komik">Kembali Ke Daftar Komik</a>
>>>>>>> parent of c2983ff (migrasi ke final project yaitu lelang):app/Views/komik/detail.php
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>