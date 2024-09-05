<!-- Modal -->
<div class="d-none" id="webinarTestLessonModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('public.add_text_lesson')); ?></h3>
    <form action="<?php echo e(getAdminPanelUrl()); ?>/test-lesson/store" method="post">
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
            <input type="text" name="title" class="form-control" placeholder=""/>
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
                    <label class="input-label"><?php echo e(trans('public.study_time')); ?></label>
                    <input type="text" name="study_time" class="form-control"/>
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('public.accessibility')); ?></label>
                    <select class="custom-select" name="accessibility">
                        <option selected disabled><?php echo e(trans('public.choose_accessibility')); ?></option>
                        <option value="free"><?php echo e(trans('public.free')); ?></option>
                        <option value="paid"><?php echo e(trans('public.paid')); ?></option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.image')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text admin-file-manager" data-input="image_record" data-preview="holder">
                        <i class="fa fa-arrow-up"></i>
                    </button>
                </div>
                <input type="text" name="image" id="image_record" class="form-control"/>
                <div class="input-group-append">
                    <button type="button" class="input-group-text admin-file-view" data-input="image_record">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="input-label d-block"><?php echo e(trans('public.attachments')); ?></label>

            <select class="js-ajax-attachments form-control attachments-select2" name="attachments" data-placeholder="<?php echo e(trans('public.choose_attachments')); ?>">
                <option></option>

                <?php if(!empty($webinar->files) and count($webinar->files)): ?>
                    <?php $__currentLoopData = $webinar->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filesInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($filesInfo->downloadable): ?>
                            <option value="<?php echo e($filesInfo->id); ?>"><?php echo e($filesInfo->title); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.summary')); ?></label>
            <textarea name="summary" class="js-ajax-summary form-control" rows="6"></textarea>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.content')); ?></label>
            <div class="content-summernote js-ajax-file_path">
                <textarea class="js-content-summernote form-control"></textarea>
                <textarea name="content" class="js-hidden-content-summernote d-none"></textarea>
            </div>
            <div class="invalid-feedback"></div>
        </div>

        <div class="js-textLesson-status form-group mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <label class="cursor-pointer input-label" for="textLessonStatusSwitch_record"><?php echo e(trans('admin/main.active')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="status" checked class="custom-control-input" id="textLessonStatusSwitch_record">
                    <label class="custom-control-label" for="textLessonStatusSwitch_record"></label>
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

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" id="saveTestLesson" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/webinars/modals/testLesson.blade.php ENDPATH**/ ?>