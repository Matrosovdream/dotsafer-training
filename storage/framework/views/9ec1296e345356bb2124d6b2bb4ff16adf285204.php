<!-- Modal -->
<div class="d-none" id="quizzesModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('public.add_quiz')); ?></h3>

    <div class="js-form text-left" data-action="<?php echo e(getAdminPanelUrl()); ?>/webinar-quiz/store">
        <input type="hidden" name="webinar_id" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

        <div class="form-group mt-15">
            <label class="input-label d-block"><?php echo e(trans('public.select_a_quiz')); ?></label>

            <select name="quiz_id" class="js-ajax-quiz_id form-control quiz-select2" data-placeholder="<?php echo e(trans('public.add_quiz')); ?>">
                <option disabled selected></option>
                <?php if(!empty($webinar)): ?>
                    <?php $__currentLoopData = $teacherQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacherQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($teacherQuiz->id); ?>"><?php echo e($teacherQuiz->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.chapter')); ?></label>
            <select class="js-ajax-chapter_id custom-select" name="chapter_id">
                <option value=""><?php echo e(trans('admin/main.no_chapter')); ?></option>

                <?php if(!empty($chapters)): ?>
                    <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($chapter->id); ?>"><?php echo e($chapter->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" id="saveQuiz" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </div>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/webinars/modals/quizzes.blade.php ENDPATH**/ ?>