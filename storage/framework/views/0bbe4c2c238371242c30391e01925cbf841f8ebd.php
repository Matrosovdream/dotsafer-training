<div class="dropdown">
    <button type="button" class="btn btn-transparent dropdown-toggle" <?php echo e((empty($unReadNotifications) or count($unReadNotifications) < 1) ? 'disabled' : ''); ?> id="navbarNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i data-feather="bell" width="20" height="20" class="mr-10"></i>

        <?php if(!empty($unReadNotifications) and count($unReadNotifications)): ?>
            <span class="badge badge-circle-danger d-flex align-items-center justify-content-center"><?php echo e(count($unReadNotifications)); ?></span>
        <?php endif; ?>
    </button>

    <div class="dropdown-menu pt-20" aria-labelledby="navbarNotification">
        <div class="d-flex flex-column h-100">
            <div class="mb-auto navbar-notification-card" data-simplebar>
                <div class="d-md-none border-bottom mb-20 pb-10 text-right">
                    <i class="close-dropdown" data-feather="x" width="32" height="32" class="mr-10"></i>
                </div>

                <?php if(!empty($unReadNotifications) and count($unReadNotifications)): ?>

                    <div class="d-flex align-items-center p-15 border rounded-sm">
                        <div class="d-flex-center size-40 rounded-circle bg-gray100">
                            <i data-feather="bell" width="20" height="20" class="text-gray"></i>
                        </div>
                        <div class="ml-5">
                            <div class="text-secondary font-14"><span class="font-weight-bold"><?php echo e(count($unReadNotifications)); ?></span> <?php echo e(trans('panel.notifications')); ?></div>

                            <a href="/panel/notifications/mark-all-as-read" class="delete-action d-block mt-5 font-12 cursor-pointer text-hover-primary" data-title="<?php echo e(trans('update.convert_unread_messages_to_read')); ?>" data-confirm="<?php echo e(trans('update.yes_convert')); ?>">
                                <?php echo e(trans('update.mark_all_notifications_as_read')); ?>

                            </a>
                        </div>
                    </div>

                    <?php $__currentLoopData = $unReadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unReadNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/panel/notifications?notification=<?php echo e($unReadNotification->id); ?>">
                            <div class="navbar-notification-item border-bottom">
                                <h4 class="font-14 font-weight-bold text-secondary"><?php echo e($unReadNotification->title); ?></h4>
                                <span class="notify-at d-block mt-5"><?php echo e(dateTimeFormat($unReadNotification->created_at,'j M Y | H:i')); ?></span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>
                    <div class="d-flex align-items-center text-center py-50">
                        <i data-feather="bell" width="20" height="20" class="mr-10"></i>
                        <span class=""><?php echo e(trans('notification.empty_notifications')); ?></span>
                    </div>
                <?php endif; ?>

            </div>

            <?php if(!empty($unReadNotifications) and count($unReadNotifications)): ?>
                <div class="mt-10 navbar-notification-action">
                    <a href="/panel/notifications" class="btn btn-sm btn-danger btn-block"><?php echo e(trans('notification.all_notifications')); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/includes/notification-dropdown.blade.php ENDPATH**/ ?>