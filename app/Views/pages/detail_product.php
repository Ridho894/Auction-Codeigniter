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
                            <p>Here goes description consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco </p>
                        </dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Created By</dt>
                        <dd><?= $product['created_by']; ?></dd>
                    </dl> <!-- item-property-hor .// -->
                    <dl class="param param-feature">
                        <dt>Color</dt>
                        <dd>Black and white</dd>
                    </dl> <!-- item-property-hor .// -->
                    <dl class="param param-feature">
                        <dt>Delivery</dt>
                        <dd>Russia, USA, and Europe</dd>
                    </dl> <!-- item-property-hor .// -->
                    <hr>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="place your bid" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">BID</button>
                    </div>
                </article> <!-- card-body.// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card.// -->


</div>
<!--container.//-->
<?= $this->endSection(); ?>