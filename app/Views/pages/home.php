<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container">
    <div class="" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
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
    </div>
</div>
<?= $this->endSection(); ?>