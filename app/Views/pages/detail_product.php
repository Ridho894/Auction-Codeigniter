<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container mt-3">
    <div class="card">
        <div class="row">
            <aside class="col-sm-5 border-right">
                <article class="gallery-wrap">
                    <div class="img-big-wrap">
                        <div class="item-gallery"> <img src="/img/<?= $product['sampul']; ?>" class="w-100 h-100">
                        </div>
                    </div>
                </article>
            </aside>
            <aside class="col-sm-7">
                <article class="card-body p-5">
                    <h3 class="title mb-3"><?= $product['judul']; ?></h3>

                    <p class="price-detail-wrap">
                        <span class="price h3 text-warning">
                            <?php function rupiah($angka)
                            {
                                $hasil_rupiah = "Rp" . number_format($angka, 2, ',', '.');
                                return $hasil_rupiah;
                            } ?>
                            <span class="currency"></span><span class="num"><?= rupiah($product['price']) ?></span>
                        </span>
                    </p>
                    <dl class="item-property">
                        <dt>Description</dt>
                        <dd>
                            <p><?= $product['description']; ?></p>
                        </dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Address</dt>
                        <dd><?= $product['address']; ?></dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Owner</dt>
                        <dd><?= $product['created_by']; ?></dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Created At</dt>
                        <dd><?= $product['created_at']; ?></dd>
                    </dl>
                    <hr>
                    <form action="/pages/bidProduct/<?= $product['slug']; ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="username" value="<?= user() === null ? '' : user()->username; ?>">
                        <input type="hidden" name="product" value="<?= $product['judul']; ?>">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control <?= ($validation->hasError('bid')) ? 'is-invalid' : ''; ?>" placeholder="place your bid" name="bid" required autofocus>
                            <button class="btn btn-outline-secondary" <?php if (!logged_in()) : ?> disabled <?php endif; ?> type="submit" id="button-addon2" name="submit">BID</button>
                        </div>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div style="color: red;">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                    </form>
                </article>
            </aside>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>