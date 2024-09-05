<div class="mt-35">
    <div class="course-reviews-box row align-items-center">
        <div class="col-3 text-center">
            <div class="reviews-rate font-36 font-weight-bold text-primary"><?php echo e($course->getRate()); ?></div>

            <div class="text-center">
                <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',[
                    'rate' => round($course->getRate(),1),
                    'dontShowRate' => true,
                    'className' => 'justify-content-center mt-0'
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="mt-15"><?php echo e($course->reviews->pluck('creator_id')->count()); ?>  <?php echo e(trans('product.reviews')); ?></div>
            </div>
        </div>

        <div class="col-9">
            <div class="d-flex align-items-center">
                <div class="progress course-progress rounded-sm">
                    <span class="progress-bar rounded-sm" style="width: <?php echo e($course->reviews->avg('content_quality') / 5 * 100); ?>%"></span>
                </div>
                <span class="ml-15 font-14 text-gray text-left"><?php echo e(trans('product.content_quality')); ?> (<?php echo e($course->reviews->count() > 0 ? round($course->reviews->avg('content_quality'), 1) : 0); ?>)</span>
            </div>

            <div class="mt-25 d-flex align-items-center">
                <div class="progress course-progress rounded-sm">
                    <span class="progress-bar rounded-sm" style="width: <?php echo e($course->reviews->avg('instructor_skills') / 5 * 100); ?>%"></span>
                </div>
                <span class="ml-15 font-14 text-gray text-left"><?php echo e(trans('product.instructor_skills')); ?> (<?php echo e($course->reviews->count() > 0 ? round($course->reviews->avg('instructor_skills'), 1) : 0); ?>)</span>
            </div>

            <div class="mt-25 d-flex align-items-center">
                <div class="progress course-progress rounded-sm">
                    <span class="progress-bar rounded-sm" style="width: <?php echo e($course->reviews->avg('purchase_worth') / 5 * 100); ?>%"></span>
                </div>
                <span class="ml-15 font-14 text-gray text-left"><?php echo e(trans('product.purchase_worth')); ?> (<?php echo e($course->reviews->count() > 0 ? round($course->reviews->avg('purchase_worth'), 1) : 0); ?>)</span>
            </div>

            <div class="mt-25 d-flex align-items-center">
                <div class="progress course-progress rounded-sm">
                    <span class="progress-bar rounded-sm" style="width: <?php echo e($course->reviews->avg('support_quality') / 5 * 100); ?>%"></span>
                </div>
                <span class="ml-15 font-14 text-gray text-left"><?php echo e(trans('product.support_quality')); ?> (<?php echo e($course->reviews->count() > 0 ? round($course->reviews->avg('support_quality'), 1) : 0); ?>)</span>
            </div>

        </div>
    </div>
</div>

<section class="mt-40">
    <h2 class="section-title after-line"><?php echo e(trans('product.reviews')); ?> (<?php echo e($course->reviews->pluck('creator_id')->count()); ?>)</h2>

    <form action="/reviews/store" class="mt-20" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="webinar_id" value="<?php echo e($course->id); ?>"/>

        <div class="form-group">
            <textarea name="description" class="form-control" rows="10"></textarea>
        </div>

        <div class="reviews-stars row align-items-center">

            <div class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars">
                <span class="font-14 text-gray"><?php echo e(trans('product.content_quality')); ?></span>
                <select name="content_quality" data-rate="1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars">
                <span class="font-14 text-gray"><?php echo e(trans('product.instructor_skills')); ?></span>
                <select name="instructor_skills" data-rate="1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars">
                <span class="font-14 text-gray"><?php echo e(trans('product.purchase_worth')); ?></span>
                <select name="purchase_worth" data-rate="1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars">
                <span class="font-14 text-gray"><?php echo e(trans('product.support_quality')); ?></span>
                <select name="support_quality" data-rate="1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-sm btn-primary mt-20"><?php echo e(trans('product.post_review')); ?></button>
    </form>

    <div class="mt-45">
        <?php if($course->reviews->count() > 0): ?>
            <?php $__currentLoopData = $course->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="comments-card shadow-lg rounded-sm border px-20 py-15 mt-30" data-address="/reviews/store-reply-comment" data-csrf="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($review->id); ?>">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="user-inline-avatar d-flex align-items-center mt-10">
                            <div class="avatar bg-gray200">
                                <img src="<?php echo e($review->creator->getAvatar()); ?>" class="img-cover" alt="">
                            </div>
                            <div class="d-flex flex-column ml-5">
                                <span class="font-weight-500 text-secondary"><?php echo e($review->creator->full_name); ?></span>

                                <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',[
                                        'rate' => $review->rates,
                                        'dontShowRate' => true,
                                        'className' => 'justify-content-start mt-0'
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <span class="font-12 text-gray mr-10"><?php echo e(dateTimeFormat($review->created_at, 'j M Y | H:i')); ?></span>

                            <div class="btn-group dropdown table-actions">
                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="more-vertical" height="20"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="/reviews/store-reply-comment" class="webinar-actions d-block text-hover-primary reply-comment"><?php echo e(trans('panel.reply')); ?></a>

                                    <?php if(!empty($user) and $user->id == $review->creator_id): ?>
                                        <a href="/reviews/<?php echo e($review->id); ?>/delete" class="webinar-actions d-block mt-10 text-hover-primary"><?php echo e(trans('public.delete')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-20 text-gray font-14">
                        <?php echo clean($review->description,'description'); ?>

                    </div>

                    <?php if($review->comments->count() > 0): ?>
                        <?php $__currentLoopData = $review->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="shadow-lg rounded-sm border px-20 py-15 mt-30">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="user-inline-avatar d-flex align-items-center mt-10">
                                        <div class="avatar bg-gray200">
                                            <img src="<?php echo e($comment->user->getAvatar()); ?>" class="img-cover" alt="<?php echo e($comment->user->full_name); ?>">
                                        </div>
                                        <div class="d-flex flex-column ml-5">
                                            <span class="font-weight-500 text-secondary"><?php echo e($comment->user->full_name); ?></span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <span class="font-12 text-gray mr-10"><?php echo e(dateTimeFormat($comment->created_at, 'j M Y | H:i')); ?></span>

                                        <div class="btn-group dropdown table-actions">
                                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical" height="20"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="" class="webinar-actions d-block text-hover-primary reply-comment"><?php echo e(trans('panel.reply')); ?></a>
                                                <a href="/comments/<?php echo e($comment->id); ?>/delete" class="webinar-actions d-block mt-10 text-hover-primary"><?php echo e(trans('public.delete')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-20 text-gray">
                                    <?php echo clean($comment->comment,'comment'); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/course/tabs/reviews.blade.php ENDPATH**/ ?>