<?php
    $advertisingModalSettings = getAdvertisingModalSettings();
?>

<?php if(!empty($advertisingModalSettings)): ?>
    <div class="d-none" id="advertisingModalSettings">
        <div class="d-flex align-items-center justify-content-between">
            <h3 class="section-title font-16 text-dark-blue mb-10"><?php echo e($advertisingModalSettings['title'] ?? ''); ?></h3>

            <button type="button" class="btn-close-advertising-modal close-swl btn-transparent d-flex">
                <i data-feather="x" width="25" height="25" class=""></i>
            </button>
        </div>

        <div class="d-flex align-items-center justify-content-center">
            <img src="<?php echo e($advertisingModalSettings['image'] ?? ''); ?>" class="img-fluid rounded-lg" alt="<?php echo e($advertisingModalSettings['title'] ?? 'ads'); ?>">
        </div>

        <p class="font-14 text-gray mt-20"><?php echo $advertisingModalSettings['description'] ?? ''; ?></p>

        <div class="row align-items-center mt-20">
            <?php if(!empty($advertisingModalSettings['button1']) and !empty($advertisingModalSettings['button1']['link']) and !empty($advertisingModalSettings['button1']['title'])): ?>
                <div class="col-6">
                    <a href="<?php echo e($advertisingModalSettings['button1']['link']); ?>" class="btn btn-primary btn-sm btn-block"><?php echo e($advertisingModalSettings['button1']['title']); ?></a>
                </div>
            <?php endif; ?>

            <?php if(!empty($advertisingModalSettings['button2']) and !empty($advertisingModalSettings['button2']['link']) and !empty($advertisingModalSettings['button2']['title'])): ?>
                <div class="col-6">
                    <a href="<?php echo e($advertisingModalSettings['button2']['link']); ?>" class="btn btn-outline-primary btn-sm btn-block"><?php echo e($advertisingModalSettings['button2']['title']); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/includes/advertise_modal/index.blade.php ENDPATH**/ ?>