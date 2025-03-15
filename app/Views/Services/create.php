<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Service</li>
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
                            <h3 class="card-title">Create Service</h3>
                        </div>

                        <form action="<?= base_url('service/store') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <?php if (session()->has('errors')) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach (session('errors') as $error) : ?>
                                        <p><?= esc($error) ?></p>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>

                            <?php if (session()->has('success')) : ?>
                                <div class="alert alert-success">
                                    <?= session('success') ?>
                                </div>
                            <?php endif ?>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="serviceName">Service Name</label>
                                    <input type="text" class="form-control" id="serviceName" name="service_name" value="<?= old('service_name') ?>" placeholder="Enter service name" required>
                                </div>

                                <div class="form-group">
                                    <label for="serviceIcon">Service Icon (PNG, JPG)</label>
                                    <input type="text" class="form-control" id="serviceIcon" name="service_icon" value="<?= old('service_icon') ?>" placeholder="Enter service icon" required>
                                </div>

                                <div class="form-group">
                                    <label for="shortDescription">Short Description</label>
                                    <textarea class="form-control" id="shortDescription" name="short_description" rows="3" placeholder="Enter short description" required><?= old('short_description') ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required><?= old('description') ?></textarea>
                                </div>

                                <!-- Meta Data Fields -->
                                <div class="form-group">
                                    <label for="metaTitle">Meta Title</label>
                                    <input type="text" class="form-control" id="metaTitle" name="meta_title" value="<?= old('meta_title') ?>" placeholder="Enter SEO meta title">
                                </div>

                                <div class="form-group">
                                    <label for="metaDescription">Meta Description</label>
                                    <textarea class="form-control" id="metaDescription" name="meta_description" rows="2" placeholder="Enter SEO meta description"><?= old('meta_description') ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="metaKeywords">Meta Keywords</label>
                                    <input type="text" class="form-control" id="metaKeywords" name="meta_keywords" value="<?= old('meta_keywords') ?>" placeholder="Enter keywords separated by commas">
                                </div>

                                <div class="form-group">
                                    <label for="metaImage">Meta Image (PNG, JPG)</label>
                                    <input type="file" class="form-control-file" id="metaImage" name="image_image" accept="image/*">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="<?= base_url('/service') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description'); 
</script>
