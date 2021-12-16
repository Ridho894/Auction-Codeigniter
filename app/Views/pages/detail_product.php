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
                    </div> <!-- slider-product.// -->
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <aside class="col-sm-7">
                <article class="card-body p-5">
                    <h3 class="title mb-3"><?= $product['judul']; ?></h3>

                    <p class="price-detail-wrap">
                        <span class="price h3 text-warning">
                            <span class="currency">ID RP</span><span class="num"><?= $product['price']; ?></span>
                        </span>
                    </p> <!-- price-detail-wrap .// -->
                    <dl class="item-property">
                        <dt>Description</dt>
                        <dd>
                            <p><?= $product['description']; ?></p>
                        </dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Model#</dt>
                        <dd>12345611</dd>
                    </dl> <!-- item-property-hor .// -->
                    <dl class="param param-feature">
                        <dt>Published</dt>
                        <dd>
                            <p><?= $product['created_at']; ?></p>
                        </dd>
                    </dl> <!-- item-property-hor .// -->
                    <dl class="param param-feature">
                        <dt>Address</dt>
                        <dd>
                            <p><?= $product['address']; ?></p>
                        </dd>
                    </dl> <!-- item-property-hor .// -->
                    <hr>
                    <form action="/pages/bidProduct" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control  <?= ($validation->hasError('bid')) ? 'is-invalid' : ''; ?>" placeholder="place your bid" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">BID</button>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('bid'); ?>
                        </div>
                    </form>
                </article> <!-- card-body.// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card.// -->


</div>
<!--container.//-->
<?= $this->endSection(); ?>