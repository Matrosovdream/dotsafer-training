<?php if(!empty($currencies) and count($currencies)): ?>
    <?php
        $userCurrency = currency();
    ?>

    <div class="js-currency-select custom-dropdown position-relative">
        <form action="/set-currency" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="currency" value="<?php echo e($userCurrency); ?>">
            <?php if(!empty($previousUrl)): ?>
                <input type="hidden" name="previous_url" value="<?php echo e($previousUrl); ?>">
            <?php endif; ?>

            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencyItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($userCurrency == $currencyItem->currency): ?>
                    <div class="custom-dropdown-toggle d-flex align-items-center cursor-pointer">
                        <div class="mr-5 text-secondary">
                            <span class="js-lang-title font-14"><?php echo e($currencyItem->currency); ?> (<?php echo e(currencySign($currencyItem->currency)); ?>)</span>
                        </div>
                        <i data-feather="chevron-down" class="icons" width="14px" height="14px"></i>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </form>

        <div class="custom-dropdown-body py-10">

            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencyItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="js-currency-dropdown-item custom-dropdown-body__item cursor-pointer <?php echo e(($userCurrency == $currencyItem->currency) ? 'active' : ''); ?>" data-value="<?php echo e($currencyItem->currency); ?>" data-title="<?php echo e($currencyItem->currency); ?> (<?php echo e(currencySign($currencyItem->currency)); ?>)">
                    <div class=" d-flex align-items-center w-100 px-15 py-5 text-gray bg-transparent">
                        <div class="size-32 position-relative d-flex-center bg-gray100 rounded-sm">
                            <?php echo e(currencySign($currencyItem->currency)); ?>

                        </div>

                        <span class="ml-5 font-14"><?php echo e(currenciesLists($currencyItem->currency)); ?></span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/includes/top_nav/currency.blade.php ENDPATH**/ ?>