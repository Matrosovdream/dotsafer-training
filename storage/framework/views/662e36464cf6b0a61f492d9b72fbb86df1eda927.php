<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(!empty($group) ? trans('admin/main.edit') : ''); ?> <?php echo e(trans('admin/main.user_group')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.new_user_group')); ?></div>
            </div>
        </div>


        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <?php if(!empty($group)): ?>
                                <ul class="nav nav-pills" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true"><?php echo e(trans('admin/main.main_general')); ?></a>
                                    </li>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_update_group_registration_package')): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" id="registrationPackage-tab" data-toggle="tab" href="#registrationPackage" role="tab" aria-controls="registrationPackage" aria-selected="true"><?php echo e(trans('update.registration_package')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>

                            <div class="tab-content" id="myTabContent2">
                                <?php echo $__env->make('admin.users.groups.tabs.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php if(!empty($group)): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_update_group_registration_package')): ?>
                                        <?php echo $__env->make('admin.users.groups.tabs.registration_package', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/users/groups/new.blade.php ENDPATH**/ ?>