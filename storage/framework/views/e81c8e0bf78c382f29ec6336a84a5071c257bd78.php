<?php if(!empty($currencies) and count($currencies)): ?>
    <?php
        $userCurrency = currency();
    ?>

    <div class="js-currency-select custom-dropdown position-relative admin-navbar-currency mr-2 mr-md-3">
        <form action="/set-currency" method="post" class="mb-0">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="currency" value="<?php echo e($userCurrency); ?>">
            <?php if(!empty($previousUrl)): ?>
                <input type="hidden" name="previous_url" value="<?php echo e($previousUrl); ?>">
            <?php endif; ?>

            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencyItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($userCurrency == $currencyItem->currency): ?>
                    <div class="custom-dropdown-toggle d-flex align-items-center cursor-pointer w-100">
                        <div class="mr-1 text-black">
                            <span class="js-lang-title font-14"><?php echo e($currencyItem->currency); ?> (<?php echo e(currencySign($currencyItem->currency)); ?>)</span>
                        </div>
                        <i class="fa fa-chevron-down"></i>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </form>

        <div class="custom-dropdown-body py-2">

            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencyItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="js-currency-dropdown-item custom-dropdown-body__item cursor-pointer <?php echo e(($userCurrency == $currencyItem->currency) ? 'active' : ''); ?>" data-value="<?php echo e($currencyItem->currency); ?>" data-title="<?php echo e($currencyItem->currency); ?> (<?php echo e(currencySign($currencyItem->currency)); ?>)">
                    <div class=" d-flex align-items-center w-100 px-2 py-1 text-gray bg-transparent">
                        <div class="size-32 position-relative d-flex-center bg-gray100 rounded-sm">
                            <?php echo e(currencySign($currencyItem->currency)); ?>

                        </div>

                        <span class="ml-1 font-14"><?php echo e(currenciesLists($currencyItem->currency)); ?></span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/includes/navbar/currency.blade.php ENDPATH**/ ?>