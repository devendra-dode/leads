<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Lead</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Lead</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <?php include APPPATH . 'Views/messages.php'; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Edit Lead</h3>
                        </div>

                        <form action="<?= base_url('lead/update/' . $lead['leadId']) ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="card-body">

                              <input type="hidden" class="form-control" id="userId" name="userId" value="<?= old('userId', $lead['userId']) ?>" required>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="New" <?= ($lead['status'] == 'New') ? 'selected' : '' ?>>New</option>
                                        <option value="Process" <?= ($lead['status'] == 'Process') ? 'selected' : '' ?>>Process</option>
                                        <option value="Completed" <?= ($lead['status'] == 'Completed') ? 'selected' : '' ?>>Complete</option>
                                        <option value="Rejected" <?= ($lead['status'] == 'Rejected') ? 'selected' : '' ?>>Rejected</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $lead['name']) ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?= old('mobile', $lead['mobile']) ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="loan_type">Loan Type</label>
                                    <input type="text" class="form-control" id="loan_type" name="loan_type" value="<?= old('loan_type', $lead['loan_type']) ?>">
                                </div>

                                <div class="form-group">
                                    <label for="loan_amount">Loan Amount</label>
                                    <input type="number" class="form-control" id="loan_amount" name="loan_amount" value="<?= old('loan_amount', $lead['loan_amount']) ?>">
                                </div>


                                <div class="form-group">
                                    <label for="alternate_mobile">Alternate Mobile</label>
                                    <input type="text" class="form-control" id="alternate_mobile" name="alternate_mobile" value="<?= old('alternate_mobile', $lead['alternate_mobile']) ?>" placeholder="Enter alternate mobile">
                                </div>

                                <div class="form-group">
                                    <label for="addhar_no">Aadhar Number</label>
                                    <input type="text" class="form-control" id="addhar_no" name="addhar_no" value="<?= old('addhar_no', $lead['addhar_no']) ?>" placeholder="Enter Aadhar Number">
                                </div>

                                <div class="form-group">
                                    <label for="pan_no">PAN Number</label>
                                    <input type="text" class="form-control" id="pan_no" name="pan_no" value="<?= old('pan_no', $lead['pan_no']) ?>" placeholder="Enter PAN Number">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address"><?= old('address', $lead['address']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="address">Office Address</label>
                                    <textarea class="form-control" id="office_address" name="office_address" rows="3" placeholder="Enter office address"><?= old('address', $lead['office_address']) ?></textarea>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="<?= base_url('/lead') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
