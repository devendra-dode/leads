<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Meta Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Meta</li>
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
                            <h3 class="card-title">Edit Meta Details</h3>
                        </div>

                        <form action="<?= base_url('seo-meta/update/' . $meta['id']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="metaTitle">Page/Service Name</label>
                                    <input type="text" class="form-control" id="page" name="page_name"  value="<?=  $meta['page_name'] ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="metaTitle">Meta Title</label>
                                    <input type="text" class="form-control" id="metaTitle" name="meta_title" value="<?= old('meta_title', $meta['meta_title']) ?>" placeholder="Enter meta title" required>
                                </div>

                                <div class="form-group">
                                    <label for="metaKeywords">Meta Keywords</label>
                                    <input type="text" class="form-control" id="metaKeywords" name="meta_keywords" value="<?= old('meta_keywords', $meta['meta_keywords']) ?>" placeholder="Enter meta keywords (comma-separated)" required>
                                </div>

                                <div class="form-group">
                                    <label for="metaDescription">Meta Description</label>
                                    <textarea class="form-control" id="metaDescription" name="meta_description" rows="3" placeholder="Enter meta description" required><?= old('meta_description', $meta['meta_description']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="metaImage">Meta Image (PNG, JPG, WEBP) <small>(Optional)</small></label>
                                    <input type="file" class="form-control" id="metaImage" name="meta_image" accept="image/*">
                                    <?php if (!empty($meta['og_image'])): ?>
                                        <img src="<?= $meta['og_image'] ?>" alt="Meta Image" class="mt-2 img-thumbnail" width="150">
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="<?= base_url('/seo-meta') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
