<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <section class="py-5">
                <div class="" style="display: grid;grid-template-columns: repeat(2,1fr);grid-gap: 1rem;">
                    <?php foreach ($review as $r) : ?>
                        <!-- CUSTOM BLOCKQUOTE -->
                        <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded col-sm">
                            <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa fa-quote-left text-white"></i></div>
                            <p class="mb-0 mt-2 font-italic">"<?= $r['description']; ?><a href="#" class="text-info">@<?= $r['nama']; ?></a>."</p>
                            <footer class="blockquote-footer pt-4 mt-4 border-top">created at
                                <cite title="Source Title"><?= $r['created_at']; ?></cite>
                            </footer>
                        </blockquote><!-- END -->
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>