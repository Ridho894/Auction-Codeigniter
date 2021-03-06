<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="position-fixed top-0 left-0 p-3 bg-white shadow" style="z-index: 25; right: 20px; top: 20px;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
            <div class="toast-header">
                <div src="..." class="rounded mr-2" alt="..."></div>
                <strong class="mr-auto">Auction</strong>
                <small>Now</small>
            </div>
            <div class="toast-body">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="container">
    <form action="" method="POST" autocomplete="off">
        <div class="input-group mt-3">
            <input type="text" class="form-control" placeholder="Search product..." name="search">
            <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
        </div>
    </form>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        <?php if (!$product) : ?>
            <div style="margin: auto;text-align: center;">
                <img class="mt-5" src="/img/no-search.png" alt="" width="50%">
                <h1>No Product</h1>
            </div>
        <?php elseif ($product) : ?>
            <?php foreach ($product as $k) : ?>
                <div class="card mt-3 mb-2" style="width: 20rem;">
                    <img class="card-img-top" src="/img/<?= $k["sampul"]; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $k['judul']; ?></h5>
                        <p class="card-text">Rp.<?= $k['price']; ?></p>
                        <a href="/Pages/detailProduct/<?= $k['slug']; ?>" class="btn btn-primary">Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?= $pager->links('product', 'product_pagination'); ?>
</div>
<?= $this->endSection(); ?>