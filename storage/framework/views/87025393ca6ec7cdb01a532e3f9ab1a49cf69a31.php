<!-- Modal -->
<div class="d-none" id="webinarAssignmentModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('update.add_new_assignments')); ?></h3>
    <form action="<?php echo e(getAdminPanelUrl()); ?>/assignments/store" method="post">
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
                <?php if(!empty($chapters)): ?>
                    <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($chapter->id); ?>"><?php echo e($chapter->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('admin/main.description')); ?></label>
            <div class="content-summernote js-ajax-description">
                <textarea name="description" rows="5" class="form-control"></textarea>
            </div>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('quiz.grade')); ?></label>
            <input type="text" name="grade" class="form-control" placeholder=""/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('update.pass_grade')); ?></label>
            <input type="text" name="pass_grade" class="form-control" placeholder=""/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('update.deadline')); ?></label>
            <input type="text" name="deadline" class="form-control" placeholder=""/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('update.attempts')); ?></label>
            <input type="text" name="attempts" class="form-control" placeholder=""/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="js-assignment-attachments-items form-group mt-15">
            <div class="d-flex align-items-center justify-content-between">
                <label class="input-label mb-0"><?php echo e(trans('public.attachments')); ?></label>

                <button type="button" class="btn btn-primary btn-sm assignment-attachments-add-btn">
                    <i class="fa fa-plus"></i>
                </button>
            </div>

            <div class="assignment-attachments-main-row js-ajax-attachments position-relative">
                <div class="mt-2 p-2 border rounded">
                    <div class="mb-2">
                        <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                        <input type="text" name="attachments[assignmentTemp][title]" class="form-control" placeholder="<?php echo e(trans('forms.maximum_255_characters')); ?>"/>
                    </div>

                    <div class="input-group product-images-input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="attachments_assignmentTemp" data-preview="holder">
                                <i class="fa fa-upload"></i>
                            </button>
                        </div>
                        <input type="text" name="attachments[assignmentTemp][attach]" id="attachments_assignmentTemp" value="" class="form-control" placeholder="<?php echo e(trans('update.assignment_attachments_placeholder')); ?>"/>
                    </div>
                </div>

                <button type="button" class="btn btn-danger btn-sm assignment-attachments-remove-btn d-none">
                    <i class="fa fa-times"></i>
                </button>
            </div>

            <div class="invalid-feedback"></div>

            <div class="js-assignment-attachments-lists"></div>
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
            <button type="button" id="saveAssignment" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/webinars/modals/assignment.blade.php ENDPATH**/ ?>