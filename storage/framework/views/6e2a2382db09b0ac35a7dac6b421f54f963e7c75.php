<div class="rounded-lg shadow-sm mt-35 p-20 course-teacher-card d-flex align-items-center flex-column">

    <?php if(!empty($webinarPartnerTeacher)): ?>
        <span class="user-select-none px-15 py-10 bg-gray200 off-label text-gray text-white font-12 rounded-sm ml-auto"><?php echo e(trans('public.invited')); ?></span>
    <?php endif; ?>

    <div class="teacher-avatar mt-5">
        <img src="<?php echo e($courseTeacher->getAvatar(100)); ?>" class="img-cover" alt="<?php echo e($courseTeacher->full_name); ?>">

        <?php if($courseTeacher->offline): ?>
            <span class="user-circle-badge unavailable d-flex align-items-center justify-content-center">
              <i data-feather="slash" width="20" height="20" class="text-white"></i>
           </span>
        <?php elseif($courseTeacher->verified): ?>
            <span class="user-circle-badge has-verified d-flex align-items-center justify-content-center">
                <i data-feather="check" width="20" height="20" class="text-white"></i>
            </span>
        <?php endif; ?>
    </div>
    <h3 class="mt-10 font-16 font-weight-bold text-secondary"><?php echo e($courseTeacher->full_name); ?></h3>
    <span class="mt-5 font-14 font-weight-500 text-gray text-center"><?php echo e($courseTeacher->bio); ?></span>

    <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $courseTeacher->rates()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="user-reward-badges d-flex flex-wrap align-items-center mt-20">
        <?php $__currentLoopData = $courseTeacher->getBadges(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userBadge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mr-15 mt-10" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<?php echo (!empty($userBadge->badge_id) ? nl2br($userBadge->badge->description) : nl2br($userBadge->description)); ?>">
                <img src="<?php echo e(!empty($userBadge->badge_id) ? $userBadge->badge->image : $userBadge->image); ?>" width="32" height="32" alt="<?php echo e(!empty($userBadge->badge_id) ? $userBadge->badge->title : $userBadge->title); ?>">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php
        $hasMeeting = !empty($courseTeacher->hasMeeting());
    ?>

    <div class="mt-25 d-flex flex-row align-items-center justify-content-center w-100">
        <a href="<?php echo e($courseTeacher->getProfileUrl()); ?>" target="_blank" class="btn btn-sm btn-primary <?php echo e($hasMeeting ? 'teacher-btn-action' : 'btn-block'); ?>"><?php echo e(trans('public.profile')); ?></a>

        <?php if($hasMeeting): ?>
            <a href="<?php echo e($courseTeacher->getProfileUrl()); ?>" class="btn btn-sm btn-primary teacher-btn-action ml-15"><?php echo e(trans('public.book_a_meeting')); ?></a>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/course/sidebar_instructor_profile.blade.php ENDPATH**/ ?>