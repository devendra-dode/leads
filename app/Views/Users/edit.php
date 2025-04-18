<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <?php include APPPATH . 'Views/messages.php'; ?>  <!-- Include Messages Here -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Edit User</h3>
                        </div>

                        <form action="<?= base_url('user/update/' . $user['userId']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $user['name']) ?>" placeholder="Enter full name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $user['email']) ?>" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?= old('mobile', $user['mobile']) ?>" placeholder="Enter mobile number" required>
                                </div>

                                <div class="form-group">
                                    <label for="alternate_mobile">Alternate Mobile</label>
                                    <input type="text" class="form-control" id="alternate_mobile" name="alternate_mobile" value="<?= old('alternate_mobile', $user['alternate_mobile']) ?>" placeholder="Enter alternate mobile">
                                </div>

                                <div class="form-group">
                                    <label for="addhar_no">Aadhar Number</label>
                                    <input type="text" class="form-control" id="addhar_no" name="addhar_no" value="<?= old('addhar_no', $user['addhar_no']) ?>" placeholder="Enter Aadhar Number">
                                </div>

                                <div class="form-group">
                                    <label for="pan_no">PAN Number</label>
                                    <input type="text" class="form-control" id="pan_no" name="pan_no" value="<?= old('pan_no', $user['pan_no']) ?>" placeholder="Enter PAN Number">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address"><?= old('address', $user['address']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="address">Office Address</label>
                                    <textarea class="form-control" id="office_address" name="office_address" rows="3" placeholder="Enter office address"><?= old('address', $user['office_address']) ?></textarea>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="<?= base_url('/users') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

