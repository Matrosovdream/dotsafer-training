<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<?php
    $rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];

    $isRtl = ((in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages)) or (!empty($generalSettings['rtl_layout']) and $generalSettings['rtl_layout'] == 1));
?>

<head>
    <?php echo $__env->make('web.default.includes.metas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e($pageTitle ?? ''); ?><?php echo e(!empty($generalSettings['site_name']) ? (' | '.$generalSettings['site_name']) : ''); ?></title>

    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/toast/jquery.toast.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/simplebar/simplebar.css">
    <link rel="stylesheet" href="/assets/default/css/app.css">

    <?php if($isRtl): ?>
        <link rel="stylesheet" href="/assets/default/css/rtl-app.css">
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('styles_top'); ?>
    <?php echo $__env->yieldPushContent('scripts_top'); ?>

    <style>
        <?php echo !empty(getCustomCssAndJs('css')) ? getCustomCssAndJs('css') : ''; ?>


        <?php echo getThemeFontsSettings(); ?>


        <?php echo getThemeColorsSettings(); ?>

    </style>


    <?php if(!empty($generalSettings['preloading']) and $generalSettings['preloading'] == '1'): ?>
        <?php echo $__env->make('admin.includes.preloading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</head>

<body class="<?php if($isRtl): ?> rtl <?php endif; ?>">

<div id="app" class="<?php echo e((!empty($floatingBar) and $floatingBar->position == 'top' and $floatingBar->fixed) ? 'has-fixed-top-floating-bar' : ''); ?>">
    <?php if(!empty($floatingBar) and $floatingBar->position == 'top'): ?>
        <?php echo $__env->make('web.default.includes.floating_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(!isset($appHeader)): ?>
        <?php echo $__env->make('web.default.includes.top_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('web.default.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(!empty($justMobileApp)): ?>
        <?php echo $__env->make('web.default.includes.mobile_app_top_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php if(!isset($appFooter)): ?>
        <?php echo $__env->make('web.default.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('web.default.includes.advertise_modal.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(!empty($floatingBar) and $floatingBar->position == 'bottom'): ?>
        <?php echo $__env->make('web.default.includes.floating_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>
<!-- Template JS File -->
<script src="/assets/default/js/app.js"></script>
<script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>
<script src="/assets/default/vendors/moment.min.js"></script>
<script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="/assets/default/vendors/toast/jquery.toast.min.js"></script>
<script type="text/javascript" src="/assets/default/vendors/simplebar/simplebar.min.js"></script>

<?php if(empty($justMobileApp) and checkShowCookieSecurityDialog()): ?>
    <?php echo $__env->make('web.default.includes.cookie-security', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<script>
    var deleteAlertTitle = '<?php echo e(trans('public.are_you_sure')); ?>';
    var deleteAlertHint = '<?php echo e(trans('public.deleteAlertHint')); ?>';
    var deleteAlertConfirm = '<?php echo e(trans('public.deleteAlertConfirm')); ?>';
    var deleteAlertCancel = '<?php echo e(trans('public.cancel')); ?>';
    var deleteAlertSuccess = '<?php echo e(trans('public.success')); ?>';
    var deleteAlertFail = '<?php echo e(trans('public.fail')); ?>';
    var deleteAlertFailHint = '<?php echo e(trans('public.deleteAlertFailHint')); ?>';
    var deleteAlertSuccessHint = '<?php echo e(trans('public.deleteAlertSuccessHint')); ?>';
    var forbiddenRequestToastTitleLang = '<?php echo e(trans('public.forbidden_request_toast_lang')); ?>';
    var forbiddenRequestToastMsgLang = '<?php echo e(trans('public.forbidden_request_toast_msg_lang')); ?>';
</script>

<?php if(session()->has('toast')): ?>
    <script>
        (function () {
            "use strict";

            $.toast({
                heading: '<?php echo e(session()->get('toast')['title'] ?? ''); ?>',
                text: '<?php echo e(session()->get('toast')['msg'] ?? ''); ?>',
                bgColor: '<?php if(session()->get('toast')['status'] == 'success'): ?> #43d477 <?php else: ?> #f63c3c <?php endif; ?>',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: '<?php echo e(session()->get('toast')['status']); ?>'
            });
        })(jQuery)
    </script>
<?php endif; ?>

<?php echo $__env->make('web.default.includes.purchase_notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldPushContent('styles_bottom'); ?>
<?php echo $__env->yieldPushContent('scripts_bottom'); ?>

<script src="/assets/default/js/parts/main.min.js"></script>

<script>
    <?php if(session()->has('registration_package_limited')): ?>
    (function () {
        "use strict";

        handleLimitedAccountModal('<?php echo session()->get('registration_package_limited'); ?>')
    })(jQuery)

    <?php echo e(session()->forget('registration_package_limited')); ?>

    <?php endif; ?>

    <?php echo !empty(getCustomCssAndJs('js')) ? getCustomCssAndJs('js') : ''; ?>

</script>
</body>
</html>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/layouts/app.blade.php ENDPATH**/ ?>