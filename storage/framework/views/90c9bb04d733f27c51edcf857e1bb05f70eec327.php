<div class="webinar-card webinar-list webinar-list-2 d-flex mt-30">
    <div class="image-box">
        <div class="badges-lists">
            <?php if($webinar->bestTicket() < $webinar->price): ?>
                <span class="badge badge-danger"><?php echo e(trans('public.offer',['off' => $webinar->bestTicket(true)['percent']])); ?></span>
            <?php elseif(empty($isFeature) and !empty($webinar->feature)): ?>
                <span class="badge badge-warning"><?php echo e(trans('home.featured')); ?></span>
            <?php elseif($webinar->type == 'webinar'): ?>
                <?php if($webinar->start_date > time()): ?>
                    <span class="badge badge-primary"><?php echo e(trans('panel.not_conducted')); ?></span>
                <?php elseif($webinar->isProgressing()): ?>
                    <span class="badge badge-secondary"><?php echo e(trans('webinars.in_progress')); ?></span>
                <?php else: ?>
                    <span class="badge badge-secondary"><?php echo e(trans('public.finished')); ?></span>
                <?php endif; ?>
            <?php else: ?>
                <span class="badge badge-primary"><?php echo e(trans('webinars.'.$webinar->type)); ?></span>
            <?php endif; ?>
        </div>

        <a href="<?php echo e($webinar->getUrl()); ?>">
            <img src="<?php echo e($webinar->getImage()); ?>" class="img-cover" alt="<?php echo e($webinar->title); ?>">
        </a>

        <div class="progress-and-bell d-flex align-items-center">

            <?php if($webinar->type == 'webinar'): ?>
                <a href="<?php echo e($webinar->addToCalendarLink()); ?>" target="_blank" class="webinar-notify d-flex align-items-center justify-content-center">
                    <i data-feather="bell" width="20" height="20" class="webinar-icon"></i>
                </a>
            <?php endif; ?>

            <?php if($webinar->type == 'webinar'): ?>
                <div class="progress ml-10">
                    <span class="progress-bar" style="width: <?php echo e($webinar->getProgress()); ?>%"></span>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="webinar-card-body w-100 d-flex flex-column">
        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php echo e($webinar->getUrl()); ?>">
                <h3 class="mt-15 webinar-title font-weight-bold font-16 text-dark-blue"><?php echo e(clean($webinar->title,'title')); ?></h3>
            </a>
        </div>

        <?php if(!empty($webinar->category)): ?>
            <span class="d-block font-14 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($webinar->category->getUrl()); ?>" target="_blank" class="text-decoration-underline"><?php echo e($webinar->category->title); ?></a></span>
        <?php endif; ?>

        <div class="user-inline-avatar d-flex align-items-center mt-10">
            <div class="avatar bg-gray200">
                <img src="<?php echo e($webinar->teacher->getAvatar()); ?>" class="img-cover" alt="<?php echo e($webinar->teacher->full_name); ?>">
            </div>
            <a href="<?php echo e($webinar->teacher->getProfileUrl()); ?>" target="_blank" class="user-name ml-5 font-14"><?php echo e($webinar->teacher->full_name); ?></a>
        </div>

        <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',['rate' => $webinar->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="d-flex justify-content-between mt-auto">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <i data-feather="clock" width="20" height="20" class="webinar-icon"></i>
                    <span class="duration ml-5 font-14"><?php echo e(convertMinutesToHourAndMinute($webinar->duration)); ?> <?php echo e(trans('home.hours')); ?></span>
                </div>

                <div class="vertical-line h-25 mx-15"></div>

                <div class="d-flex align-items-center">
                    <i data-feather="calendar" width="20" height="20" class="webinar-icon"></i>
                    <span class="date-published ml-5 font-14"><?php echo e(dateTimeFormat(!empty($webinar->start_date) ? $webinar->start_date : $webinar->created_at,'j M Y')); ?></span>
                </div>
            </div>

            <div class="webinar-price-box d-flex flex-column justify-content-center align-items-center">
                <?php if(!empty($webinar->price) and $webinar->price > 0): ?>
                    <?php if($webinar->bestTicket() < $webinar->price): ?>
                        <span class="off"><?php echo e(handlePrice($webinar->price, true, true, false, null, true)); ?></span>
                        <span class="real"><?php echo e(handlePrice($webinar->bestTicket(), true, true, false, null, true)); ?></span>
                    <?php else: ?>
                        <span class="real"><?php echo e(handlePrice($webinar->price, true, true, false, null, true)); ?></span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="real font-14"><?php echo e(trans('public.free')); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/includes/webinar/list-card.blade.php ENDPATH**/ ?>