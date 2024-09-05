
<?php if(!empty($bundle->bundleWebinars) and $bundle->bundleWebinars->count() > 0): ?>
    <div class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('product.courses')); ?></h2>

        <?php $__currentLoopData = $bundle->bundleWebinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundleWebinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($bundleWebinar->webinar)): ?>
                <?php echo $__env->make('web.default.includes.webinar.list-card',['webinar' => $bundleWebinar->webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/bundle/tabs/content.blade.php ENDPATH**/ ?>