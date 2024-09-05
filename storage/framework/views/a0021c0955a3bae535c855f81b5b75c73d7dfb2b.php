<div class="row">
    <div class="col-12">
        <div class="accordion-content-wrapper" id="chaptersAccordion" role="tablist" aria-multiselectable="true">
            <?php $__currentLoopData = $course->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if((!empty($chapter->chapterItems) and count($chapter->chapterItems)) or (!empty($chapter->quizzes) and count($chapter->quizzes))): ?>
                    <div class="accordion-row rounded-sm border mt-20 p-15">
                        <div class="d-flex align-items-center justify-content-between" role="tab" id="chapter_<?php echo e($chapter->id); ?>">
                            <div class="js-chapter-collapse-toggle d-flex align-items-center" href="#collapseChapter<?php echo e($chapter->id); ?>" aria-controls="collapseChapter<?php echo e($chapter->id); ?>" data-parent="#chaptersAccordion" role="button" data-toggle="collapse" aria-expanded="true">
                                <span class="chapter-icon mr-15">
                                    <i data-feather="grid" class=""></i>
                                </span>

                                <span class="font-weight-bold text-secondary font-14"><?php echo e($chapter->title); ?></span>
                            </div>

                            <div class="d-flex align-items-center">
                                <span class="mr-15 font-14 text-gray">
                                    <?php echo e($chapter->getTopicsCount(true)); ?> <?php echo e(trans('public.parts')); ?>

                                    <?php echo e(!empty($chapter->getDuration()) ? ' - ' . convertMinutesToHourAndMinute($chapter->getDuration()) .' '. trans('public.hr') : ''); ?>

                                </span>

                                <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseChapter<?php echo e(!empty($chapter) ? $chapter->id :'record'); ?>" aria-controls="collapseChapter<?php echo e(!empty($chapter) ? $chapter->id :'record'); ?>" data-parent="#chaptersAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
                            </div>
                        </div>

                        <div id="collapseChapter<?php echo e($chapter->id); ?>" aria-labelledby="chapter_<?php echo e($chapter->id); ?>" class=" collapse" role="tabpanel">
                            <div class="panel-collapse">
                                <?php if(!empty($chapter->chapterItems) and count($chapter->chapterItems)): ?>
                                    <?php $__currentLoopData = $chapter->chapterItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapterItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($chapterItem->type == \App\Models\WebinarChapterItem::$chapterSession and !empty($chapterItem->session) and $chapterItem->session->status == 'active'): ?>
                                            <?php echo $__env->make('web.default.course.tabs.contents.sessions' , ['session' => $chapterItem->session, 'accordionParent' => 'chaptersAccordion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php elseif($chapterItem->type == \App\Models\WebinarChapterItem::$chapterFile and !empty($chapterItem->file) and $chapterItem->file->status == 'active'): ?>
                                            <?php echo $__env->make('web.default.course.tabs.contents.files' , ['file' => $chapterItem->file, 'accordionParent' => 'chaptersAccordion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php elseif($chapterItem->type == \App\Models\WebinarChapterItem::$chapterTextLesson and !empty($chapterItem->textLesson) and $chapterItem->textLesson->status == 'active'): ?>
                                            <?php echo $__env->make('web.default.course.tabs.contents.text_lessons' , ['textLesson' => $chapterItem->textLesson, 'accordionParent' => 'chaptersAccordion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php elseif($chapterItem->type == \App\Models\WebinarChapterItem::$chapterAssignment and !empty($chapterItem->assignment) and $chapterItem->assignment->status == 'active'): ?>
                                            <?php echo $__env->make('web.default.course.tabs.contents.assignment' ,['assignment' => $chapterItem->assignment, 'accordionParent' => 'chaptersAccordion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php elseif($chapterItem->type == \App\Models\WebinarChapterItem::$chapterQuiz and !empty($chapterItem->quiz) and $chapterItem->quiz->status == 'active'): ?>
                                            <?php echo $__env->make('web.default.course.tabs.contents.quiz' ,['quiz' => $chapterItem->quiz, 'accordionParent' => 'chaptersAccordion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/course/tabs/contents/chapter.blade.php ENDPATH**/ ?>