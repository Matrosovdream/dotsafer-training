<!-- Modal -->
<div class="d-none" id="webinarFileModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('public.add_file')); ?></h3>
    <form action="<?php echo e(getAdminPanelUrl()); ?>/files/store" method="post" enctype="multipart/form-data">
        <input type="hidden" name="webinar_id" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                <select name="locale" class="form-control ">
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

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
            <input type="text" name="title" class="form-control" placeholder="<?php echo e(trans('forms.maximum_255_characters')); ?>"/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.chapter')); ?></label>
            <select class="custom-select" name="chapter_id">
                <option value=""><?php echo e(trans('admin/main.no_chapter')); ?></option>

                <?php if(!empty($chapters)): ?>
                    <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($chapter->id); ?>"><?php echo e($chapter->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('public.source')); ?></label>
                    <select name="storage"
                            class="js-file-storage form-control"
                    >
                        <?php $__currentLoopData = \App\Models\File::$fileSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($source); ?>"><?php echo e(trans('update.file_source_'.$source)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('public.accessibility')); ?></label>
                    <select class="custom-select" name="accessibility" required>
                        <option selected disabled><?php echo e(trans('public.choose_accessibility')); ?></option>
                        <option value="free"><?php echo e(trans('public.free')); ?></option>
                        <option value="paid"><?php echo e(trans('public.paid')); ?></option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>

        <div class="form-group js-file-path-input">
            <div class="local-input input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text admin-file-manager" data-input="file_path_record" data-preview="holder">
                        <i class="fa fa-upload"></i>
                    </button>
                </div>
                <input type="text" name="file_path" id="file_path_record" value="" class="js-ajax-file_path form-control" placeholder="<?php echo e(trans('webinars.file_upload_placeholder')); ?>"/>
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="form-group js-s3-file-path-input d-none">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text">
                        <i class="fa fa-upload"></i>
                    </button>
                </div>
                <div class="custom-file">
                    <input type="file" name="s3_file" class="js-s3-file-input custom-file-input cursor-pointer" id="s3File_record">
                    <label class="custom-file-label cursor-pointer" for="s3File_record"><?php echo e(trans('update.choose_file')); ?></label>
                    <div class="invalid-feedback" style="position: absolute;bottom: -20px"></div>
                </div>
            </div>
        </div>

        <div class="row form-group js-file-type-volume d-none">
            <div class="col-6">
                <label class="input-label"><?php echo e(trans('webinars.file_type')); ?></label>
                <select name="file_type" class="js-ajax-file_type form-control">
                    <option value=""><?php echo e(trans('webinars.select_file_type')); ?></option>

                    <?php $__currentLoopData = \App\Models\File::$fileTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fileType); ?>"><?php echo e(trans('update.file_type_'.$fileType)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback"></div>
            </div>
            <div class="col-6">
                <label class="input-label"><?php echo e(trans('webinars.file_volume')); ?></label>
                <input type="text" name="volume" value="" class="js-ajax-volume form-control" placeholder="<?php echo e(trans('webinars.online_file_volume')); ?>"/>
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.description')); ?></label>
            <textarea name="description" class="js-ajax-description form-control" rows="6"></textarea>
            <div class="invalid-feedback"></div>
        </div>

        <div class="js-online_viewer-input form-group mt-20">
            <div class="d-flex align-items-center justify-content-between">
                <label class="cursor-pointer input-label" for="online_viewerSwitch_record"><?php echo e(trans('update.online_viewer')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="online_viewer" class="custom-control-input" id="online_viewerSwitch_record">
                    <label class="custom-control-label" for="online_viewerSwitch_record"></label>
                </div>
            </div>
        </div>

        <div class="js-downloadable-input form-group mt-20">
            <div class="d-flex align-items-center justify-content-between">
                <label class="cursor-pointer input-label" for="downloadableSwitch_record"><?php echo e(trans('home.downloadable')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="downloadable" class="custom-control-input" id="downloadableSwitch_record">
                    <label class="custom-control-label" for="downloadableSwitch_record"></label>
                </div>
            </div>
        </div>

        <div class="form-group mt-20">
            <div class="d-flex align-items-center justify-content-between">
                <label class="cursor-pointer input-label" for="fileStatusSwitch_record"><?php echo e(trans('public.active')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="status" class="custom-control-input" id="fileStatusSwitch_record">
                    <label class="custom-control-label" for="fileStatusSwitch_record"></label>
                </div>
            </div>
        </div>

        <?php if(getFeaturesSettings('sequence_content_status')): ?>
            <div class="form-group mb-1">
                <div class="d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer input-label" for="SequenceContentSwitch_record"><?php echo e(trans('update.sequence_content')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="sequence_content" class="js-sequence-content-switch custom-control-input" id="SequenceContentSwitch_record">
                        <label class="custom-control-label" for="SequenceContentSwitch_record"></label>
                    </div>
                </div>
            </div>

            <div class="js-sequence-content-inputs pl-2 d-none">
                <div class="form-group mb-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <label class="cursor-pointer input-label" for="checkPreviousPartsSwitch_record"><?php echo e(trans('update.check_previous_parts')); ?></label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" checked name="check_previous_parts" class="custom-control-input" id="checkPreviousPartsSwitch_record">
                            <label class="custom-control-label" for="checkPreviousPartsSwitch_record"></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('update.access_after_day')); ?></label>
                    <input type="number" name="access_after_day" value="" class="js-ajax-access_after_day form-control" placeholder="<?php echo e(trans('update.access_after_day_placeholder')); ?>"/>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        <?php endif; ?>

        <div class="mt-3 d-flex align-items-center justify-content-end">
            <button type="button" id="saveFile" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/webinars/modals/file.blade.php ENDPATH**/ ?>