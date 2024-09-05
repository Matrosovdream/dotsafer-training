<?php
    $registerMethod = getGeneralSettings('register_method') ?? 'mobile';
    $showOtherRegisterMethod = getFeaturesSettings('show_other_register_method') ?? false;
?>

<?php if($showOtherRegisterMethod): ?>
    <div class="d-flex align-items-center wizard-custom-radio mb-20">
        <div class="wizard-custom-radio-item flex-grow-1">
            <input type="radio" name="type" value="email" id="emailType" class="" <?php echo e((($registerMethod == 'email' and empty(old('type'))) or old('type') == "email") ? 'checked' : ''); ?>>
            <label class="font-12 cursor-pointer px-15 py-10" for="emailType"><?php echo e(trans('public.email')); ?></label>
        </div>

        <div class="wizard-custom-radio-item flex-grow-1">
            <input type="radio" name="type" value="mobile" id="mobileType" class="" <?php echo e((($registerMethod == 'mobile' and empty(old('type'))) or old('type') == "mobile") ? 'checked' : ''); ?>>
            <label class="font-12 cursor-pointer px-15 py-10" for="mobileType"><?php echo e(trans('public.mobile')); ?></label>
        </div>
    </div>

    <div class="js-email-fields form-group <?php echo e((($registerMethod == 'email' and empty(old('type'))) or old('type') == "email") ? '' : 'd-none'); ?>">
        <label class="input-label" for="email"><?php echo e(trans('public.email')); ?>:</label>
        <input name="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
               value="<?php echo e(old('email')); ?>" aria-describedby="emailHelp">
        <?php $__errorArgs = ['email'];
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


    <div class="js-mobile-fields <?php echo e((($registerMethod == 'mobile' and empty(old('type'))) or old('type') == "mobile") ? '' : 'd-none'); ?>">
        <?php echo $__env->make('web.default.auth.register_includes.mobile_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

<?php else: ?>
    <?php if($registerMethod == 'mobile'): ?>
        <input type="hidden" name="type" value="mobile">
        <div class="">
            <?php echo $__env->make('web.default.auth.register_includes.mobile_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    <?php else: ?>
        <input type="hidden" name="type" value="email">

        <div class=" form-group">
            <label class="input-label" for="email"><?php echo e(trans('public.email')); ?>:</label>
            <input name="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
                   value="<?php echo e(old('email')); ?>" aria-describedby="emailHelp">
            <?php $__errorArgs = ['email'];
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
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/auth/includes/register_methods.blade.php ENDPATH**/ ?>