<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Page</li>
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
                            <h3 class="card-title">Edit Page</h3>
                        </div>

                        <form action="<?= base_url('pages/update/' . $page['serviceId']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="card-body">


                                <div class="form-group">
                                    <label for="pageCategory">Page Category</label>
                                    <select class="form-control" id="serviceCategory" name="page_category" required>
                                        <option value="">Select Category</option>
                                        <?php foreach (PAGE_CATEGORY as $category): ?>
                                            <option value="<?= $category ?>" 
                                                <?= (old('page_category', $page['type'] ?? '') == $category) ? 'selected' : '' ?>>
                                                <?= $category ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="pageName">Name</label>
                                    <input type="text" class="form-control" id="pageName" name="page_name" value="<?= old('name', $page['name']) ?>" placeholder="Enter name" required>
                                </div>

                                <div class="form-group">
                                    <label for="shortDescription">Short Description</label>
                                    <textarea class="form-control" id="shortDescription" name="short_description" rows="5" placeholder="Enter short description" required><?= old('short_description', $page['short_description']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="25" placeholder="Enter description" required><?= old('description', $page['details']) ?></textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="<?= base_url('/pages') ?>" class="btn btn-secondary">Cancel</a>
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
    CKEDITOR.replace('description111'); 
</script>