<?php if(!empty($purchaseNotifications) and count($purchaseNotifications)): ?>

    <script>
        (function () {
            "use strict";

            <?php $__currentLoopData = $purchaseNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchaseNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($purchaseNotification->content)): ?>
            setTimeout(function () {
                $.toast({
                    heading: '',
                    text: `<a href="<?php echo e($purchaseNotification->content->getUrl()); ?>" target="_blank">
                        <div class="purchase-notification d-flex w-100 h-100">
                            <div class="purchase-notification-image">
                                <img src="<?php echo e($purchaseNotification->content->getImage()); ?>" alt="<?php echo e($purchaseNotification->content->title); ?>" class="img-cover">
                            </div>
                            <div class="ml-10">
                                <h4 class="font-14 font-weight-bold text-dark"><?php echo e($purchaseNotification->notif_title); ?></h4>
                                <p class="mt-5 font-12 text-gray"><?php echo e($purchaseNotification->notif_subtitle); ?></p>

                                <div class="mt-10 font-10 purchase-notification-time"><?php echo e($purchaseNotification->time); ?></div>
                            </div>
                        </div>
                    </a>`,
                    bgColor: 'white',
                    hideAfter: Number('<?php echo e(!empty($purchaseNotification->popup_duration) ? ($purchaseNotification->popup_duration * 1000) : 5000); ?>'),
                    position: 'bottom-right',
                    allowToastClose : true,
                    loaderBg: 'var(--primary)',
                });
            }, Number('<?php echo e(!empty($purchaseNotification->popup_delay) ? ($purchaseNotification->popup_delay * 1000) : 0); ?>'))
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        })(jQuery)
    </script>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/includes/purchase_notifications.blade.php ENDPATH**/ ?>