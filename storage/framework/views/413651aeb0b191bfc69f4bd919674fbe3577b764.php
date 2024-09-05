<!-- Modal -->
<div class="d-none" id="webinarSessionModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('public.add_session')); ?></h3>

    <form action="<?php echo e(getAdminPanelUrl()); ?>/sessions/store" method="post" class="session-form">
        <input type="hidden" name="webinar_id" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                <select name="locale" class="form-control ">
                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['locale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        <?php else: ?>
            <input type="hidden" name="locale" value="<?php echo e(getDefaultLocale()); ?>">
        <?php endif; ?>


        <div class="form-group">
            <label class="input-label"><?php echo e(trans('webinars.select_session_api')); ?></label>

            <div class="js-session-api">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="session_api" id="localApi_record" value="local" checked class="js-api-input custom-control-input">
                    <label class="custom-control-label" for="localApi_record"><?php echo e(trans('webinars.session_local_api')); ?></label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="session_api" id="bigBlueButton_record" value="big_blue_button" class="js-api-input custom-control-input">
                    <label class="custom-control-label" for="bigBlueButton_record"><?php echo e(trans('webinars.session_big_blue_button')); ?></label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="session_api" id="zoomApi_record" value="zoom" class="js-api-input custom-control-input">
                    <label class="custom-control-label" for="zoomApi_record"><?php echo e(trans('webinars.session_zoom')); ?></label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="session_api" id="agoraApi_record" value="agora" class="js-api-input custom-control-input">
                    <label class="custom-control-label" for="agoraApi_record"><?php echo e(trans('update.agora')); ?></label>
                </div>
            </div>

            <div class="invalid-feedback"></div>

            
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.chapter')); ?></label>
            <select class="custom-select" name="chapter_id">
                <option value=""><?php echo e(trans('admin/main.no_chapter')); ?></option>

                <?php if(!empty($chapters)): ?>
                    <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($chapter->id); ?>"><?php echo e($chapter->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group js-api-secret">
            <label class="input-label"><?php echo e(trans('auth.password')); ?></label>
            <input type="text" name="api_secret" class="js-ajax-api_secret form-control" value=""/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group js-moderator-secret d-none">
            <label class="input-label"><?php echo e(trans('public.moderator_password')); ?></label>
            <input type="text" name="moderator_secret" class="js-ajax-moderator_secret form-control" value=""/>
            <div class="invalid-feedback"></div>
        </div>


        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
            <input type="text" name="title" class="form-control" placeholder="<?php echo e(trans('forms.maximum_255_characters')); ?>"/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.date')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="dateRangeLabel">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
                <input type="text" name="date" class="js-ajax-date form-control datetimepicker" aria-describedby="dateRangeLabel"/>
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.duration')); ?> <span class="braces">(<?php echo e(trans('public.minutes')); ?>)</span></label>
            <input type="text" name="duration" class="js-ajax-duration form-control" placeholder=""/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('update.extra_time_to_join')); ?> <span class="braces">(<?php echo e(trans('public.minutes')); ?>)</span></label>
            <input type="text" name="extra_time_to_join" class="js-ajax-extra_time_to_join form-control" placeholder=""/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group js-local-link">
            <label class="input-label"><?php echo e(trans('public.link')); ?></label>
            <input type="text" name="link" class="js-ajax-link form-control" placeholder=""/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.description')); ?></label>
            <textarea name="description" class="form-control" rows="6"></textarea>
            <div class="invalid-feedback"></div>
        </div>

        <div class="js-session-status form-group mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <label class="cursor-pointer input-label" for="sessionStatusSwitch_record"><?php echo e(trans('admin/main.active')); ?></label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="status" checked class="custom-control-input" id="sessionStatusSwitch_record">
                    <label class="custom-control-label" for="sessionStatusSwitch_record"></label>
                </div>
            </div>
        </div>

        <div class="js-agora-chat-and-rec d-none">
            <?php if(getFeaturesSettings('agora_chat')): ?>
                <div class="form-group mt-20">
                    <div class="d-flex align-items-center justify-content-between">
                        <label class="cursor-pointer input-label" for="sessionAgoraChatSwitch_record"><?php echo e(trans('update.chat')); ?></label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="agora_chat" class="custom-control-input" id="sessionAgoraChatSwitch_record">
                            <label class="custom-control-label" for="sessionAgoraChatSwitch_record"></label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            

        </div>

        <?php if(getFeaturesSettings('sequence_content_status')): ?>
            <div class="form-group mb-1">
                <div class="d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer input-label" for="SequenceContentSwitch_record"><?php echo e(trans('update.sequence_content')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="sequence_content" class="js-sequence-content-switch custom-control-input" id="SequenceContentSwitch_record">
                        <label class="custom-control-label" for="SequenceContentSwitch_record"></label>
                    </div>
                </div>
            </div>

            <div class="js-sequence-content-inputs pl-2 d-none">
                <div class="form-group mb-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <label class="cursor-pointer input-label" for="checkPreviousPartsSwitch_record"><?php echo e(trans('update.check_previous_parts')); ?></label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" checked name="check_previous_parts" class="custom-control-input" id="checkPreviousPartsSwitch_record">
                            <label class="custom-control-label" for="checkPreviousPartsSwitch_record"></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('update.access_after_day')); ?></label>
                    <input type="number" name="access_after_day" value="" class="js-ajax-access_after_day form-control" placeholder="<?php echo e(trans('update.access_after_day_placeholder')); ?>"/>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        <?php endif; ?>

        <div class="mt-3 d-flex align-items-center justify-content-end">
            <button type="button" id="saveSession" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/webinars/modals/session.blade.php ENDPATH**/ ?>