<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped font-14" id="datatable-basic">

                            <tr>
                                <th class="text-left"><?php echo e(trans('admin/main.user_name')); ?></th>
                                <th class="text-left"><?php echo e(trans('admin/main.email')); ?></th>
                                <th class="text-center"><?php echo e(trans('public.phone')); ?></th>
                                <th class="text-left"><?php echo e(trans('site.subject')); ?></th>
                                <th class="text-center"><?php echo e(trans('site.message')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                                <th><?php echo e(trans('public.controls')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($contact->name); ?></td>
                                    <td class="text-left"><?php echo e($contact->email); ?></td>
                                    <td class="text-center"><?php echo e($contact->phone); ?></td>
                                    <td class="text-left"><?php echo e($contact->subject); ?></td>

                                    <td class="text-center">
                                        <button type="button" class="js-show-description btn btn-outline-primary"><?php echo e(trans('admin/main.show')); ?></button>
                                        <input type="hidden" value="<?php echo e(nl2br($contact->message)); ?>">
                                    </td>

                                    <td class="text-center">
                                        <?php if($contact->status =='replied'): ?>
                                            <span class="text-success"><?php echo e(trans('admin/main.replied')); ?></span>
                                        <?php else: ?>
                                            <span class="text-danger"><?php echo e(trans('panel.not_replied')); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($contact->created_at,'Y M j | H:i')); ?></td>

                                    <td width="100">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_contacts_reply')): ?>
                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/contacts/<?php echo e($contact->id); ?>/reply" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.reply')); ?>">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_contacts_delete')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/contacts/'. $contact->id.'/delete','btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($contacts->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="contactMessage" tabindex="-1" aria-labelledby="contactMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactMessageLabel"><?php echo e(trans('admin/main.contacts_message')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/contacts.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/contacts/lists.blade.php ENDPATH**/ ?>