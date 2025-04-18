<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Text Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Text Slider</li>
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
                            <h3 class="card-title">Create Text Slider</h3>
                        </div>

                        <form action="<?= base_url('homeTextSlider/store') ?>" method="post" enctype="multipart/form-data">
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
                                    <label for="pageName">Name</label>
                                    <input type="text" class="form-control" id="pageName" name="name" value="<?= old('name') ?>" placeholder="Enter name" required>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="<?= base_url('/homeTextSlider') ?>" class="btn btn-secondary">Cancel</a>
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
