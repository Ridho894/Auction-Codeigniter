<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container">
<<<<<<< HEAD
<<<<<<< HEAD
    <form action="" method="POST">
        <div class="input-group mt-3">
            <input type="text" class="form-control" placeholder="Search product..." name="search">
            <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
        </div>
    </form>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
=======
    <div class="" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
>>>>>>> parent of b7cf154 (search product)
        <?php foreach ($product as $k) : ?>
            <div class="card mt-3 mb-2" style="width: 20rem;">
                <img class="card-img-top" src="/img/<?= $k["sampul"]; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $k['judul']; ?></h5>
                    <p class="card-text">Rp.<?= $k['price']; ?></p>
                    <a href="/pages/detailProduct/<?= $k['slug']; ?>" class="btn btn-primary">Details</a>
                </div>
            </div>
        <?php endforeach; ?>
=======
    <div class="row">
        <div class="col">
            <h1>Hello, Home</h1>
        </div>
>>>>>>> parent of c2983ff (migrasi ke final project yaitu lelang)
    </div>
    <?= $pager->links('product', 'orang_pagination'); ?>
</div>
<?= $this->endSection(); ?>