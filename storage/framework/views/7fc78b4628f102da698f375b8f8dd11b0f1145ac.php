<button type="button" class="sidebar-close">
    <i class="fa fa-times"></i>
</button>

<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">

    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">

        <?php echo $__env->make('admin.includes.navbar.language', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('admin.includes.navbar.currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(!empty(getAiContentsSettingsName("status")) and !empty(getAiContentsSettingsName("active_for_admin_panel"))): ?>
            <div class="js-show-ai-content-drawer show-ai-content-drawer-btn d-flex-center mr-4">
                <div class="d-flex-center size-32 rounded-circle bg-white">
                    <img src="/assets/default/img/ai/ai-chip.svg" alt="ai" class="" width="16px" height="16px">
                </div>
                <span class="ml-1 font-weight-500 font-14"><?php echo e(trans('update.ai_content')); ?></span>
            </div>
        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_list')): ?>

        <li class="dropdown dropdown-list-toggle">
                <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
                    <i class="fa fa-info-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-list-icons mb-0" height="150px">
                            <a href="https://codecanyon.net/user/rocketsoft/portfolio" class="dropdown-item">
                                <div class="dropdown-item-icon bg-info text-white d-flex align-items-center justify-content-center">
                                    <i class="fa fa-info"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                   Rocket LMS Version 1.9.7
                                   <div class="time text-primary">All rights reserved for Rocket Soft</div>
                                </div>
                            </a>
                    </div>
                </div>
            </li>


            <li class="dropdown dropdown-list-toggle">
                <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php if(!empty($unreadNotifications) and count($unreadNotifications)): ?> beep <?php else: ?> disabled <?php endif; ?>">
                    <i class="far fa-bell"></i>
                </a>

                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header"><?php echo e(trans('admin/main.notifications')); ?>

                        <div class="float-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_markAllRead')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/notifications/mark_all_read"><?php echo e(trans('admin/main.mark_all_read')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="dropdown-list-content dropdown-list-icons">
                        <?php $__currentLoopData = $unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unreadNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/notifications" class="dropdown-item">
                                <div class="dropdown-item-icon bg-info text-white d-flex align-items-center justify-content-center">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    <?php echo e($unreadNotification->title); ?>

                                    <div class="time text-primary"><?php echo e(dateTimeFormat($unreadNotification->created_at,'Y M j | H:i')); ?></div>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="dropdown-footer text-center">
                        <a href="<?php echo e(getAdminPanelUrl()); ?>/notifications"><?php echo e(trans('admin/main.view_all')); ?> <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </li>
        <?php endif; ?>

        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo e($authUser->getAvatar()); ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?php echo e($authUser->full_name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                 <a href="/" class="dropdown-item has-icon">
                    <i class="fas fa-globe"></i> <?php echo e(trans('admin/main.show_website')); ?>

                </a>

                <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($authUser->id); ?>/edit" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> <?php echo e(trans('admin/main.change_password')); ?>

                </a>

                <div class="dropdown-divider"></div>
                <a href="<?php echo e(getAdminPanelUrl()); ?>/logout" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> <?php echo e(trans('admin/main.logout')); ?>

                </a>
            </div>
        </li>
    </ul>
</nav>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/includes/navbar.blade.php ENDPATH**/ ?>