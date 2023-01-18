<?= $this->extend("layout/admin/layout"); ?>
<?= $this->section("content"); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit <?= $title; ?></h1>
        </div>
    </section>
    <form method="POST" action="/admin/update/<?= $user['id']; ?>" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" value="<?= (old('username')) ? old('username') : $user['username'] ?>" name="username" placeholder="Username" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" value="<?= (old('email')) ? old('email') : $user['email'] ?>" name="email" placeholder="Email" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Negara</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="address">
                            <option value="Indonesia">Indonesia</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Singapore">Singapore</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">No Telepon</label>
                    <div class="col-sm-9">
                        <input type="number" value="<?= (old('phone_number')) ? old('phone_number') : $user['phone_number'] ?>" name="phone_number" placeholder="Nomor Telepon" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="active" class="form-control">
                            <option value="1">AKTIF</option>
                            <option value="0">NONAKTIF</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">
                    ADD
                </button>
                <a href="/admin/user" class="btn btn-danger">
                    CANCEL
                </a>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>