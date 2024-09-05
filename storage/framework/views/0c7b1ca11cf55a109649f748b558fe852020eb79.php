<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.type_'.$classesType.'s')); ?> <?php echo e(trans('admin/main.list')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.classes')); ?></div>

                <div class="breadcrumb-item"><?php echo e(trans('admin/main.type_'.$classesType.'s')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-file-video"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.total')); ?> <?php echo e(trans('admin/main.type_'.$classesType.'s')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalWebinars); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-eye"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.pending_review')); ?> <?php echo e(trans('admin/main.type_'.$classesType.'s')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalPendingWebinars); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php if($classesType == 'webinar'): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-history"></i>
                            </div>

                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?php echo e(trans('admin/main.inprogress_live_classes')); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?php echo e($inProgressWebinars); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-history"></i>
                            </div>

                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?php echo e(trans('admin/main.total_durations')); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?php echo e(convertMinutesToHourAndMinute($totalDurations)); ?> <?php echo e(trans('home.hours')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-dollar-sign"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.total_sales')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalSales); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <input type="hidden" name="type" value="<?php echo e(request()->get('type')); ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input name="title" type="text" class="form-control" value="<?php echo e(request()->get('title')); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="from" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="to" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.filter_type')); ?></option>
                                        <option value="has_discount" <?php if(request()->get('sort') == 'has_discount'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.discounted_classes')); ?></option>
                                        <option value="sales_asc" <?php if(request()->get('sort') == 'sales_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.sales_ascending')); ?></option>
                                        <option value="sales_desc" <?php if(request()->get('sort') == 'sales_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.sales_descending')); ?></option>
                                        <option value="price_asc" <?php if(request()->get('sort') == 'price_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Price_ascending')); ?></option>
                                        <option value="price_desc" <?php if(request()->get('sort') == 'price_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Price_descending')); ?></option>
                                        <option value="income_asc" <?php if(request()->get('sort') == 'income_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Income_ascending')); ?></option>
                                        <option value="income_desc" <?php if(request()->get('sort') == 'income_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.Income_descending')); ?></option>
                                        <option value="created_at_asc" <?php if(request()->get('sort') == 'created_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_ascending')); ?></option>
                                        <option value="created_at_desc" <?php if(request()->get('sort') == 'created_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_descending')); ?></option>
                                        <option value="updated_at_asc" <?php if(request()->get('sort') == 'updated_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.update_date_ascending')); ?></option>
                                        <option value="updated_at_desc" <?php if(request()->get('sort') == 'updated_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.update_date_descending')); ?></option>
                                        <option value="public_courses" <?php if(request()->get('sort') == 'public_courses'): ?> selected <?php endif; ?>><?php echo e(trans('update.public_courses')); ?></option>
                                        <option value="courses_private" <?php if(request()->get('sort') == 'courses_private'): ?> selected <?php endif; ?>><?php echo e(trans('update.courses_private')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.instructor')); ?></label>
                                    <select name="teacher_ids[]" multiple="multiple" data-search-option="just_teacher_role" class="form-control search-user-select2"
                                            data-placeholder="Search teachers">

                                        <?php if(!empty($teachers) and $teachers->count() > 0): ?>
                                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($teacher->id); ?>" selected><?php echo e($teacher->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.category')); ?></label>
                                    <select name="category_id" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_categories')); ?></option>

                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                                                <optgroup label="<?php echo e($category->title); ?>">
                                                    <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($subCategory->id); ?>" <?php if(request()->get('category_id') == $subCategory->id): ?> selected="selected" <?php endif; ?>><?php echo e($subCategory->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </optgroup>
                                            <?php else: ?>
                                                <option value="<?php echo e($category->id); ?>" <?php if(request()->get('category_id') == $category->id): ?> selected="selected" <?php endif; ?>><?php echo e($category->title); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="pending" <?php if(request()->get('status') == 'pending'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.pending_review')); ?></option>
                                        <?php if($classesType == 'webinar'): ?>
                                            <option value="active_not_conducted" <?php if(request()->get('status') == 'active_not_conducted'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.publish_not_conducted')); ?></option>
                                            <option value="active_in_progress" <?php if(request()->get('status') == 'active_in_progress'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.publish_inprogress')); ?></option>
                                            <option value="active_finished" <?php if(request()->get('status') == 'active_finished'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.publish_finished')); ?></option>
                                        <?php else: ?>
                                            <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.published')); ?></option>
                                        <?php endif; ?>
                                        <option value="inactive" <?php if(request()->get('status') == 'inactive'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.rejected')); ?></option>
                                        <option value="is_draft" <?php if(request()->get('status') == 'is_draft'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.draft')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_export_excel')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/excel?<?php echo e(http_build_query(request()->all())); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.id')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.instructor')); ?></th>
                                        <th><?php echo e(trans('admin/main.price')); ?></th>
                                        <th><?php echo e(trans('admin/main.sales')); ?></th>
                                        <th><?php echo e(trans('admin/main.income')); ?></th>
                                        <th><?php echo e(trans('admin/main.students_count')); ?></th>
                                        <th><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <?php if($classesType == 'webinar'): ?>
                                            <th><?php echo e(trans('admin/main.start_date')); ?></th>
                                        <?php else: ?>
                                            <th><?php echo e(trans('admin/main.updated_at')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <td><?php echo e($webinar->id); ?></td>
                                            <td width="18%" class="text-left">
                                                <a class="text-primary mt-0 mb-1 font-weight-bold" href="<?php echo e($webinar->getUrl()); ?>"><?php echo e($webinar->title); ?></a>
                                                <?php if(!empty($webinar->category->title)): ?>
                                                    <div class="text-small"><?php echo e($webinar->category->title); ?></div>
                                                <?php else: ?>
                                                    <div class="text-small text-warning"><?php echo e(trans('admin/main.no_category')); ?></div>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-left"><?php echo e($webinar->teacher->full_name); ?></td>

                                            <td>
                                                <?php if(!empty($webinar->price) and $webinar->price > 0): ?>
                                                    <span class="mt-0 mb-1">
                                                        <?php echo e(handlePrice($webinar->price, true, true)); ?>

                                                    </span>

                                                    <?php if($webinar->getDiscountPercent() > 0): ?>
                                                        <div class="text-danger text-small font-600-bold"><?php echo e($webinar->getDiscountPercent()); ?>% <?php echo e(trans('admin/main.off')); ?></div>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php echo e(trans('public.free')); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="text-primary mt-0 mb-1 font-weight-bold">
                                                    <?php echo e($webinar->sales->count()); ?>

                                                </span>

                                                <?php if(!empty($webinar->capacity)): ?>
                                                    <div class="text-small font-600-bold"><?php echo e(trans('admin/main.capacity')); ?> : <?php echo e($webinar->getWebinarCapacity()); ?></div>
                                                <?php endif; ?>
                                            </td>

                                            <td><?php echo e(handlePrice($webinar->sales->sum('total_amount'))); ?></td>

                                            <td class="font-12">
                                                <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($webinar->id); ?>/students" target="_blank" class=""><?php echo e($webinar->sales->count()); ?></a>
                                            </td>

                                            <td class="font-12"><?php echo e(dateTimeFormat($webinar->created_at, 'Y M j | H:i')); ?></td>

                                            <?php if($classesType == 'webinar'): ?>
                                                <td class="font-12"><?php echo e(dateTimeFormat($webinar->start_date, 'Y M j | H:i')); ?></td>
                                            <?php else: ?>
                                                <td class="font-12"><?php echo e(dateTimeFormat($webinar->updated_at, 'Y M j | H:i')); ?></td>
                                            <?php endif; ?>

                                            <td>
                                                <?php switch($webinar->status):
                                                    case (\App\Models\Webinar::$active): ?>
                                                        <div class="text-success font-600-bold"><?php echo e(trans('admin/main.published')); ?></div>
                                                        <?php if($webinar->isWebinar()): ?>
                                                            <?php if($webinar->start_date > time()): ?>
                                                                <div class="text-danger text-small">(<?php echo e(trans('admin/main.not_conducted')); ?>)</div>
                                                            <?php elseif($webinar->isProgressing()): ?>
                                                                <div class="text-warning text-small">(<?php echo e(trans('webinars.in_progress')); ?>)</div>
                                                            <?php else: ?>
                                                                <div class="text-success text-small">(<?php echo e(trans('public.finished')); ?>)</div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php break; ?>
                                                    <?php case (\App\Models\Webinar::$isDraft): ?>
                                                        <span class="text-dark"><?php echo e(trans('admin/main.is_draft')); ?></span>
                                                        <?php break; ?>
                                                    <?php case (\App\Models\Webinar::$pending): ?>
                                                        <span class="text-warning"><?php echo e(trans('admin/main.waiting')); ?></span>
                                                        <?php break; ?>
                                                    <?php case (\App\Models\Webinar::$inactive): ?>
                                                        <span class="text-danger"><?php echo e(trans('public.rejected')); ?></span>
                                                        <?php break; ?>
                                                <?php endswitch; ?>
                                            </td>
                                            <td width="200" class="">
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-left text-left webinars-lists-dropdown">

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_edit')): ?>
                                                            <?php if(in_array($webinar->status, [\App\Models\Webinar::$pending, \App\Models\Webinar::$inactive])): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl().'/webinars/'.$webinar->id.'/approve',
                                                                    'btnClass' => 'd-flex align-items-center text-success text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-check"></i><span class="ml-2">'. trans("admin/main.approve") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>

                                                            <?php if($webinar->status == \App\Models\Webinar::$pending): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl().'/webinars/'.$webinar->id.'/reject',
                                                                    'btnClass' => 'd-flex align-items-center text-danger text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.reject") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>

                                                            <?php if($webinar->status == \App\Models\Webinar::$active): ?>
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl().'/webinars/'.$webinar->id.'/unpublish',
                                                                    'btnClass' => 'd-flex align-items-center text-danger text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.unpublish") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>


                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_notification_to_students')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($webinar->id); ?>/sendNotification" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 ">
                                                                <i class="fa fa-bell"></i>
                                                                <span class="ml-2"><?php echo e(trans('notification.send_notification')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_students_lists')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($webinar->id); ?>/students" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 " title="<?php echo e(trans('admin/main.students')); ?>">
                                                                <i class="fa fa-users"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.students')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_statistics')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($webinar->id); ?>/statistics" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 " title="<?php echo e(trans('admin/main.students')); ?>">
                                                                <i class="fa fa-chart-pie"></i>
                                                                <span class="ml-2"><?php echo e(trans('update.statistics')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_send')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/supports/create?user_id=<?php echo e($webinar->teacher->id); ?>" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1" title="<?php echo e(trans('admin/main.send_message_to_teacher')); ?>">
                                                                <i class="fa fa-comment"></i>
                                                                <span class="ml-2"><?php echo e(trans('site.send_message')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_edit')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($webinar->id); ?>/edit" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 " title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.edit')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_delete')): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl().'/webinars/'.$webinar->id.'/delete',
                                                                    'btnClass' => 'd-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.delete") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($webinars->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/webinars/lists.blade.php ENDPATH**/ ?>