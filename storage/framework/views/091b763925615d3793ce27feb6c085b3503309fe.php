<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-timepicker/bootstrap-timepicker.min.css">

    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <style>
        .bootstrap-timepicker-widget table td input {
            width: 35px !important;
        }

        .select2-container {
            z-index: 1212 !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(!empty($webinar) ?trans('/admin/main.edit'): trans('admin/main.new')); ?> <?php echo e(trans('admin/main.class')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars"><?php echo e(trans('admin/main.classes')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(!empty($webinar) ?trans('/admin/main.edit'): trans('admin/main.new')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-body">

                            <form method="post" action="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e(!empty($webinar) ? $webinar->id.'/update' : 'store'); ?>" id="webinarForm" class="webinar-form" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <section>
                                    <h2 class="section-title after-line"><?php echo e(trans('public.basic_information')); ?></h2>

                                    <div class="row">
                                        <div class="col-12 col-md-5">

                                            <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                                <div class="form-group">
                                                    <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                                    <select name="locale" class="form-control <?php echo e(!empty($webinar) ? 'js-edit-content-locale' : ''); ?>">
                                                        <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['locale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            <?php else: ?>
                                                <input type="hidden" name="locale" value="<?php echo e(getDefaultLocale()); ?>">
                                            <?php endif; ?>

                                            <div class="form-group mt-15 ">
                                                <label class="input-label d-block"><?php echo e(trans('panel.course_type')); ?></label>

                                                <select name="type" class="custom-select <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <option value="webinar" <?php if((!empty($webinar) and $webinar->isWebinar()) or old('type') == \App\Models\Webinar::$webinar): ?> selected <?php endif; ?>><?php echo e(trans('webinars.webinar')); ?></option>
                                                    <option value="course" <?php if((!empty($webinar) and $webinar->isCourse()) or old('type') == \App\Models\Webinar::$course): ?> selected <?php endif; ?>><?php echo e(trans('product.video_course')); ?></option>
                                                    <option><?php echo e(trans('product.text_course')); ?> (Paid plugin)</option>
                                                </select>

                                                <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                                                <input type="text" name="title" value="<?php echo e(!empty($webinar) ? $webinar->title : old('title')); ?>" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('update.points')); ?></label>
                                                <input type="number" name="points" value="<?php echo e(!empty($webinar) ? $webinar->points : old('points')); ?>" class="form-control <?php $__errorArgs = ['points'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Empty means inactive this mode"/>
                                                <?php $__errorArgs = ['points'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('admin/main.class_url')); ?></label>
                                                <input type="text" name="slug" value="<?php echo e(!empty($webinar) ? $webinar->slug : old('slug')); ?>" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                                                <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.class_url_hint')); ?></div>
                                                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <?php if(!empty($webinar) and $webinar->creator->isOrganization()): ?>
                                                <div class="form-group mt-15 ">
                                                    <label class="input-label d-block"><?php echo e(trans('admin/main.organization')); ?></label>

                                                    <select name="organ_id" data-search-option="just_organization_role" class="form-control search-user-select2" data-placeholder="<?php echo e(trans('search_organization')); ?>">
                                                        <option value="<?php echo e($webinar->creator->id); ?>" selected><?php echo e($webinar->creator->full_name); ?></option>
                                                    </select>
                                                </div>
                                            <?php endif; ?>


                                            <div class="form-group mt-15 ">
                                                <label class="input-label d-block"><?php echo e(trans('admin/main.select_a_instructor')); ?></label>

                                                <select name="teacher_id" data-search-option="except_user" class="form-control search-user-select22"
                                                        data-placeholder="<?php echo e(trans('public.select_a_teacher')); ?>"
                                                >
                                                    <?php if(!empty($webinar)): ?>
                                                        <option value="<?php echo e($webinar->teacher->id); ?>" selected><?php echo e($webinar->teacher->full_name); ?></option>
                                                    <?php else: ?>
                                                        <option selected disabled><?php echo e(trans('public.select_a_teacher')); ?></option>
                                                    <?php endif; ?>
                                                </select>

                                                <?php $__errorArgs = ['teacher_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>


                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.seo_description')); ?></label>
                                                <input type="text" name="seo_description" value="<?php echo e(!empty($webinar) ? $webinar->seo_description : old('seo_description')); ?>" class="form-control <?php $__errorArgs = ['seo_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.seo_description_hint')); ?></div>
                                                <?php $__errorArgs = ['seo_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.thumbnail_image')); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="input-group-text admin-file-manager" data-input="thumbnail" data-preview="holder">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="thumbnail" id="thumbnail" value="<?php echo e(!empty($webinar) ? $webinar->thumbnail : old('thumbnail')); ?>" class="form-control <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                    <div class="input-group-append">
                                                        <button type="button" class="input-group-text admin-file-view" data-input="thumbnail">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </div>
                                                    <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>


                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.cover_image')); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="input-group-text admin-file-manager" data-input="cover_image" data-preview="holder">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="image_cover" id="cover_image" value="<?php echo e(!empty($webinar) ? $webinar->image_cover : old('image_cover')); ?>" class="form-control <?php $__errorArgs = ['image_cover'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                    <div class="input-group-append">
                                                        <button type="button" class="input-group-text admin-file-view" data-input="cover_image">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </div>
                                                    <?php $__errorArgs = ['image_cover'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="form-group mt-25">
                                                <label class="input-label"><?php echo e(trans('public.demo_video')); ?> (<?php echo e(trans('public.optional')); ?>)</label>


                                                <div class="">
                                                    <label class="input-label font-12"><?php echo e(trans('public.source')); ?></label>
                                                    <select name="video_demo_source"
                                                            class="js-video-demo-source form-control"
                                                    >
                                                        <?php $__currentLoopData = \App\Models\Webinar::$videoDemoSource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($source); ?>" <?php if(!empty($webinar) and $webinar->video_demo_source == $source): ?> selected <?php endif; ?>><?php echo e(trans('update.file_source_'.$source)); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="js-video-demo-other-inputs form-group mt-0 <?php echo e((empty($webinar) or $webinar->video_demo_source != 'secure_host') ? '' : 'd-none'); ?>">
                                                <label class="input-label font-12"><?php echo e(trans('update.path')); ?></label>
                                                <div class="input-group js-video-demo-path-input">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="js-video-demo-path-upload input-group-text admin-file-manager <?php echo e((empty($webinar) or empty($webinar->video_demo_source) or $webinar->video_demo_source == 'upload') ? '' : 'd-none'); ?>" data-input="demo_video" data-preview="holder">
                                                            <i class="fa fa-upload"></i>
                                                        </button>

                                                        <button type="button" class="js-video-demo-path-links rounded-left input-group-text input-group-text-rounded-left  <?php echo e((empty($webinar) or empty($webinar->video_demo_source) or $webinar->video_demo_source == 'upload') ? 'd-none' : ''); ?>">
                                                            <i class="fa fa-link"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="video_demo" id="demo_video" value="<?php echo e(!empty($webinar) ? $webinar->video_demo : old('video_demo')); ?>" class="form-control <?php $__errorArgs = ['video_demo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                    <?php $__errorArgs = ['video_demo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="form-group js-video-demo-secure-host-input <?php echo e((!empty($webinar) and $webinar->video_demo_source == 'secure_host') ? '' : 'd-none'); ?>">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                    <div class="custom-file js-ajax-s3_file">
                                                        <input type="file" name="video_demo_secure_host_file" class="custom-file-input cursor-pointer" id="video_demo_secure_host_file" accept="video/*">
                                                        <label class="custom-file-label cursor-pointer" for="video_demo_secure_host_file"><?php echo e(trans('update.choose_file')); ?></label>
                                                    </div>

                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                                                <textarea id="summernote" name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('forms.webinar_description_placeholder')); ?>"><?php echo !empty($webinar) ? $webinar->description : old('description'); ?></textarea>
                                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="mt-3">
                                    <h2 class="section-title after-line"><?php echo e(trans('public.additional_information')); ?></h2>
                                    <div class="row">
                                        <div class="col-12 col-md-6">


                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('update.sales_count_number')); ?></label>
                                                <input type="number" name="sales_count_number" value="<?php echo e(!empty($webinar) ? $webinar->sales_count_number : old('sales_count_number')); ?>" class="form-control <?php $__errorArgs = ['sales_count_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                <?php $__errorArgs = ['sales_count_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <p class="mt-1 text-muted text-gray"><?php echo e(trans('update.product_sales_count_number_hint')); ?></p>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.capacity')); ?></label>
                                                <input type="number" name="capacity" value="<?php echo e(!empty($webinar) ? $webinar->capacity : old('capacity')); ?>" class="form-control <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="row mt-15">
                                                <?php if(empty($webinar) or (!empty($webinar) and $webinar->isWebinar())): ?>
                                                    <div class="col-12 col-md-6 js-start_date <?php echo e((!empty(old('type')) and old('type') != \App\Models\Webinar::$webinar) ? 'd-none' : ''); ?>">
                                                        <div class="form-group">
                                                            <label class="input-label"><?php echo e(trans('public.start_date')); ?></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="dateInputGroupPrepend">
                                                                        <i class="fa fa-calendar-alt "></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="start_date" value="<?php echo e((!empty($webinar) and $webinar->start_date) ? dateTimeFormat($webinar->start_date, 'Y-m-d H:i', false, false, $webinar->timezone) : old('start_date')); ?>" class="form-control <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> datetimepicker" aria-describedby="dateInputGroupPrepend"/>
                                                                <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="invalid-feedback">
                                                                    <?php echo e($message); ?>

                                                                </div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="input-label"><?php echo e(trans('public.duration')); ?> (<?php echo e(trans('public.minutes')); ?>)</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="timeInputGroupPrepend">
                                                                    <i class="fa fa-clock"></i>
                                                                </span>
                                                            </div>


                                                            <input type="number" name="duration" value="<?php echo e(!empty($webinar) ? $webinar->duration : old('duration')); ?>" class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                            <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="invalid-feedback">
                                                                <?php echo e($message); ?>

                                                            </div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if(getFeaturesSettings('timezone_in_create_webinar')): ?>
                                                <?php
                                                    $selectedTimezone = getGeneralSettings('default_time_zone');

                                                    if (!empty($webinar) and !empty($webinar->timezone)) {
                                                        $selectedTimezone = $webinar->timezone;
                                                    }
                                                ?>

                                                <div class="form-group">
                                                    <label class="input-label"><?php echo e(trans('update.timezone')); ?></label>
                                                    <select name="timezone" class="form-control select2" data-allow-clear="false">
                                                        <?php $__currentLoopData = getListOfTimezones(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($timezone); ?>" <?php if($selectedTimezone == $timezone): ?> selected <?php endif; ?>><?php echo e($timezone); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['timezone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="supportSwitch"><?php echo e(trans('panel.support')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="support" class="custom-control-input" id="supportSwitch" <?php echo e(!empty($webinar) && $webinar->support ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="supportSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="includeCertificateSwitch"><?php echo e(trans('update.include_certificate')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="certificate" class="custom-control-input" id="includeCertificateSwitch" <?php echo e(!empty($webinar) && $webinar->certificate ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="includeCertificateSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="cursor-pointer" for="downloadableSwitch"><?php echo e(trans('home.downloadable')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="downloadable" class="custom-control-input" id="downloadableSwitch" <?php echo e(!empty($webinar) && $webinar->downloadable ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="downloadableSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="partnerInstructorSwitch"><?php echo e(trans('public.partner_instructor')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="partner_instructor" class="custom-control-input" id="partnerInstructorSwitch" <?php echo e(!empty($webinar) && $webinar->partner_instructor ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="partnerInstructorSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="forumSwitch"><?php echo e(trans('update.course_forum')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="forum" class="custom-control-input" id="forumSwitch" <?php echo e(!empty($webinar) && $webinar->forum ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="forumSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="subscribeSwitch"><?php echo e(trans('public.subscribe')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="subscribe" class="custom-control-input" id="subscribeSwitch" <?php echo e(!empty($webinar) && $webinar->subscribe ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="subscribeSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="privateSwitch"><?php echo e(trans('webinars.private')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="private" class="custom-control-input" id="privateSwitch" <?php echo e((!empty($webinar) and $webinar->private) ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="privateSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                                                <label class="" for="enable_waitlistSwitch"><?php echo e(trans('update.enable_waitlist')); ?></label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="enable_waitlist" class="custom-control-input" id="enable_waitlistSwitch" <?php echo e((!empty($webinar) and $webinar->enable_waitlist) ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label" for="enable_waitlistSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('update.access_days')); ?></label>
                                                <input type="text" name="access_days" value="<?php echo e(!empty($webinar) ? $webinar->access_days : old('access_days')); ?>" class="form-control <?php $__errorArgs = ['access_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                <?php $__errorArgs = ['access_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <p class="mt-1">- <?php echo e(trans('update.access_days_input_hint')); ?></p>
                                            </div>

                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.price')); ?> (<?php echo e($currency); ?>)</label>
                                                <input type="text" name="price" value="<?php echo e((!empty($webinar) and !empty($webinar->price)) ? convertPriceToUserCurrency($webinar->price) : old('price')); ?>" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('public.0_for_free')); ?>"/>
                                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <?php if(!empty($webinar) and $webinar->creator->isOrganization()): ?>
                                                <div class="form-group mt-15">
                                                    <label class="input-label"><?php echo e(trans('update.organization_price')); ?> (<?php echo e($currency); ?>)</label>
                                                    <input type="number" name="organization_price" value="<?php echo e((!empty($webinar) and $webinar->organization_price) ? convertPriceToUserCurrency($webinar->organization_price) : old('organization_price')); ?>" class="form-control <?php $__errorArgs = ['organization_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                                                    <?php $__errorArgs = ['organization_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <p class="font-12 text-gray mt-1">- <?php echo e(trans('update.organization_price_hint')); ?></p>
                                                </div>
                                            <?php endif; ?>

                                            
                                            <?php if(!empty($webinar)): ?>
                                                <?php echo $__env->make('admin.product_badges.content_include', ['itemTarget' => $webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>

                                            <div id="partnerInstructorInput" class="form-group mt-15 <?php echo e((!empty($webinar) && $webinar->partner_instructor) ? '' : 'd-none'); ?>">
                                                <label class="input-label d-block"><?php echo e(trans('public.select_a_partner_teacher')); ?></label>

                                                <select name="partners[]" multiple data-search-option="just_teacher_role" class="js-search-partner-user form-control <?php echo e((!empty($webinar) && $webinar->partner_instructor) ? 'search-user-select22' : ''); ?>"
                                                        data-placeholder="<?php echo e(trans('public.search_instructor')); ?>"
                                                >
                                                    <?php if(!empty($webinarPartnerTeacher)): ?>
                                                        <?php $__currentLoopData = $webinarPartnerTeacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(!empty($partner) and $partner->teacher): ?>
                                                                <option value="<?php echo e($partner->teacher->id); ?>" selected><?php echo e($partner->teacher->full_name); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>

                                                <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.select_a_partner_hint')); ?></div>
                                            </div>


                                            <div class="form-group mt-15">
                                                <label class="input-label d-block"><?php echo e(trans('public.tags')); ?></label>
                                                <input type="text" name="tags" data-max-tag="5" value="<?php echo e(!empty($webinar) ? implode(',',$webinarTags) : ''); ?>" class="form-control inputtags" placeholder="<?php echo e(trans('public.type_tag_name_and_press_enter')); ?> (<?php echo e(trans('admin/main.max')); ?> : 5)"/>
                                            </div>


                                            <div class="form-group mt-15">
                                                <label class="input-label"><?php echo e(trans('public.category')); ?></label>

                                                <select id="categories" class="custom-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id" required>
                                                    <option <?php echo e(!empty($webinar) ? '' : 'selected'); ?> disabled><?php echo e(trans('public.choose_category')); ?></option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                                                            <optgroup label="<?php echo e($category->title); ?>">
                                                                <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($subCategory->id); ?>" <?php echo e((!empty($webinar) and $webinar->category_id == $subCategory->id) ? 'selected' : ''); ?>><?php echo e($subCategory->title); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </optgroup>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($category->id); ?>" <?php echo e((!empty($webinar) and $webinar->category_id == $category->id) ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($message); ?>

                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group mt-15 <?php echo e((!empty($webinarCategoryFilters) and count($webinarCategoryFilters)) ? '' : 'd-none'); ?>" id="categoriesFiltersContainer">
                                        <span class="input-label d-block"><?php echo e(trans('public.category_filters')); ?></span>
                                        <div id="categoriesFiltersCard" class="row mt-3">

                                            <?php if(!empty($webinarCategoryFilters) and count($webinarCategoryFilters)): ?>
                                                <?php $__currentLoopData = $webinarCategoryFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-12 col-md-3">
                                                        <div class="webinar-category-filters">
                                                            <strong class="category-filter-title d-block"><?php echo e($filter->title); ?></strong>
                                                            <div class="py-10"></div>

                                                            <?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="form-group mt-3 d-flex align-items-center justify-content-between">
                                                                    <label class="text-gray font-14" for="filterOptions<?php echo e($option->id); ?>"><?php echo e($option->title); ?></label>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="filters[]" value="<?php echo e($option->id); ?>" <?php echo e(((!empty($webinarFilterOptions) && in_array($option->id,$webinarFilterOptions)) ? 'checked' : '')); ?> class="custom-control-input" id="filterOptions<?php echo e($option->id); ?>">
                                                                        <label class="custom-control-label" for="filterOptions<?php echo e($option->id); ?>"></label>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </section>

                                <?php if(!empty($webinar)): ?>
                                    <section class="mt-30">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="section-title after-line"><?php echo e(trans('admin/main.price_plans')); ?></h2>
                                            <button id="webinarAddTicket" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('admin/main.add_price_plan')); ?></button>
                                        </div>

                                        <div class="row mt-10">
                                            <div class="col-12">

                                                <?php if(!empty($tickets) and !$tickets->isEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center font-14">

                                                            <tr>
                                                                <th><?php echo e(trans('public.title')); ?></th>
                                                                <th><?php echo e(trans('public.discount')); ?></th>
                                                                <th><?php echo e(trans('public.capacity')); ?></th>
                                                                <th><?php echo e(trans('public.date')); ?></th>
                                                                <th></th>
                                                            </tr>

                                                            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo e($ticket->title); ?></th>
                                                                    <td><?php echo e($ticket->discount); ?>%</td>
                                                                    <td><?php echo e($ticket->capacity); ?></td>
                                                                    <td><?php echo e(dateTimeFormat($ticket->start_date, 'j M Y')); ?> - <?php echo e(dateTimeFormat($ticket->end_date, 'j M Y')); ?></td>
                                                                    <td>
                                                                        <button type="button" data-ticket-id="<?php echo e($ticket->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-ticket btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>

                                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/tickets/'. $ticket->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </table>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo $__env->make('admin.includes.no-result',[
                                                        'file_name' => 'ticket.png',
                                                        'title' => trans('public.ticket_no_result'),
                                                        'hint' => trans('public.ticket_no_result_hint'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>


                                    <?php echo $__env->make('admin.webinars.create_includes.contents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                    <section class="mt-30">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="section-title after-line"><?php echo e(trans('public.prerequisites')); ?></h2>
                                            <button id="webinarAddPrerequisites" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_prerequisites')); ?></button>
                                        </div>

                                        <div class="row mt-10">
                                            <div class="col-12">
                                                <?php if(!empty($prerequisites) and !$prerequisites->isEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center font-14">

                                                            <tr>
                                                                <th><?php echo e(trans('public.title')); ?></th>
                                                                <th class="text-left"><?php echo e(trans('public.instructor')); ?></th>
                                                                <th><?php echo e(trans('public.price')); ?></th>
                                                                <th><?php echo e(trans('public.publish_date')); ?></th>
                                                                <th><?php echo e(trans('public.forced')); ?></th>
                                                                <th></th>
                                                            </tr>

                                                            <?php $__currentLoopData = $prerequisites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prerequisite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(!empty($prerequisite->prerequisiteWebinar->title)): ?>
                                                                    <tr>
                                                                        <th><?php echo e($prerequisite->prerequisiteWebinar->title); ?></th>
                                                                        <td class="text-left"><?php echo e($prerequisite->prerequisiteWebinar->teacher->full_name); ?></td>
                                                                        <td><?php echo e(handlePrice($prerequisite->prerequisiteWebinar->price)); ?></td>
                                                                        <td><?php echo e(dateTimeFormat($prerequisite->prerequisiteWebinar->created_at,'j F Y | H:i')); ?></td>
                                                                        <td><?php echo e($prerequisite->required ? trans('public.yes') : trans('public.no')); ?></td>

                                                                        <td>
                                                                            <button type="button" data-prerequisite-id="<?php echo e($prerequisite->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-prerequisite btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                                <i class="fa fa-edit"></i>
                                                                            </button>

                                                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/prerequisites/'. $prerequisite->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </table>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo $__env->make('admin.includes.no-result',[
                                                        'file_name' => 'comment.png',
                                                        'title' => trans('public.prerequisites_no_result'),
                                                        'hint' => trans('public.prerequisites_no_result_hint'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>


                                    
                                    <?php echo $__env->make('admin.webinars.relatedCourse.add_related_course', [
                                            'relatedCourseItemId' => $webinar->id,
                                             'relatedCourseItemType' => 'webinar',
                                             'relatedCourses' => $webinar->relatedCourses
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                    <section class="mt-30">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="section-title after-line"><?php echo e(trans('public.faq')); ?></h2>
                                            <button id="webinarAddFAQ" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_faq')); ?></button>
                                        </div>

                                        <div class="row mt-10">
                                            <div class="col-12">
                                                <?php if(!empty($faqs) and !$faqs->isEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center font-14">

                                                            <tr>
                                                                <th><?php echo e(trans('public.title')); ?></th>
                                                                <th><?php echo e(trans('public.answer')); ?></th>
                                                                <th></th>
                                                            </tr>

                                                            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <th><?php echo e($faq->title); ?></th>
                                                                    <td>
                                                                        <button type="button" class="js-get-faq-description btn btn-sm btn-gray200"><?php echo e(trans('public.view')); ?></button>
                                                                        <input type="hidden" value="<?php echo e($faq->answer); ?>"/>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <button type="button" data-faq-id="<?php echo e($faq->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-faq btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>

                                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/faqs/'. $faq->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </table>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo $__env->make('admin.includes.no-result',[
                                                        'file_name' => 'faq.png',
                                                        'title' => trans('public.faq_no_result'),
                                                        'hint' => trans('public.faq_no_result_hint'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>

                                    <?php $__currentLoopData = \App\Models\WebinarExtraDescription::$types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinarExtraDescriptionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <section class="mt-30">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 class="section-title after-line"><?php echo e(trans('update.'.$webinarExtraDescriptionType)); ?></h2>
                                                <button id="add_new_<?php echo e($webinarExtraDescriptionType); ?>" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('update.add_'.$webinarExtraDescriptionType)); ?></button>
                                            </div>

                                            <?php
                                                $webinarExtraDescriptionValues = $webinar->webinarExtraDescription->where('type',$webinarExtraDescriptionType);
                                            ?>

                                            <div class="row mt-10">
                                                <div class="col-12">
                                                    <?php if(!empty($webinarExtraDescriptionValues) and count($webinarExtraDescriptionValues)): ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped text-center font-14">

                                                                <tr>
                                                                    <?php if($webinarExtraDescriptionType == \App\Models\WebinarExtraDescription::$COMPANY_LOGOS): ?>
                                                                        <th><?php echo e(trans('admin/main.icon')); ?></th>
                                                                    <?php else: ?>
                                                                        <th><?php echo e(trans('public.title')); ?></th>
                                                                    <?php endif; ?>
                                                                    <th></th>
                                                                </tr>

                                                                <?php $__currentLoopData = $webinarExtraDescriptionValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraDescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <?php if($webinarExtraDescriptionType == \App\Models\WebinarExtraDescription::$COMPANY_LOGOS): ?>
                                                                            <td>
                                                                                <img src="<?php echo e($extraDescription->value); ?>" class="webinar-extra-description-company-logos" alt="">
                                                                            </td>
                                                                        <?php else: ?>
                                                                            <td><?php echo e($extraDescription->value); ?></td>
                                                                        <?php endif; ?>

                                                                        <td class="text-right">
                                                                            <button type="button" data-item-id="<?php echo e($extraDescription->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-extraDescription btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                                <i class="fa fa-edit"></i>
                                                                            </button>

                                                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/webinar-extra-description/'. $extraDescription->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </table>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('admin.includes.no-result',[
                                                             'file_name' => 'faq.png',
                                                             'title' => trans("update.{$webinarExtraDescriptionType}_no_result"),
                                                             'hint' => trans("update.{$webinarExtraDescriptionType}_no_result_hint"),
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </section>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <section class="mt-30">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="section-title after-line"><?php echo e(trans('public.quiz_certificate')); ?></h2>
                                            <button id="webinarAddQuiz" type="button" class="btn btn-primary btn-sm mt-3"><?php echo e(trans('public.add_quiz')); ?></button>
                                        </div>
                                        <div class="row mt-10">
                                            <div class="col-12">
                                                <?php if(!empty($webinarQuizzes) and !$webinarQuizzes->isEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center font-14">

                                                            <tr>
                                                                <th><?php echo e(trans('public.title')); ?></th>
                                                                <th><?php echo e(trans('public.questions')); ?></th>
                                                                <th><?php echo e(trans('public.total_mark')); ?></th>
                                                                <th><?php echo e(trans('public.pass_mark')); ?></th>
                                                                <th><?php echo e(trans('public.certificate')); ?></th>
                                                                <th></th>
                                                            </tr>

                                                            <?php $__currentLoopData = $webinarQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinarQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <th><?php echo e($webinarQuiz->title); ?></th>
                                                                    <td><?php echo e($webinarQuiz->quizQuestions->count()); ?></td>
                                                                    <td><?php echo e($webinarQuiz->quizQuestions->sum('grade')); ?></td>
                                                                    <td><?php echo e($webinarQuiz->pass_mark); ?></td>
                                                                    <td><?php echo e($webinarQuiz->certificate ? trans('public.yes') : trans('public.no')); ?></td>
                                                                    <td>
                                                                        <button type="button" data-webinar-quiz-id="<?php echo e($webinarQuiz->id); ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" class="edit-webinar-quiz btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>

                                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/webinar-quiz/'. $webinarQuiz->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    </td>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tr>

                                                        </table>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo $__env->make('admin.includes.no-result',[
                                                        'file_name' => 'cert.png',
                                                        'title' => trans('public.quizzes_no_result'),
                                                        'hint' => trans('public.quizzes_no_result_hint'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; ?>

                                <section class="mt-3">
                                    <h2 class="section-title after-line"><?php echo e(trans('public.message_to_reviewer')); ?></h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mt-15">
                                                <textarea name="message_for_reviewer" rows="10" class="form-control"><?php echo e((!empty($webinar) && $webinar->message_for_reviewer) ? $webinar->message_for_reviewer : old('message_for_reviewer')); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <input type="hidden" name="draft" value="no" id="forDraft"/>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" id="saveAndPublish" class="btn btn-success"><?php echo e(!empty($webinar) ? trans('admin/main.save_and_publish') : trans('admin/main.save_and_continue')); ?></button>

                                        <?php if(!empty($webinar)): ?>
                                            <button type="button" id="saveReject" class="btn btn-warning"><?php echo e(($webinar->status == "active") ? trans('update.unpublish') : trans('public.reject')); ?></button>

                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl().'/webinars/'. $webinar->id .'/delete',
                                                    'btnText' => trans('public.delete'),
                                                    'hideDefaultClass' => true,
                                                    'btnClass' => 'btn btn-danger'
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>


                            <?php echo $__env->make('admin.webinars.modals.prerequisites', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.quizzes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.ticket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.chapter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.file', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.interactive_file', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.testLesson', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.assignment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.webinars.modals.extra_description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var titleLang = '<?php echo e(trans('admin/main.title')); ?>';
        var zoomJwtTokenInvalid = '<?php echo e(trans('admin/main.teacher_zoom_jwt_token_invalid')); ?>';
        var editChapterLang = '<?php echo e(trans('public.edit_chapter')); ?>';
        var requestFailedLang = '<?php echo e(trans('public.request_failed')); ?>';
        var thisLiveHasEndedLang = '<?php echo e(trans('update.this_live_has_been_ended')); ?>';
        var quizzesSectionLang = '<?php echo e(trans('quiz.quizzes_section')); ?>';
        var filePathPlaceHolderBySource = {
            upload: '<?php echo e(trans('update.file_source_upload_placeholder')); ?>',
            youtube: '<?php echo e(trans('update.file_source_youtube_placeholder')); ?>',
            vimeo: '<?php echo e(trans('update.file_source_vimeo_placeholder')); ?>',
            external_link: '<?php echo e(trans('update.file_source_external_link_placeholder')); ?>',
            google_drive: '<?php echo e(trans('update.file_source_google_drive_placeholder')); ?>',
            dropbox: '<?php echo e(trans('update.file_source_dropbox_placeholder')); ?>',
            iframe: '<?php echo e(trans('update.file_source_iframe_placeholder')); ?>',
            s3: '<?php echo e(trans('update.file_source_s3_placeholder')); ?>',
        }
    </script>

    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>

    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/quiz.min.js"></script>
    <script src="/assets/admin/js/webinar.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/webinars/create.blade.php ENDPATH**/ ?>