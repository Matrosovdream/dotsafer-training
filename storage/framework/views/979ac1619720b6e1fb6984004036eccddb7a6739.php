<div class="webinar-card">
    <figure>
        <div class="image-box">
            <div class="badges-lists">
                <?php if(!empty($upcomingCourse->webinar_id)): ?>
                    <span class="badge badge-secondary"><?php echo e(trans('update.released')); ?></span>
                <?php endif; ?>

                <?php echo $__env->make('web.default.includes.product_custom_badge', ['itemTarget' => $upcomingCourse], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <a href="<?php echo e($upcomingCourse->getUrl()); ?>">
                <img src="<?php echo e($upcomingCourse->getImage()); ?>" class="img-cover" alt="<?php echo e($upcomingCourse->title); ?>">
            </a>

            <?php if(empty($upcomingCourse->webinar_id)): ?>
                <a href="<?php echo e($upcomingCourse->addToCalendarLink()); ?>" target="_blank" class="upcoming-bell d-flex align-items-center justify-content-center">
                    <i data-feather="bell" width="20" height="20"></i>
                </a>
            <?php endif; ?>
        </div>

        <figcaption class="webinar-card-body">
            <div class="user-inline-avatar d-flex align-items-center">
                <div class="avatar bg-gray200">
                    <img src="<?php echo e($upcomingCourse->teacher->getAvatar()); ?>" class="img-cover" alt="<?php echo e($upcomingCourse->teacher->full_name); ?>">
                </div>
                <a href="<?php echo e($upcomingCourse->teacher->getProfileUrl()); ?>" target="_blank" class="user-name ml-5 font-14"><?php echo e($upcomingCourse->teacher->full_name); ?></a>
            </div>

            <a href="<?php echo e($upcomingCourse->getUrl()); ?>">
                <h3 class="mt-15 webinar-title font-weight-bold font-16 text-dark-blue"><?php echo e(clean($upcomingCourse->title,'title')); ?></h3>
            </a>

            <?php if(!empty($upcomingCourse->category)): ?>
                <span class="d-block font-14 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($upcomingCourse->category->getUrl()); ?>" target="_blank" class="text-decoration-underline"><?php echo e($upcomingCourse->category->title); ?></a></span>
            <?php endif; ?>

            <div class="d-flex justify-content-between mt-20">
                <?php if(!empty($upcomingCourse->duration)): ?>
                    <div class="d-flex align-items-center">
                        <i data-feather="clock" width="20" height="20" class="webinar-icon"></i>
                        <span class="duration font-14 ml-5"><?php echo e(convertMinutesToHourAndMinute($upcomingCourse->duration)); ?> <?php echo e(trans('home.hours')); ?></span>
                    </div>
                <?php endif; ?>

                <?php if(!empty($upcomingCourse->published_date)): ?>

                    <?php if(!empty($upcomingCourse->duration)): ?>
                        <div class="vertical-line mx-15"></div>
                    <?php endif; ?>

                    <div class="d-flex align-items-center">
                        <i data-feather="calendar" width="20" height="20" class="webinar-icon"></i>
                        <span class="date-published font-14 ml-5"><?php echo e(dateTimeFormat($upcomingCourse->published_date, 'j M Y')); ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <div class="webinar-price-box mt-25">
                <?php if(!empty($upcomingCourse->price) and $upcomingCourse->price > 0): ?>
                    <span class="real"><?php echo e(handlePrice($upcomingCourse->price)); ?></span>
                <?php else: ?>
                    <span class="real font-14"><?php echo e(trans('public.free')); ?></span>
                <?php endif; ?>
            </div>
        </figcaption>
    </figure>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/includes/webinar/upcoming_course_grid_card.blade.php ENDPATH**/ ?>