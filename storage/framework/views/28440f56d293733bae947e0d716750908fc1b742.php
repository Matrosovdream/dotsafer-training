<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <section class="course-cover-container <?php echo e(empty($activeSpecialOffer) ? 'not-active-special-offer' : ''); ?>">
        <img src="<?php echo e($bundle->getImageCover()); ?>" class="img-cover course-cover-img" alt="<?php echo e($bundle->title); ?>"/>

        <div class="cover-content pt-40">
            <div class="container position-relative">
                <?php if(!empty($activeSpecialOffer)): ?>
                    <?php echo $__env->make('web.default.course.special_offer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="container course-content-section <?php echo e($bundle->type); ?>">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="course-content-body user-select-none">
                    <div class="course-body-on-cover text-white">
                        <h1 class="font-30 course-title">
                            <?php echo e(clean($bundle->title, 't')); ?>

                        </h1>
                        <span class="d-block font-16 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($bundle->category->getUrl()); ?>" target="_blank" class="font-weight-500 text-decoration-underline text-white"><?php echo e($bundle->category->title); ?></a></span>

                        <div class="d-flex align-items-center">
                            <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $bundle->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <span class="ml-10 mt-15 font-14">(<?php echo e($bundle->reviews->pluck('creator_id')->count()); ?> <?php echo e(trans('public.ratings')); ?>)</span>
                        </div>

                        <div class="mt-15">
                            <span class="font-14"><?php echo e(trans('public.created_by')); ?></span>
                            <a href="<?php echo e($bundle->teacher->getProfileUrl()); ?>" target="_blank" class="text-decoration-underline text-white font-14 font-weight-500"><?php echo e($bundle->teacher->full_name); ?></a>
                        </div>
                    </div>

                    <?php
                        $hasCoupon = false;
                    ?>
                    <?php if(
                           !empty(getFeaturesSettings("frontend_coupons_display_type")) and
                           getFeaturesSettings("frontend_coupons_display_type") == "before_content" and
                           !empty($instructorDiscounts) and
                           count($instructorDiscounts)
                       ): ?>
                        <?php
                            $hasCoupon = true;
                        ?>

                        <?php $__currentLoopData = $instructorDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructorDiscount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.includes.discounts.instructor_discounts_card', ['discount' => $instructorDiscount, 'instructorDiscountClassName' => "mt-40  mt-md-80"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="<?php echo e($hasCoupon ? 'mt-20  mt-md-40' : 'mt-40  mt-md-80'); ?>">
                        <ul class="nav nav-tabs bg-secondary rounded-sm p-15 d-flex align-items-center justify-content-between" id="tabs-tab" role="tablist">
                            <li class="nav-item">
                                <a class="position-relative font-14 text-white <?php echo e((empty(request()->get('tab','')) or request()->get('tab','') == 'information') ? 'active' : ''); ?>" id="information-tab"
                                   data-toggle="tab" href="#information" role="tab" aria-controls="information"
                                   aria-selected="true"><?php echo e(trans('product.information')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="position-relative font-14 text-white <?php echo e((request()->get('tab','') == 'content') ? 'active' : ''); ?>" id="content-tab" data-toggle="tab"
                                   href="#content" role="tab" aria-controls="content"
                                   aria-selected="false"><?php echo e(trans('product.content')); ?> (<?php echo e($bundle->bundleWebinars->count()); ?>)</a>
                            </li>
                            <li class="nav-item">
                                <a class="position-relative font-14 text-white <?php echo e((request()->get('tab','') == 'reviews') ? 'active' : ''); ?>" id="reviews-tab" data-toggle="tab"
                                   href="#reviews" role="tab" aria-controls="reviews"
                                   aria-selected="false"><?php echo e(trans('product.reviews')); ?> (<?php echo e($bundle->reviews->count() > 0 ? $bundle->reviews->pluck('creator_id')->count() : 0); ?>)</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade <?php echo e((empty(request()->get('tab','')) or request()->get('tab','') == 'information') ? 'show active' : ''); ?> " id="information" role="tabpanel"
                                 aria-labelledby="information-tab">
                                <?php echo $__env->make('web.default.bundle.tabs.information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade <?php echo e((request()->get('tab','') == 'content') ? 'show active' : ''); ?>" id="content" role="tabpanel" aria-labelledby="content-tab">
                                <?php echo $__env->make('web.default.bundle.tabs.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade <?php echo e((request()->get('tab','') == 'reviews') ? 'show active' : ''); ?>" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <?php echo $__env->make('web.default.bundle.tabs.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                    </div>


                    <?php if(
                           !empty(getFeaturesSettings("frontend_coupons_display_type")) and
                           getFeaturesSettings("frontend_coupons_display_type") == "after_content" and
                           !empty($instructorDiscounts) and
                           count($instructorDiscounts)
                       ): ?>
                        <?php $__currentLoopData = $instructorDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructorDiscount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.includes.discounts.instructor_discounts_card', ['discount' => $instructorDiscount, 'instructorDiscountClassName' => "mt-20 pt-20  mt-md-40 pt-md-40"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="course-content-sidebar col-12 col-lg-4 mt-25 mt-lg-0">
                <div class="rounded-lg shadow-sm">
                    <div class="course-img <?php echo e($bundle->video_demo ? 'has-video' :''); ?>">

                        <img src="<?php echo e($bundle->getImage()); ?>" class="img-cover" alt="">

                        <?php if($bundle->video_demo): ?>
                            <div id="webinarDemoVideoBtn"
                                 data-video-path="<?php echo e($bundle->video_demo_source == 'upload' ?  url($bundle->video_demo) : $bundle->video_demo); ?>"
                                 data-video-source="<?php echo e($bundle->video_demo_source); ?>"
                                 class="course-video-icon cursor-pointer d-flex align-items-center justify-content-center">
                                <i data-feather="play" width="25" height="25"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="px-20 pb-30">
                        <form action="/cart/store" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="item_id" value="<?php echo e($bundle->id); ?>">
                            <input type="hidden" name="item_name" value="bundle_id">

                            <?php if(!empty($bundle->tickets)): ?>
                                <?php $__currentLoopData = $bundle->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-check mt-20">
                                        <input class="form-check-input" <?php if(!$ticket->isValid()): ?> disabled <?php endif; ?> type="radio"
                                               data-discount="<?php echo e($ticket->discount); ?>"
                                               data-discount-price="<?php echo e(handleCoursePagePrice($ticket->getPriceWithDiscount($bundle->price, !empty($activeSpecialOffer) ? $activeSpecialOffer : null))['price']); ?>"
                                               value="<?php echo e(($ticket->isValid()) ? $ticket->id : ''); ?>"
                                               name="ticket_id"
                                               id="courseOff<?php echo e($ticket->id); ?>">
                                        <label class="form-check-label d-flex flex-column cursor-pointer" for="courseOff<?php echo e($ticket->id); ?>">
                                            <span class="font-16 font-weight-500 text-dark-blue"><?php echo e($ticket->title); ?> <?php if(!empty($ticket->discount)): ?>
                                                    (<?php echo e($ticket->discount); ?>% <?php echo e(trans('public.off')); ?>)
                                                <?php endif; ?></span>
                                            <span class="font-14 text-gray"><?php echo e($ticket->getSubTitle()); ?></span>
                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if($bundle->price > 0): ?>
                                <div id="priceBox" class="d-flex align-items-center justify-content-center mt-20 <?php echo e(!empty($activeSpecialOffer) ? ' flex-column ' : ''); ?>">
                                    <div class="text-center">
                                        <?php
                                            $realPrice = handleCoursePagePrice($bundle->price);
                                        ?>

                                        <span id="realPrice" data-value="<?php echo e($bundle->price); ?>"
                                              data-special-offer="<?php echo e(!empty($activeSpecialOffer) ? $activeSpecialOffer->percent : ''); ?>"
                                              class="d-block <?php if(!empty($activeSpecialOffer)): ?> font-16 text-gray text-decoration-line-through <?php else: ?> font-30 text-primary <?php endif; ?>">
                                            <?php echo e($realPrice['price']); ?>

                                        </span>

                                        <?php if(!empty($realPrice['tax']) and empty($activeSpecialOffer)): ?>
                                            <span class="d-block font-14 text-gray">+ <?php echo e($realPrice['tax']); ?> <?php echo e(trans('cart.tax')); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if(!empty($activeSpecialOffer)): ?>
                                        <div class="text-center">
                                            <?php
                                                $priceWithDiscount = handleCoursePagePrice($bundle->getPrice());
                                            ?>
                                            <span id="priceWithDiscount"
                                                  class="d-block font-30 text-primary">
                                                <?php echo e($priceWithDiscount['price']); ?>

                                            </span>

                                            <?php if(!empty($priceWithDiscount['tax'])): ?>
                                                <span class="d-block font-14 text-gray">+ <?php echo e($priceWithDiscount['tax']); ?> tax</span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <div class="d-flex align-items-center justify-content-center mt-20">
                                    <span class="font-36 text-primary"><?php echo e(trans('public.free')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php
                                $canSale = ($bundle->canSale() and !$hasBought);
                            ?>

                            <div class="mt-20 d-flex flex-column">
                                <?php if($hasBought or !empty($bundle->getInstallmentOrder())): ?>
                                    <button type="button" class="btn btn-primary" disabled><?php echo e(trans('panel.purchased')); ?></button>
                                <?php elseif(!empty($bundle->price) and $bundle->price > 0): ?>
                                    <button type="<?php echo e($canSale ? 'submit' : 'button'); ?>" <?php if(!$canSale): ?> disabled <?php endif; ?> class="btn btn-primary">
                                        <?php if(!$canSale): ?>
                                            <?php echo e(trans('update.disabled_add_to_cart')); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('public.add_to_cart')); ?>

                                        <?php endif; ?>
                                    </button>

                                    <?php if($canSale and !empty($bundle->points)): ?>
                                        <a href="<?php echo e(!(auth()->check()) ? '/login' : '#'); ?>" class="<?php echo e((auth()->check()) ? 'js-buy-with-point' : ''); ?> btn btn-outline-warning mt-20 <?php echo e((!$canSale) ? 'disabled' : ''); ?>" rel="nofollow">
                                            <?php echo trans('update.buy_with_n_points',['points' => $bundle->points]); ?>

                                        </a>
                                    <?php endif; ?>

                                    <?php if($canSale and !empty(getFeaturesSettings('direct_bundles_payment_button_status'))): ?>
                                        <button type="button" class="btn btn-outline-danger mt-20 js-bundle-direct-payment">
                                            <?php echo e(trans('update.buy_now')); ?>

                                        </button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e($canSale ? '/bundles/'. $bundle->slug .'/free' : '#'); ?>" class="btn btn-primary <?php if(!$canSale): ?> disabled <?php endif; ?>"><?php echo e(trans('update.enroll_on_bundle')); ?></a>
                                <?php endif; ?>

                                <?php if($canSale and $bundle->subscribe): ?>
                                    <a href="/subscribes/apply/bundle/<?php echo e($bundle->slug); ?>" class="btn btn-outline-primary btn-subscribe mt-20 <?php if(!$canSale): ?> disabled <?php endif; ?>"><?php echo e(trans('public.subscribe')); ?></a>
                                <?php endif; ?>
                            </div>

                        </form>

                        <?php if(!empty(getOthersPersonalizationSettings('show_guarantee_text')) and getOthersPersonalizationSettings('show_guarantee_text')): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-center text-gray">
                                <i data-feather="thumbs-up" width="20" height="20"></i>
                                <span class="ml-5 font-14"><?php echo e(trans('product.guarantee_text')); ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="mt-40 p-10 rounded-sm border row align-items-center favorites-share-box">

                            <div class="col">
                                <a href="/bundles/<?php echo e($bundle->slug); ?>/favorite" id="favoriteToggle" class="d-flex flex-column align-items-center text-gray">
                                    <i data-feather="heart" class="<?php echo e(!empty($isFavorite) ? 'favorite-active' : ''); ?>" width="20" height="20"></i>
                                    <span class="font-12"><?php echo e(trans('panel.favorite')); ?></span>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" class="js-share-course d-flex flex-column align-items-center text-gray">
                                    <i data-feather="share-2" width="20" height="20"></i>
                                    <span class="font-12"><?php echo e(trans('public.share')); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?php echo $__env->make('web.default.includes.cashback_alert',['itemPrice' => $bundle->price], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <?php if($bundle->canSale() and !empty(getGiftsGeneralSettings('status')) and !empty(getGiftsGeneralSettings('allow_sending_gift_for_bundles'))): ?>
                    <a href="/gift/bundle/<?php echo e($bundle->slug); ?>" class="d-flex align-items-center mt-30 rounded-lg border p-15">
                        <div class="size-40 d-flex-center rounded-circle bg-gray200">
                            <i data-feather="gift" class="text-gray" width="20" height="20"></i>
                        </div>
                        <div class="ml-5">
                            <h4 class="font-14 font-weight-bold text-gray"><?php echo e(trans('update.gift_this_bundle')); ?></h4>
                            <p class="font-12 text-gray"><?php echo e(trans('update.gift_this_bundle_hint')); ?></p>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if($bundle->teacher->offline): ?>
                    <div class="rounded-lg shadow-sm mt-35 d-flex">
                        <div class="offline-icon offline-icon-left d-flex align-items-stretch">
                            <div class="d-flex align-items-center">
                                <img src="/assets/default/img/profile/time-icon.png" alt="offline">
                            </div>
                        </div>

                        <div class="p-15">
                            <h3 class="font-16 text-dark-blue"><?php echo e(trans('public.instructor_is_not_available')); ?></h3>
                            <p class="font-14 font-weight-500 text-gray mt-15"><?php echo e($bundle->teacher->offline_message); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="rounded-lg shadow-sm mt-35 px-25 py-20">
                    <h3 class="sidebar-title font-16 text-secondary font-weight-bold"><?php echo e(trans('update.bundle_specifications')); ?></h3>

                    <div class="mt-30">
                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <i data-feather="clock" width="20" height="20"></i>
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.duration')); ?>:</span>
                            </div>
                            <span class="font-14"><?php echo e(convertMinutesToHourAndMinute($bundle->getBundleDuration())); ?> <?php echo e(trans('home.hours')); ?></span>
                        </div>

                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <i data-feather="users" width="20" height="20"></i>
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('quiz.students')); ?>:</span>
                            </div>
                            <span class="font-14"><?php echo e($bundle->sales_count); ?></span>
                        </div>

                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('product.courses')); ?>:</span>
                            </div>
                            <span class="font-14"><?php echo e($bundle->bundleWebinars->count()); ?></span>
                        </div>

                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.created_at')); ?>:</span>
                            </div>
                            <span class="font-14"><?php echo e(dateTimeFormat($bundle->created_at,'j M Y')); ?></span>
                        </div>

                        <?php if(!empty($bundle->access_days)): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="alert-circle" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('update.access_period')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($bundle->access_days); ?> <?php echo e(trans('public.days')); ?></span>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                
                <?php if($bundle->creator_id != $bundle->teacher_id): ?>
                    <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $bundle->creator], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                
                <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $bundle->teacher], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                

                
                <?php if($bundle->tags->count() > 0): ?>
                    <div class="rounded-lg tags-card shadow-sm mt-35 px-25 py-20">
                        <h3 class="sidebar-title font-16 text-secondary font-weight-bold"><?php echo e(trans('public.tags')); ?></h3>

                        <div class="d-flex flex-wrap mt-10">
                            <?php $__currentLoopData = $bundle->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="/tags/bundles/<?php echo e(urlencode($tag->title)); ?>" class="tag-item bg-gray200 p-5 font-14 text-gray font-weight-500 rounded"><?php echo e($tag->title); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if(!empty($advertisingBannersSidebar) and count($advertisingBannersSidebar)): ?>
                    <div class="row">
                        <?php $__currentLoopData = $advertisingBannersSidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebarBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-lg sidebar-ads mt-35 col-<?php echo e($sidebarBanner->size); ?>">
                                <a href="<?php echo e($sidebarBanner->link); ?>">
                                    <img src="<?php echo e($sidebarBanner->image); ?>" class="img-cover rounded-lg" alt="<?php echo e($sidebarBanner->title); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>

        
        <?php if(!empty($advertisingBanners) and count($advertisingBanners)): ?>
            <div class="mt-30 mt-md-50">
                <div class="row">
                    <?php $__currentLoopData = $advertisingBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-<?php echo e($banner->size); ?>">
                            <a href="<?php echo e($banner->link); ?>">
                                <img src="<?php echo e($banner->image); ?>" class="img-cover rounded-sm" alt="<?php echo e($banner->title); ?>">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        
    </section>

    <?php echo $__env->make('web.default.bundle.share_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.default.bundle.buy_with_point_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/parts/time-counter-down.min.js"></script>
    <script src="/assets/default/vendors/barrating/jquery.barrating.min.js"></script>
    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/assets/default/vendors/video/youtube.min.js"></script>
    <script src="/assets/default/vendors/video/vimeo.js"></script>

    <script>
        var webinarDemoLang = '<?php echo e(trans('webinars.webinar_demo')); ?>';
        var replyLang = '<?php echo e(trans('panel.reply')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
        var saveLang = '<?php echo e(trans('public.save')); ?>';
        var reportLang = '<?php echo e(trans('panel.report')); ?>';
        var reportSuccessLang = '<?php echo e(trans('panel.report_success')); ?>';
        var reportFailLang = '<?php echo e(trans('panel.report_fail')); ?>';
        var messageToReviewerLang = '<?php echo e(trans('public.message_to_reviewer')); ?>';
        var copyLang = '<?php echo e(trans('public.copy')); ?>';
        var copiedLang = '<?php echo e(trans('public.copied')); ?>';
        var learningToggleLangSuccess = '<?php echo e(trans('public.course_learning_change_status_success')); ?>';
        var learningToggleLangError = '<?php echo e(trans('public.course_learning_change_status_error')); ?>';
        var notLoginToastTitleLang = '<?php echo e(trans('public.not_login_toast_lang')); ?>';
        var notLoginToastMsgLang = '<?php echo e(trans('public.not_login_toast_msg_lang')); ?>';
        var notAccessToastTitleLang = '<?php echo e(trans('public.not_access_toast_lang')); ?>';
        var notAccessToastMsgLang = '<?php echo e(trans('public.not_access_toast_msg_lang')); ?>';
        var canNotTryAgainQuizToastTitleLang = '<?php echo e(trans('public.can_not_try_again_quiz_toast_lang')); ?>';
        var canNotTryAgainQuizToastMsgLang = '<?php echo e(trans('public.can_not_try_again_quiz_toast_msg_lang')); ?>';
        var canNotDownloadCertificateToastTitleLang = '<?php echo e(trans('public.can_not_download_certificate_toast_lang')); ?>';
        var canNotDownloadCertificateToastMsgLang = '<?php echo e(trans('public.can_not_download_certificate_toast_msg_lang')); ?>';
        var sessionFinishedToastTitleLang = '<?php echo e(trans('public.session_finished_toast_title_lang')); ?>';
        var sessionFinishedToastMsgLang = '<?php echo e(trans('public.session_finished_toast_msg_lang')); ?>';
        var sequenceContentErrorModalTitle = '<?php echo e(trans('update.sequence_content_error_modal_title')); ?>';

    </script>

    <script src="/assets/default/js/parts/comment.min.js"></script>
    <script src="/assets/default/js/parts/video_player_helpers.min.js"></script>
    <script src="/assets/default/js/parts/webinar_show.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/bundle/index.blade.php ENDPATH**/ ?>