<?php $__env->startSection('content'); ?>
    <?php
        $get404ErrorPageSettings = get404ErrorPageSettings();
    ?>

    <section class="my-50 container text-center">
        <div class="row justify-content-md-center">
            <div class="col col-md-6">
                <img src="<?php echo e($get404ErrorPageSettings['error_image'] ?? ''); ?>" class="img-cover " alt="">
            </div>
        </div>

        <h2 class="mt-25 font-36"><?php echo e($get404ErrorPageSettings['error_title'] ?? ''); ?></h2>
        <p class="mt-25 font-16"><?php echo e($get404ErrorPageSettings['error_description'] ?? ''); ?></p>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/errors/404.blade.php ENDPATH**/ ?>