<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<form method="POST" action="/product/save" enctype="multipart/form-data" autocomplete="off">
    <?= csrf_field(); ?>
    <input type="hidden" name="created_by" value="<?= user()->username; ?>">
    <div class="col-md-8 offset-md-2">
        <span class="anchor" id="formUserEdit"></span>
        <hr class="">
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">Add Product</h3>
            </div>
            <div class="card-body">
                <form class="form" role="form" autocomplete="off">
                    <div class="form-group row">
                        <label for="judul" class="col-lg-3 col-form-label form-control-label">Title</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-lg-3 col-form-label form-control-label">Price</label>
                        <div class="col-lg-9">
                            <input type="number" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="price" name="price" value="<?= old('price'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('price'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-lg-3 col-form-label form-control-label">Description</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>" id="description" name="description" value="<?= old('description'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('description'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-lg-3 col-form-label form-control-label">Address</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id="address" name="address" value="<?= old('address'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('address'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sampul" class="col-sm-3 col-form-label">Picture</label>
                        <div class="col-sm-2">
                            <img src="/img/default.jpg" class="img-thumbnail img-preview" />
                        </div>
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="btn btn-primary custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('sampul'); ?>
                                </div>
                                <label class="custom-file-label" for="sampul">Select Image</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <a class="btn btn-danger" href="/pages/profile">Cancel</a>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>