<?php if(!empty($cashbackRules) and count($cashbackRules) and !empty($itemPrice) and $itemPrice > 0): ?>
    <?php $__currentLoopData = $cashbackRules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashbackRule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex align-items-center mt-20 p-15 success-transparent-alert <?php echo e($classNames ?? ''); ?>">
            <div class="success-transparent-alert__icon d-flex align-items-center justify-content-center">
                <i data-feather="credit-card" width="18" height="18" class=""></i>
            </div>

            <div class="ml-10">
                <div class="font-14 font-weight-bold "><?php echo e(trans('update.get_cashback')); ?></div>

                <?php if(!empty($itemType) and $itemType == 'meeting'): ?>
                    <?php if($cashbackRule->min_amount): ?>
                        <div class="font-12 "><?php echo e(trans('update.by_reserving_a_this_meeting_you_will_get_amount_as_cashback_for_orders_more_than_min_amount',['amount' => handlePrice($cashbackRule->getAmount($itemPrice)), 'min_amount' => handlePrice($cashbackRule->min_amount)])); ?></div>
                    <?php else: ?>
                        <div class="font-12 "><?php echo e(trans('update.by_reserving_a_this_meeting_you_will_get_amount_as_cashback',['amount' => handlePrice($cashbackRule->getAmount($itemPrice))])); ?></div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if($cashbackRule->min_amount): ?>
                        <div class="font-12 "><?php echo e(trans('update.by_purchasing_this_product_you_will_get_amount_as_cashback_for_orders_more_than_min_amount',['amount' => handlePrice($cashbackRule->getAmount($itemPrice)), 'min_amount' => handlePrice($cashbackRule->min_amount)])); ?></div>
                    <?php else: ?>
                        <div class="font-12 "><?php echo e(trans('update.by_purchasing_this_product_you_will_get_amount_as_cashback',['amount' => handlePrice($cashbackRule->getAmount($itemPrice))])); ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/includes/cashback_alert.blade.php ENDPATH**/ ?>