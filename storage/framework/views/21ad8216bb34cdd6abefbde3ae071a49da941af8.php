<?php
    $time=time();
    $productBadges = \App\Models\ProductBadgeContent::query()
                    ->where('targetable_id', $itemTarget->id)
                    ->where('targetable_type', $itemTarget->getMorphClass())
                    ->whereHas('badge', function ($query) use ($time) {
                        $query->where('enable', true);

                        $query->where(function ($query) use ($time) {
                            $query->whereNull('start_at');
                            $query->orWhere('start_at', '<', $time);
                        });

                        $query->where(function ($query) use ($time) {
                            $query->whereNull('end_at');
                            $query->orWhere('end_at', '>', $time);
                        });
                    })
                    ->with(['badge'])
                    ->get();
?>


<?php if($productBadges->isNotEmpty()): ?>
    <?php $__currentLoopData = $productBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productBadge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="badge d-flex align-items-center" style="color: <?php echo e($productBadge->badge->color); ?>; background-color: <?php echo e($productBadge->badge->background); ?>">
            <?php if(!empty($productBadge->badge->icon)): ?>
                <div class="size-32 mr-5">
                    <img src="<?php echo e($productBadge->badge->icon); ?>" alt="<?php echo e($productBadge->badge->title); ?>" class="img-cover">
                </div>
            <?php endif; ?>

            <span class=""><?php echo e($productBadge->badge->title); ?></span>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/includes/product_custom_badge.blade.php ENDPATH**/ ?>