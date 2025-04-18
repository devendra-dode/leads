<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Blog</li>
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
                            <h3 class="card-title">Edit Blog</h3>
                        </div>

                        <form action="<?= base_url('blog/update/' . $blog['blogId']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option value="">-- Select Category --</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category['name']; ?>" 
                                                <?= (strtolower($blog['category']) == strtolower($category['name'])) ? 'selected' : ''; ?>>
                                                <?= esc($category['name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="blogName">Blog Name</label>
                                    <input type="text" class="form-control" id="blogName" name="blog_name" value="<?= old('blog_name', $blog['name']) ?>" placeholder="Enter blog name" required>
                                </div>

                                <div class="form-group">
                                    <label for="shortDescription">Short Description</label>
                                    <textarea class="form-control" id="shortDescription" name="short_description" rows="3" placeholder="Enter short description" required><?= old('short_description', $blog['short_description']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required><?= old('description', $blog['details']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="blogImage">Blog Image (PNG, JPG, WEBP) <small>(Optional)</small></label>
                                    <input type="file" class="form-control" id="blogImage" name="blog_image" accept="image/*">
                                    <?php if (!empty($blog['image'])): ?>
                                        <img src="<?= $blog['image'] ?>" alt="Blog Image" class="mt-2 img-thumbnail" width="150">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="<?= base_url('/blog') ?>" class="btn btn-secondary">Cancel</a>
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