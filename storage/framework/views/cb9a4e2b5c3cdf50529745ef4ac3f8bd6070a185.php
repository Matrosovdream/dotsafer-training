

<?php if(!empty($course->chapters) and count($course->chapters)): ?>
    <section class="">
        <?php echo $__env->make('web.default.course.tabs.contents.chapter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php endif; ?>

<?php if(!empty($sessionsWithoutChapter) and count($sessionsWithoutChapter)): ?>
    <section class="mt-20">
        <div class="row">
            <div class="col-12">
                <div class="accordion-content-wrapper" id="sessionsAccordion" role="tablist" aria-multiselectable="true">
                    <?php $__currentLoopData = $sessionsWithoutChapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('web.default.course.tabs.contents.sessions' , ['session' => $session, 'accordionParent' => 'sessionsAccordion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if(!empty($filesWithoutChapter) and count($filesWithoutChapter)): ?>
    <section class="mt-20">
        <div class="row">
            <div class="col-12">
                <div class="accordion-content-wrapper" id="filesAccordion" role="tablist" aria-multiselectable="true">
                    <?php $__currentLoopData = $filesWithoutChapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('web.default.course.tabs.contents.files' , ['file' => $file, 'accordionParent' => 'filesAccordion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if(!empty($textLessonsWithoutChapter) and count($textLessonsWithoutChapter)): ?>
    <section class="mt-20">
        <div class="row">
            <div class="col-12">
                <div class="accordion-content-wrapper" id="textLessonsAccordion" role="tablist" aria-multiselectable="true">
                    <?php $__currentLoopData = $textLessonsWithoutChapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $textLesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('web.default.course.tabs.contents.text_lessons' , ['textLesson' => $textLesson, 'accordionParent' => 'textLessonsAccordion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<?php if(!empty($quizzes) and $quizzes->count() > 0): ?>
    <section class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('update.quiz_and_certificates')); ?></h2>

        <div class="row">
            <div class="col-12">
                <div class="accordion-content-wrapper" id="quizAccordion" role="tablist" aria-multiselectable="true">
                    <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('web.default.course.tabs.contents.quiz' , ['quiz' => $quiz, 'accordionParent' => 'quizAccordion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    

    <section class="">
        <?php echo $__env->make('web.default.course.tabs.contents.certificate' , ['quizzes' => $course->quizzes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php endif; ?>


<?php echo $__env->make('web.default.course.tabs.play_modal.play_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/course/tabs/content.blade.php ENDPATH**/ ?>