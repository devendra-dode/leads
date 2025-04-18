<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php if (session()->has('validation')) : ?>
                <div class="alert alert-danger">
                    <?php foreach (session('validation')->getErrors() as $error) : ?>
                        <p><?= esc($error) ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger">
                    <?php 
                    $errors = session('error'); 
                    if (is_array($errors)) {
                        foreach ($errors as $error) : ?>
                            <p><?= esc($error) ?></p>
                        <?php endforeach; 
                    } else { ?>
                        <p><?= esc($errors) ?></p>
                    <?php } ?>
                </div>
            <?php endif ?>

            <?php if (session()->has('errors')) : ?>
                <div class="alert alert-danger">
                    <?php 
                    $errors = session('errors'); 
                    if (is_array($errors)) {
                        foreach ($errors as $error) : ?>
                            <p><?= esc($error) ?></p>
                        <?php endforeach; 
                    } else { ?>
                        <p><?= esc($errors) ?></p>
                    <?php } ?>
                </div>
            <?php endif ?>

            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success">
                    <p><?= esc(session('success')) ?></p>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
