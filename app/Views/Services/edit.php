<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Service</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Edit Service</h3>
                        </div>

                        <form action="<?= base_url('service/update/' . $service['serviceId']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="serviceName">Service Name</label>
                                    <input type="text" class="form-control" id="serviceName" name="service_name" value="<?= old('service_name', $service['name']) ?>" placeholder="Enter service name" required>
                                </div>

                                <div class="form-group">
                                    <label for="serviceIcon">Service Icon (PNG, JPG)</label>
                                    <input type="text" class="form-control" id="serviceIcon" name="service_icon" value="<?= old('service_icon', $service['icon']) ?>" placeholder="Enter service icon" required>
                                </div>

                                <div class="form-group">
                                    <label for="shortDescription">Short Description</label>
                                    <textarea class="form-control" id="shortDescription" name="short_description" rows="3" placeholder="Enter short description" required><?= old('short_description', $service['short_description']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required><?= old('description', $service['details']) ?></textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="<?= base_url('/service') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description'); 
</script>