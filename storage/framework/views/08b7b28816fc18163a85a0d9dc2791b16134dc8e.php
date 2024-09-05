<?php
    $statisticsSettings = getStatisticsSettings();
?>

<?php if(!empty($statisticsSettings['enable_statistics'])): ?>
    <?php if(!empty($statisticsSettings['display_default_statistics']) and !empty($homeDefaultStatistics)): ?>
        <div class="stats-container <?php echo e(($heroSection == "2") ? 'page-has-hero-section-2' : ''); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                        <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                            <div class="stat-icon-box teacher">
                                <img src="/assets/default/img/stats/teacher.svg" alt="" class="img-fluid"/>
                            </div>
                            <strong class="stat-number mt-10"><?php echo e($homeDefaultStatistics['skillfulTeachersCount']); ?></strong>
                            <h4 class="stat-title"><?php echo e(trans('home.skillful_teachers')); ?></h4>
                            <p class="stat-desc mt-10"><?php echo e(trans('home.skillful_teachers_hint')); ?></p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                        <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                            <div class="stat-icon-box student">
                                <img src="/assets/default/img/stats/student.svg" alt="" class="img-fluid"/>
                            </div>
                            <strong class="stat-number mt-10"><?php echo e($homeDefaultStatistics['studentsCount']); ?></strong>
                            <h4 class="stat-title"><?php echo e(trans('home.happy_students')); ?></h4>
                            <p class="stat-desc mt-10"><?php echo e(trans('home.happy_students_hint')); ?></p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                        <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                            <div class="stat-icon-box video">
                                <img src="/assets/default/img/stats/video.svg" alt="" class="img-fluid"/>
                            </div>
                            <strong class="stat-number mt-10"><?php echo e($homeDefaultStatistics['liveClassCount']); ?></strong>
                            <h4 class="stat-title"><?php echo e(trans('home.live_classes')); ?></h4>
                            <p class="stat-desc mt-10"><?php echo e(trans('home.live_classes_hint')); ?></p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                        <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                            <div class="stat-icon-box course">
                                <img src="/assets/default/img/stats/course.svg" alt="" class="img-fluid"/>
                            </div>
                            <strong class="stat-number mt-10"><?php echo e($homeDefaultStatistics['offlineCourseCount']); ?></strong>
                            <h4 class="stat-title"><?php echo e(trans('home.offline_courses')); ?></h4>
                            <p class="stat-desc mt-10"><?php echo e(trans('home.offline_courses_hint')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif(!empty($homeCustomStatistics)): ?>
        <div class="stats-container">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $homeCustomStatistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeCustomStatistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                            <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                                <div class="stat-icon-box " style="background-color: <?php echo e($homeCustomStatistic->color); ?>">
                                    <img src="<?php echo e($homeCustomStatistic->icon); ?>" alt="<?php echo e($homeCustomStatistic->title); ?>" class="img-fluid"/>
                                </div>
                                <strong class="stat-number mt-10"><?php echo e($homeCustomStatistic->count); ?></strong>
                                <h4 class="stat-title"><?php echo e($homeCustomStatistic->title); ?></h4>
                                <p class="stat-desc mt-10"><?php echo e($homeCustomStatistic->description); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="my-40"></div>
    <?php endif; ?>
<?php else: ?>
    <div class="my-40"></div>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/pages/includes/home_statistics.blade.php ENDPATH**/ ?>