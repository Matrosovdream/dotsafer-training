<?php
    $learningMaterialsExtraDescription = !empty($course->webinarExtraDescription) ? $course->webinarExtraDescription->where('type','learning_materials') : null;
    $companyLogosExtraDescription = !empty($course->webinarExtraDescription) ? $course->webinarExtraDescription->where('type','company_logos') : null;
    $requirementsExtraDescription = !empty($course->webinarExtraDescription) ? $course->webinarExtraDescription->where('type','requirements') : null;
?>



<?php if(!empty($installments) and count($installments) and getInstallmentsSettings('installment_plans_position') == 'top_of_page'): ?>
    <?php $__currentLoopData = $installments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installmentRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('web.default.installment.card',['installment' => $installmentRow, 'itemPrice' => $course->getPrice(), 'itemId' => $course->id, 'itemType' => 'course'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(!empty($learningMaterialsExtraDescription) and count($learningMaterialsExtraDescription)): ?>
    <div class="mt-20 rounded-sm border bg-info-light p-15">
        <h3 class="font-16 text-secondary font-weight-bold mb-15"><?php echo e(trans('update.what_you_will_learn')); ?></h3>

        <?php $__currentLoopData = $learningMaterialsExtraDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $learningMaterial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="d-flex align-items-start font-14 text-gray mt-10">
                <i data-feather="check" width="18" height="18" class="mr-10 webinar-extra-description-check-icon"></i>
                <span class=""><?php echo e($learningMaterial->value); ?></span>
            </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>


<?php if($course->description): ?>
    <div class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('product.Webinar_description')); ?></h2>
        <div class="mt-15 course-description">
            <?php echo nl2br($course->description); ?>

        </div>
    </div>
<?php endif; ?>


<?php if(!empty($companyLogosExtraDescription) and count($companyLogosExtraDescription)): ?>
    <div class="mt-20 rounded-sm border bg-white p-15">
        <div class="mb-15">
            <h3 class="font-16 text-secondary font-weight-bold"><?php echo e(trans('update.suggested_by_top_companies')); ?></h3>
            <p class="font-14 text-gray mt-5"><?php echo e(trans('update.suggested_by_top_companies_hint')); ?></p>
        </div>

        <div class="row">
            <?php $__currentLoopData = $companyLogosExtraDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyLogo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col text-center">
                    <img src="<?php echo e($companyLogo->value); ?>" class="webinar-extra-description-company-logos" alt="<?php echo e(trans('update.company_logos')); ?>">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>

<?php if(!empty($requirementsExtraDescription) and count($requirementsExtraDescription)): ?>
    <div class="mt-20">
        <h3 class="font-16 text-secondary font-weight-bold mb-15"><?php echo e(trans('update.requirements')); ?></h3>

        <?php $__currentLoopData = $requirementsExtraDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirementExtraDescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="d-flex align-items-start font-14 text-gray mt-10">
                <i data-feather="check" width="18" height="18" class="mr-10 webinar-extra-description-check-icon"></i>
                <span class=""><?php echo e($requirementExtraDescription->value); ?></span>
            </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>


<?php if(!empty($course->prerequisites) and $course->prerequisites->count() > 0): ?>

    <div class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('public.prerequisites')); ?></h2>

        <?php $__currentLoopData = $course->prerequisites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prerequisite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($prerequisite->prerequisiteWebinar): ?>
                <?php echo $__env->make('web.default.includes.webinar.list-card',['webinar' => $prerequisite->prerequisiteWebinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>




<?php if(!empty($course->relatedCourses) and $course->relatedCourses->count() > 0): ?>

    <div class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('update.related_courses')); ?></h2>

        <?php $__currentLoopData = $course->relatedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($relatedCourse->course): ?>
                <?php echo $__env->make('web.default.includes.webinar.list-card',['webinar' => $relatedCourse->course], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>



<?php if(!empty($course->faqs) and $course->faqs->count() > 0): ?>
    <div class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('public.faq')); ?></h2>

        <div class="accordion-content-wrapper mt-15" id="accordion" role="tablist" aria-multiselectable="true">
            <?php $__currentLoopData = $course->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="accordion-row rounded-sm shadow-lg border mt-20 py-20 px-35">
                    <div class="font-weight-bold font-14 text-secondary" role="tab" id="faq_<?php echo e($faq->id); ?>">
                        <div href="#collapseFaq<?php echo e($faq->id); ?>" aria-controls="collapseFaq<?php echo e($faq->id); ?>" class="d-flex align-items-center justify-content-between" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true">
                            <span><?php echo e(clean($faq->title,'title')); ?></span>
                            <i class="collapse-chevron-icon" data-feather="chevron-down" width="25" class="text-gray"></i>
                        </div>
                    </div>
                    <div id="collapseFaq<?php echo e($faq->id); ?>" aria-labelledby="faq_<?php echo e($faq->id); ?>" class=" collapse" role="tabpanel">
                        <div class="panel-collapse text-gray">
                            <?php echo e(clean($faq->answer,'answer')); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>



<?php if(!empty($installments) and count($installments) and getInstallmentsSettings('installment_plans_position') == 'bottom_of_page'): ?>
    <?php $__currentLoopData = $installments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installmentRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('web.default.installment.card',['installment' => $installmentRow, 'itemPrice' => $course->getPrice(), 'itemId' => $course->id, 'itemType' => 'course'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php echo $__env->make('web.default.includes.comments',[
        'comments' => $course->comments,
        'inputName' => 'webinar_id',
        'inputValue' => $course->id
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/course/tabs/information.blade.php ENDPATH**/ ?>