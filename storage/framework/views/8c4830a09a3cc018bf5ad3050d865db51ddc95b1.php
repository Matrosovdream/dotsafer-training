<?php
    $userLanguages = !empty($generalSettings['site_language']) ? [$generalSettings['site_language'] => getLanguages($generalSettings['site_language'])] : [];

    if (!empty($generalSettings['user_languages']) and is_array($generalSettings['user_languages'])) {
        $userLanguages = getLanguages($generalSettings['user_languages']);
    }

    $localLanguage = [];

    foreach($userLanguages as $key => $userLanguage) {
        $localLanguage[localeToCountryCode($key)] = $userLanguage;
    }

?>

<?php if(!empty($localLanguage) and count($localLanguage) > 1): ?>
    <form action="/locale" method="post" class="mr-2 mr-md-3 mb-0 admin-navbar-locale">
        <?php echo e(csrf_field()); ?>


        <input type="hidden" name="locale">

        <?php if(!empty($previousUrl)): ?>
            <input type="hidden" name="previous_url" value="<?php echo e($previousUrl); ?>">
        <?php endif; ?>

        <div class="language-select">
            <div id="localItems"
                 data-selected-country="<?php echo e(localeToCountryCode(mb_strtoupper(app()->getLocale()))); ?>"
                 data-countries='<?php echo e(json_encode($localLanguage)); ?>'
            ></div>
        </div>
    </form>
<?php else: ?>
    <div class="mr-2 mx-md-3"></div>
<?php endif; ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <link href="/assets/default/vendors/flagstrap/css/flags.css" rel="stylesheet">
    <script src="/assets/default/vendors/flagstrap/js/jquery.flagstrap.min.js"></script>
    <script src="/assets/default/js/parts/top_nav_flags.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/includes/navbar/language.blade.php ENDPATH**/ ?>