<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.roles')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.roles')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th><?php echo e(trans('admin/main.users_count')); ?></th>
                                        <th><?php echo e(trans('admin/main.is_admin')); ?></th>
                                        <th><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($role->id); ?></td>
                                            <td class="text-left"><?php echo e($role->caption); ?></td>
                                            <td><?php echo e($role->users->count()); ?></td>
                                            <td>
                                                <?php if($role->is_admin): ?>
                                                    <span class="text-success fas fa-check"></span>
                                                <?php else: ?>
                                                    <span class="text-danger fas fa-times"></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(dateTimeFormat($role->created_at,'j M Y')); ?></td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/roles/<?php echo e($role->id); ?>/edit" class="btn-transparent text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if($role->canDelete()): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_delete')): ?>
                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/roles/'.$role->id.'/delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($roles->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/roles/lists.blade.php ENDPATH**/ ?>