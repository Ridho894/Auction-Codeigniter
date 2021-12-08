<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact</h1>
            <?php foreach ($Alamat as $a) : ?>
                <ul>
                    <li><?= $a['tipe']; ?></li>
                    <li><?= $a['jalan']; ?></li>
                    <li><?= $a['kota']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>