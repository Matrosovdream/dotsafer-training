<div class="mt-35">
    <h2 class="section-title after-line"><?php echo e(trans('panel.comments')); ?> <span class="ml-5">(<?php echo e($comments->count()); ?>)</span></h2>

    <div class="mt-20">
        <form action="/comments/store" method="post">

            <input type="hidden" name="_token" value=" <?php echo e(csrf_token()); ?>">
            <input type="hidden" id="commentItemId" name="item_id" value="<?php echo e($inputValue); ?>">
            <input type="hidden" id="commentItemName" name="item_name" value="<?php echo e($inputName); ?>">

            <div class="form-group">
                <textarea name="comment" class="form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="10"></textarea>
                <div class="invalid-feedback"><?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(trans('product.post_comment')); ?></button>
        </form>
    </div>

    <?php if(!empty(session()->has('msg'))): ?>
        <div class="alert alert-success my-25">
            <?php echo e(session()->get('msg')); ?>

        </div>
    <?php endif; ?>

    <?php if($comments): ?>
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="comments-card shadow-lg rounded-sm border px-20 py-15 mt-30" data-address="/comments/<?php echo e($comment->id); ?>/reply" data-csrf="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($comment->id); ?>">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="user-inline-avatar d-flex align-items-center mt-10">
                        <div class="avatar bg-gray200">
                            <img src="<?php echo e($comment->user->getAvatar()); ?>" class="img-cover" alt="">
                        </div>
                        <div class="d-flex flex-column ml-5">
                            <span class="font-weight-500 text-secondary"><?php echo e($comment->user->full_name); ?></span>
                            <span class="font-12 text-gray">
                                <?php if(!$comment->user->isUser() and !empty($course) and ($course->creator_id == $comment->user_id or $course->teacher_id == $comment->user_id)): ?>
                                    <?php echo e(trans('panel.teacher')); ?>

                                <?php elseif($comment->user->isUser() or (!empty($course) and $course->checkUserHasBought($comment->user))): ?>
                                    <?php echo e(trans('quiz.student')); ?>

                                <?php elseif($comment->user->isAdmin()): ?>
                                    <?php echo e(trans('panel.staff')); ?>

                                <?php else: ?>
                                    <?php echo e(trans('panel.user')); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <span class="font-12 text-gray mr-10"><?php echo e(dateTimeFormat($comment->created_at, 'j M Y | H:i')); ?></span>

                        <div class="btn-group dropdown table-actions">
                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-vertical" height="20"></i>
                            </button>
                            <div class="dropdown-menu">
                                <button type="button" class="btn-transparent webinar-actions d-block text-hover-primary reply-comment"><?php echo e(trans('panel.reply')); ?></button>
                                <button type="button" data-item-id="<?php echo e($inputValue); ?>" data-comment-id="<?php echo e($comment->id); ?>" class="btn-transparent webinar-actions d-block mt-10 text-hover-primary report-comment"><?php echo e(trans('panel.report')); ?></button>

                                <?php if(auth()->check() and auth()->user()->id == $comment->user_id): ?>
                                    <a href="/comments/<?php echo e($comment->id); ?>/delete" class="webinar-actions d-block mt-10 text-hover-primary"><?php echo e(trans('public.delete')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="font-14 mt-20 text-gray">
                    <?php echo nl2br(clean($comment->comment)); ?>

                </div>

                <?php if(!empty($comment->replies) and $comment->replies->count() > 0): ?>
                    <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-sm border px-20 py-15 mt-30">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="user-inline-avatar d-flex align-items-center mt-10">
                                    <div class="avatar bg-gray200">
                                        <img src="<?php echo e($reply->user->getAvatar()); ?>" class="img-cover" alt="">
                                    </div>
                                    <div class="d-flex flex-column ml-5">
                                        <span class="font-weight-500 text-secondary"><?php echo e($reply->user->full_name); ?></span>
                                        <span class="font-12 text-gray">
                                            <?php if(!$reply->user->isUser() and !empty($course) and ($course->creator_id == $reply->user_id or $course->teacher_id == $reply->user_id)): ?>
                                                <?php echo e(trans('panel.teacher')); ?>

                                            <?php elseif($reply->user->isUser() or (!empty($course) and $course->checkUserHasBought($reply->user))): ?>
                                                <?php echo e(trans('quiz.student')); ?>

                                            <?php elseif($reply->user->isAdmin()): ?>
                                                <?php echo e(trans('panel.staff')); ?>

                                            <?php else: ?>
                                                <?php echo e(trans('panel.user')); ?>

                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <span class="font-12 text-gray mr-10"><?php echo e(dateTimeFormat($reply->created_at, 'j M Y | H:i')); ?></span>

                                    <div class="btn-group dropdown table-actions">
                                        <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical" height="20"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="btn-transparent webinar-actions d-block text-hover-primary reply-comment"><?php echo e(trans('panel.reply')); ?></button>
                                            <button type="button" data-item-id="<?php echo e($inputValue); ?>" data-comment-id="<?php echo e($reply->id); ?>" class="btn-transparent webinar-actions d-block mt-10 text-hover-primary report-comment"><?php echo e(trans('panel.report')); ?></button>

                                            <?php if(auth()->check() and auth()->user()->id == $reply->user_id): ?>
                                                <a href="/comments/<?php echo e($reply->id); ?>/delete" class="webinar-actions d-block mt-10 text-hover-primary"><?php echo e(trans('public.delete')); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="font-14 mt-20 text-gray">
                                <?php echo nl2br(clean($reply->comment)); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>

<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/includes/comments.blade.php ENDPATH**/ ?>