<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<form class="container rounded bg-white mt-5 mb-5" method="POST" action="/pages/update/<?= $user['id']; ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://bootdey.com/img/Content/avatar/avatar7.png"><span class="font-weight-bold"><?= $user['username']; ?></span><span class="text-black-50"><?= $user['email']; ?></span><span> </span></div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input name="username" type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="first name" value="<?= (old('username')) ? old('username') : $user['username'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" class="form-control <?= ($validation->hasError('phone_number')) ? 'is-invalid' : ''; ?>" placeholder="enter phone number" value="<?= (old('phone_number')) ? old('phone_number') : $user['phone_number'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('phone_number'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" placeholder="enter address" value="<?= (old('address')) ? old('address') : $user['address'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('address'); ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div> -->
                <div class="mt-5 text-center">
                    <input class="btn btn-primary profile-button" type="submit" value="Save">
                    <a href="/pages/profile" class="btn btn-danger profile-button" type="button">Cancel</a>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
    </div>
</form>
<?= $this->endSection(); ?>