<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <section class="course-cover-container <?php echo e(empty($activeSpecialOffer) ? 'not-active-special-offer' : ''); ?>">
        <img src="<?php echo e($course->getImageCover()); ?>" class="img-cover course-cover-img" alt="<?php echo e($course->title); ?>"/>

        <div class="cover-content pt-40">
            <div class="container position-relative">
                <?php if(!empty($activeSpecialOffer)): ?>
                    <?php echo $__env->make('web.default.course.special_offer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php
        $percent = $course->getProgress();
    ?>

    <section class="container course-content-section <?php echo e($course->type); ?> <?php echo e(($hasBought or $percent) ? 'has-progress-bar' : ''); ?>">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="course-content-body user-select-none">
                    <div class="course-body-on-cover text-white">
                        <h1 class="font-30 course-title">
                            <?php echo e($course->title); ?>

                        </h1>

                        <?php if(!empty($course->category)): ?>
                            <span class="d-block font-16 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($course->category->getUrl()); ?>" target="_blank" class="font-weight-500 text-decoration-underline text-white"><?php echo e($course->category->title); ?></a></span>
                        <?php endif; ?>

                        <div class="d-flex align-items-center">
                            <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $course->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <span class="ml-10 mt-15 font-14">(<?php echo e($course->reviews->pluck('creator_id')->count()); ?> <?php echo e(trans('public.ratings')); ?>)</span>
                        </div>

                        <div class="mt-15">
                            <span class="font-14"><?php echo e(trans('public.created_by')); ?></span>
                            <a href="<?php echo e($course->teacher->getProfileUrl()); ?>" target="_blank" class="text-decoration-underline text-white font-14 font-weight-500"><?php echo e($course->teacher->full_name); ?></a>
                        </div>

                        <?php if($hasBought or $percent): ?>

                            <div class="mt-30 d-flex align-items-center">
                                <div class="progress course-progress flex-grow-1 shadow-xs rounded-sm">
                                    <span class="progress-bar rounded-sm bg-warning" style="width: <?php echo e($percent); ?>%"></span>
                                </div>

                                <span class="ml-15 font-14 font-weight-500">
                                    <?php if($hasBought and (!$course->isWebinar() or $course->isProgressing())): ?>
                                        <?php echo e(trans('public.course_learning_passed',['percent' => $percent])); ?>

                                    <?php elseif(!is_null($course->capacity)): ?>
                                        <?php echo e($course->getSalesCount()); ?>/<?php echo e($course->capacity); ?> <?php echo e(trans('quiz.students')); ?>

                                    <?php else: ?>
                                        <?php echo e(trans('public.course_learning_passed',['percent' => $percent])); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if(
                            !empty(getFeaturesSettings("frontend_coupons_display_type")) and
                            getFeaturesSettings("frontend_coupons_display_type") == "before_content" and
                            !empty($instructorDiscounts) and
                            count($instructorDiscounts)
                        ): ?>
                        <?php $__currentLoopData = $instructorDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructorDiscount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.includes.discounts.instructor_discounts_card', ['discount' => $instructorDiscount, 'instructorDiscountClassName' => "mt-35"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="mt-35">
                        <ul class="nav nav-tabs bg-secondary rounded-sm p-15 d-flex align-items-center justify-content-between" id="tabs-tab" role="tablist">
                            <li class="nav-item">
                                <a class="position-relative font-14 text-white <?php echo e((empty(request()->get('tab','')) or request()->get('tab','') == 'information') ? 'active' : ''); ?>" id="information-tab"
                                   data-toggle="tab" href="#information" role="tab" aria-controls="information"
                                   aria-selected="true"><?php echo e(trans('product.information')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="position-relative font-14 text-white <?php echo e((request()->get('tab','') == 'content') ? 'active' : ''); ?>" id="content-tab" data-toggle="tab"
                                   href="#content" role="tab" aria-controls="content"
                                   aria-selected="false"><?php echo e(trans('product.content')); ?> (<?php echo e($webinarContentCount); ?>)</a>
                            </li>
                            <li class="nav-item">
                                <a class="position-relative font-14 text-white <?php echo e((request()->get('tab','') == 'reviews') ? 'active' : ''); ?>" id="reviews-tab" data-toggle="tab"
                                   href="#reviews" role="tab" aria-controls="reviews"
                                   aria-selected="false"><?php echo e(trans('product.reviews')); ?> (<?php echo e($course->reviews->count() > 0 ? $course->reviews->pluck('creator_id')->count() : 0); ?>)</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade <?php echo e((empty(request()->get('tab','')) or request()->get('tab','') == 'information') ? 'show active' : ''); ?> " id="information" role="tabpanel"
                                 aria-labelledby="information-tab">
                                <?php echo $__env->make(getTemplate().'.course.tabs.information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade <?php echo e((request()->get('tab','') == 'content') ? 'show active' : ''); ?>" id="content" role="tabpanel" aria-labelledby="content-tab">
                                <?php echo $__env->make(getTemplate().'.course.tabs.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade <?php echo e((request()->get('tab','') == 'reviews') ? 'show active' : ''); ?>" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <?php echo $__env->make(getTemplate().'.course.tabs.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                            <?php echo $__env->make('web.default.includes.discounts.instructor_discounts_card', ['discount' => $instructorDiscount, 'instructorDiscountClassName' => "mt-35"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>
            </div>

            <div class="course-content-sidebar col-12 col-lg-4 mt-25 mt-lg-0">
                <div class="rounded-lg shadow-sm">
                    <div class="course-img <?php echo e($course->video_demo ? 'has-video' :''); ?>">

                        <img src="<?php echo e($course->getImage()); ?>" class="img-cover" alt="">

                        <?php if($course->video_demo): ?>
                            <div id="webinarDemoVideoBtn"
                                 data-video-path="<?php echo e($course->video_demo_source == 'upload' ?  url($course->video_demo) : $course->video_demo); ?>"
                                 data-video-source="<?php echo e($course->video_demo_source); ?>"
                                 class="course-video-icon cursor-pointer d-flex align-items-center justify-content-center">
                                <i data-feather="play" width="25" height="25"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="px-20 pb-30">
                        <form action="/cart/store" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="item_id" value="<?php echo e($course->id); ?>">
                            <input type="hidden" name="item_name" value="webinar_id">

                            <?php if(!empty($course->tickets)): ?>
                                <?php $__currentLoopData = $course->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-check mt-20">
                                        <input class="form-check-input" <?php if(!$ticket->isValid()): ?> disabled <?php endif; ?> type="radio"
                                               data-discount-price="<?php echo e(handleCoursePagePrice($ticket->getPriceWithDiscount($course->price, !empty($activeSpecialOffer) ? $activeSpecialOffer : null))['price']); ?>"
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

                            <?php if($course->price > 0): ?>
                                <div id="priceBox" class="d-flex align-items-center justify-content-center mt-20 <?php echo e(!empty($activeSpecialOffer) ? ' flex-column ' : ''); ?>">
                                    <div class="text-center">
                                        <?php
                                            $realPrice = handleCoursePagePrice($course->price);
                                        ?>
                                        <span id="realPrice" data-value="<?php echo e($course->price); ?>"
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
                                                $priceWithDiscount = handleCoursePagePrice($course->getPrice());
                                            ?>
                                            <span id="priceWithDiscount"
                                                  class="d-block font-30 text-primary">
                                                <?php echo e($priceWithDiscount['price']); ?>

                                            </span>

                                            <?php if(!empty($priceWithDiscount['tax'])): ?>
                                                <span class="d-block font-14 text-gray">+ <?php echo e($priceWithDiscount['tax']); ?> <?php echo e(trans('cart.tax')); ?></span>
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
                                $canSale = ($course->canSale() and !$hasBought);
                                $authUserJoinedWaitlist = false;

                                if (!empty($authUser)) {
                                    $authUserWaitlist = $course->waitlists()->where('user_id', $authUser->id)->first();
                                    $authUserJoinedWaitlist = !empty($authUserWaitlist);
                                }
                            ?>

                            <div class="mt-20 d-flex flex-column">
                                <?php if(!$canSale and $course->canJoinToWaitlist()): ?>
                                    <button type="button" data-slug="<?php echo e($course->slug); ?>" class="btn btn-primary <?php echo e((!$authUserJoinedWaitlist) ? ((!empty($authUser)) ? 'js-join-waitlist-user' : 'js-join-waitlist-guest') : 'disabled'); ?>" <?php echo e($authUserJoinedWaitlist ? 'disabled' : ''); ?>>
                                        <?php if($authUserJoinedWaitlist): ?>
                                            <?php echo e(trans('update.already_joined')); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('update.join_waitlist')); ?>

                                        <?php endif; ?>
                                    </button>
                                <?php elseif($hasBought or !empty($course->getInstallmentOrder())): ?>
                                    <a href="<?php echo e($course->getLearningPageUrl()); ?>" class="btn btn-primary"><?php echo e(trans('update.go_to_learning_page')); ?></a>
                                <?php elseif(!empty($course->price) and $course->price > 0): ?>
                                    <button type="button" class="btn btn-primary <?php echo e($canSale ? 'js-course-add-to-cart-btn' : ($course->cantSaleStatus($hasBought) .' disabled ')); ?>">
                                        <?php if(!$canSale): ?>
                                            <?php if($course->checkCapacityReached()): ?>
                                                <?php echo e(trans('update.capacity_reached')); ?>

                                            <?php else: ?>
                                                <?php echo e(trans('update.disabled_add_to_cart')); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo e(trans('public.add_to_cart')); ?>

                                        <?php endif; ?>
                                    </button>

                                    <?php if($canSale and !empty($course->points)): ?>
                                        <a href="<?php echo e(!(auth()->check()) ? '/login' : '#'); ?>" class="<?php echo e((auth()->check()) ? 'js-buy-with-point' : ''); ?> btn btn-outline-warning mt-20 <?php echo e((!$canSale) ? 'disabled' : ''); ?>" rel="nofollow">
                                            <?php echo trans('update.buy_with_n_points',['points' => $course->points]); ?>

                                        </a>
                                    <?php endif; ?>

                                    <?php if($canSale and !empty(getFeaturesSettings('direct_classes_payment_button_status'))): ?>
                                        <button type="button" class="btn btn-outline-danger mt-20 js-course-direct-payment">
                                            <?php echo e(trans('update.buy_now')); ?>

                                        </button>
                                    <?php endif; ?>

                                    <?php if(!empty($installments) and count($installments) and getInstallmentsSettings('display_installment_button')): ?>
                                        <a href="/course/<?php echo e($course->slug); ?>/installments" class="btn btn-outline-primary mt-20">
                                            <?php echo e(trans('update.pay_with_installments')); ?>

                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e($canSale ? '/course/'. $course->slug .'/free' : '#'); ?>" class="btn btn-primary <?php echo e((!$canSale) ? (' disabled ' . $course->cantSaleStatus($hasBought)) : ''); ?>">
                                        <?php if(!$canSale): ?>
                                            <?php if($course->checkCapacityReached()): ?>
                                                <?php echo e(trans('update.capacity_reached')); ?>

                                            <?php else: ?>
                                                <?php echo e(trans('public.disabled')); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo e(trans('public.enroll_on_webinar')); ?>

                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>

                                <?php if($canSale and $course->subscribe): ?>
                                    <a href="/subscribes/apply/<?php echo e($course->slug); ?>" class="btn btn-outline-primary btn-subscribe mt-20 <?php if(!$canSale): ?> disabled <?php endif; ?>"><?php echo e(trans('public.subscribe')); ?></a>
                                <?php endif; ?>

                            </div>

                        </form>

                        <?php if(!empty(getOthersPersonalizationSettings('show_guarantee_text')) and getOthersPersonalizationSettings('show_guarantee_text')): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-center text-gray">
                                <i data-feather="thumbs-up" width="20" height="20"></i>
                                <span class="ml-5 font-14"><?php echo e(trans('product.guarantee_text')); ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="mt-35">
                            <strong class="d-block text-secondary font-weight-bold"><?php echo e(trans('webinars.this_webinar_includes',['classes' => trans('webinars.'.$course->type)])); ?></strong>
                            <?php if($course->isDownloadable()): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="download-cloud" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.downloadable_content')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($course->certificate or ($course->quizzes->where('certificate', 1)->count() > 0)): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="award" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.official_certificate')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($course->quizzes->where('status', \App\models\Quiz::ACTIVE)->count() > 0): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="file-text" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.online_quizzes_count',['quiz_count' => $course->quizzes->where('status', \App\models\Quiz::ACTIVE)->count()])); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($course->support): ?>
                                <div class="mt-20 d-flex align-items-center text-gray">
                                    <i data-feather="headphones" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.instructor_support')); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mt-40 p-10 rounded-sm border row align-items-center favorites-share-box">
                            <?php if($course->isWebinar()): ?>
                                <div class="col">
                                    <a href="<?php echo e($course->addToCalendarLink()); ?>" target="_blank" class="d-flex flex-column align-items-center text-center text-gray">
                                        <i data-feather="calendar" width="20" height="20"></i>
                                        <span class="font-12"><?php echo e(trans('public.reminder')); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="col">
                                <a href="/favorites/<?php echo e($course->slug); ?>/toggle" id="favoriteToggle" class="d-flex flex-column align-items-center text-gray">
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

                        <div class="mt-30 text-center">
                            <button type="button" id="webinarReportBtn" class="font-14 text-gray btn-transparent"><?php echo e(trans('webinars.report_this_webinar')); ?></button>
                        </div>
                    </div>
                </div>

                
                <?php echo $__env->make('web.default.includes.cashback_alert',['itemPrice' => $course->price], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <?php if($course->canSale() and !empty(getGiftsGeneralSettings('status')) and !empty(getGiftsGeneralSettings('allow_sending_gift_for_courses'))): ?>
                    <a href="/gift/course/<?php echo e($course->slug); ?>" class="d-flex align-items-center mt-30 rounded-lg border p-15">
                        <div class="size-40 d-flex-center rounded-circle bg-gray200">
                            <i data-feather="gift" class="text-gray" width="20" height="20"></i>
                        </div>
                        <div class="ml-5">
                            <h4 class="font-14 font-weight-bold text-gray"><?php echo e(trans('update.gift_this_course')); ?></h4>
                            <p class="font-12 text-gray"><?php echo e(trans('update.gift_this_course_hint')); ?></p>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if($course->teacher->offline): ?>
                    <div class="rounded-lg shadow-sm mt-35 d-flex">
                        <div class="offline-icon offline-icon-left d-flex align-items-stretch">
                            <div class="d-flex align-items-center">
                                <img src="/assets/default/img/profile/time-icon.png" alt="offline">
                            </div>
                        </div>

                        <div class="p-15">
                            <h3 class="font-16 text-dark-blue"><?php echo e(trans('public.instructor_is_not_available')); ?></h3>
                            <p class="font-14 font-weight-500 text-gray mt-15"><?php echo e($course->teacher->offline_message); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="rounded-lg shadow-sm mt-35 px-25 py-20">
                    <h3 class="sidebar-title font-16 text-secondary font-weight-bold"><?php echo e(trans('webinars.'.$course->type) .' '. trans('webinars.specifications')); ?></h3>

                    <div class="mt-30">
                        <?php if($course->isWebinar()): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="calendar" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.start_date')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e(dateTimeFormat($course->start_date, 'j M Y | H:i')); ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <i data-feather="user" width="20" height="20"></i>
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.capacity')); ?>:</span>
                            </div>
                            <?php if(!is_null($course->capacity)): ?>
                                <span class="font-14"><?php echo e($course->capacity); ?> <?php echo e(trans('quiz.students')); ?></span>
                            <?php else: ?>
                                <span class="font-14"><?php echo e(trans('update.unlimited')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <i data-feather="clock" width="20" height="20"></i>
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.duration')); ?>:</span>
                            </div>
                            <span class="font-14"><?php echo e(convertMinutesToHourAndMinute(!empty($course->duration) ? $course->duration : 0)); ?> <?php echo e(trans('home.hours')); ?></span>
                        </div>

                        <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                            <div class="d-flex align-items-center">
                                <i data-feather="users" width="20" height="20"></i>
                                <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('quiz.students')); ?>:</span>
                            </div>
                            <span class="font-14"><?php echo e($course->getSalesCount()); ?></span>
                        </div>

                        <?php if($course->isWebinar()): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.sessions')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($course->sessions->count()); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if($course->isTextCourse()): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('webinars.text_lessons')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($course->textLessons->count()); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if($course->isCourse() or $course->isTextCourse()): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.files')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($course->files->count()); ?></span>
                            </div>

                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('public.created_at')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e(dateTimeFormat($course->created_at,'j M Y')); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($course->access_days)): ?>
                            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                                <div class="d-flex align-items-center">
                                    <i data-feather="alert-circle" width="20" height="20"></i>
                                    <span class="ml-5 font-14 font-weight-500"><?php echo e(trans('update.access_period')); ?>:</span>
                                </div>
                                <span class="font-14"><?php echo e($course->access_days); ?> <?php echo e(trans('public.days')); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <?php if($course->creator_id != $course->teacher_id): ?>
                    <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $course->creator], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                
                <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $course->teacher], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if($course->webinarPartnerTeacher->count() > 0): ?>
                    <?php $__currentLoopData = $course->webinarPartnerTeacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinarPartnerTeacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('web.default.course.sidebar_instructor_profile', ['courseTeacher' => $webinarPartnerTeacher->teacher], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                

                
                <?php if($course->tags->count() > 0): ?>
                    <div class="rounded-lg tags-card shadow-sm mt-35 px-25 py-20">
                        <h3 class="sidebar-title font-16 text-secondary font-weight-bold"><?php echo e(trans('public.tags')); ?></h3>

                        <div class="d-flex flex-wrap mt-10">
                            <?php $__currentLoopData = $course->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="/tags/courses/<?php echo e(urlencode($tag->title)); ?>" class="tag-item bg-gray200 p-5 font-14 text-gray font-weight-500 rounded"><?php echo e($tag->title); ?></a>
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

    <div id="webinarReportModal" class="d-none">
        <h3 class="section-title after-line font-20 text-dark-blue"><?php echo e(trans('product.report_the_course')); ?></h3>

        <form action="/course/<?php echo e($course->id); ?>/report" method="post" class="mt-25">

            <div class="form-group">
                <label class="text-dark-blue font-14"><?php echo e(trans('product.reason')); ?></label>
                <select id="reason" name="reason" class="form-control">
                    <option value="" selected disabled><?php echo e(trans('product.select_reason')); ?></option>

                    <?php $__currentLoopData = getReportReasons(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($reason); ?>"><?php echo e($reason); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label class="text-dark-blue font-14" for="message_to_reviewer"><?php echo e(trans('public.message_to_reviewer')); ?></label>
                <textarea name="message" id="message_to_reviewer" class="form-control" rows="10"></textarea>
                <div class="invalid-feedback"></div>
            </div>
            <p class="text-gray font-16"><?php echo e(trans('product.report_modal_hint')); ?></p>

            <div class="mt-30 d-flex align-items-center justify-content-end">
                <button type="button" class="js-course-report-submit btn btn-sm btn-primary"><?php echo e(trans('panel.report')); ?></button>
                <button type="button" class="btn btn-sm btn-danger ml-10 close-swl"><?php echo e(trans('public.close')); ?></button>
            </div>
        </form>
    </div>

    <?php echo $__env->make('web.default.course.share_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.default.course.buy_with_point_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        var courseHasBoughtStatusToastTitleLang = '<?php echo e(trans('cart.fail_purchase')); ?>';
        var courseHasBoughtStatusToastMsgLang = '<?php echo e(trans('site.you_bought_webinar')); ?>';
        var courseNotCapacityStatusToastTitleLang = '<?php echo e(trans('public.request_failed')); ?>';
        var courseNotCapacityStatusToastMsgLang = '<?php echo e(trans('cart.course_not_capacity')); ?>';
        var courseHasStartedStatusToastTitleLang = '<?php echo e(trans('cart.fail_purchase')); ?>';
        var courseHasStartedStatusToastMsgLang = '<?php echo e(trans('update.class_has_started')); ?>';
        var joinCourseWaitlistLang = '<?php echo e(trans('update.join_course_waitlist')); ?>';
        var joinCourseWaitlistModalHintLang = "<?php echo e(trans('update.join_course_waitlist_modal_hint')); ?>";
        var joinLang = '<?php echo e(trans('footer.join')); ?>';
        var nameLang = '<?php echo e(trans('auth.name')); ?>';
        var emailLang = '<?php echo e(trans('auth.email')); ?>';
        var phoneLang = '<?php echo e(trans('public.phone')); ?>';
        var captchaLang = '<?php echo e(trans('site.captcha')); ?>';
    </script>

    <script src="/assets/default/js/parts/comment.min.js"></script>
    <script src="/assets/default/js/parts/video_player_helpers.min.js"></script>
    <script src="/assets/default/js/parts/webinar_show.min.js"></script>


    <?php if(!empty($course->creator) and !empty($course->creator->getLiveChatJsCode()) and !empty(getFeaturesSettings('show_live_chat_widget'))): ?>
        <script>
            (function () {
                "use strict"

                <?php echo $course->creator->getLiveChatJsCode(); ?>

            })(jQuery)
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/web/default/course/index.blade.php ENDPATH**/ ?>