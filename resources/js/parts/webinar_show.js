(function ($) {
    "use strict";

    var offerCountDown = $('#offerCountDown');

    if (offerCountDown.length) {
        var endtimeDate = offerCountDown.attr('data-day');
        var endtimeHours = offerCountDown.attr('data-hour');
        var endtimeMinutes = offerCountDown.attr('data-minute');
        var endtimeSeconds = offerCountDown.attr('data-second');

        offerCountDown.countdown100({
            endtimeYear: 0,
            endtimeMonth: 0,
            endtimeDate: endtimeDate,
            endtimeHours: endtimeHours,
            endtimeMinutes: endtimeMinutes,
            endtimeSeconds: endtimeSeconds,
            timeZone: ""
        });
    }

    $('.barrating-stars select').each(function (index, element) {
        var $element = $(element);
        $element.barrating({
            theme: 'css-stars',
            readonly: false,
            initialRating: $element.data('rate'),
        });
    });

    /**
     * webinar demo modal
     * */
    var courseDemoVideoPlayer;

    $('body').on('click', '#webinarDemoVideoBtn', function (e) {
        e.preventDefault();

        if (courseDemoVideoPlayer !== undefined) {
            courseDemoVideoPlayer.dispose();
        }

        let path = $(this).attr('data-video-path');
        let source = $(this).attr('data-video-source');
        const height = $(window).width() > 991 ? 480 : 264;

        const videoTagId = 'demoVideoPlayer';
        const {html, options} = makeVideoPlayerHtml(path, source, height, videoTagId);

        let modalHtml = '<div id="webinarDemoVideoModal" class="demo-video-modal">\n' +
            '<h3 class="section-title after-line font-20 text-dark-blue">' + webinarDemoLang + '</h3>\n' +
            '<div class="demo-video-card mt-25">\n';

        modalHtml += html;

        modalHtml += '</div></div>';

        Swal.fire({
            html: modalHtml,
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
            onOpen: () => {
                courseDemoVideoPlayer = videojs(videoTagId, options);
            }
        });
    });

    /**
     * webinar report modal
     * */
    $('body').on('click', '#webinarReportBtn', function (e) {
        e.preventDefault();

        let modal_html = $('#webinarReportModal').html();

        Swal.fire({
            html: modal_html,
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '.js-course-report-submit', function (e) {
        e.preventDefault();

        const $this = $(this);
        const $form = $this.closest('form');
        const action = $form.attr('action');
        const data = $form.serializeObject();

        $this.addClass('loadingbar primary').prop('disabled', true);

        $form.find('.invalid-feedback').text('');
        $form.find('.is-invalid').removeClass('is-invalid');

        $.post(action, data, function (result) {
            if (result && result.code === 200) {
                Swal.fire({
                    icon: 'success',
                    html: '<h3 class="font-20 text-center text-dark-blue">' + reportSuccessLang + '</h3>',
                    showConfirmButton: false,
                });

                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else if (result && result.code === 401) {
                Swal.fire({
                    icon: 'error',
                    html: '<h3 class="font-20 text-center text-dark-blue">' + reportFailLang + '</h3>',
                    showConfirmButton: false,
                });
            }
        }).fail(err => {
            $this.removeClass('loadingbar primary').prop('disabled', false);
            var errors = err.responseJSON;
            if (errors && errors.errors) {
                Object.keys(errors.errors).forEach((key) => {
                    const error = errors.errors[key];
                    let element = $form.find('[name="' + key + '"]');
                    element.addClass('is-invalid');
                    element.parent().find('.invalid-feedback').text(error[0]);
                });
            }
        });
    });


    $('body').on('change', 'input[name="ticket_id"]', function (e) {
        e.preventDefault();

        const discountPrice = $(this).attr('data-discount-price');

        const realPrice = $('#realPrice');
        const priceWithDiscount = $('#priceWithDiscount');

        realPrice.removeClass('text-primary').addClass('d-block font-20 text-gray text-decoration-line-through mr-15');

        if (priceWithDiscount.length) {
            priceWithDiscount.addClass('d-block');
            priceWithDiscount.text(discountPrice);
        } else {
            realPrice.removeClass('d-block');

            var html = '<span\n' +
                'class="js-discounted-price-span font-30 text-primary">\n' +
                discountPrice +
                '</span>';

            $('.js-discounted-price-span').remove()

            realPrice.parent().append(html);
        }
    });

    $('body').on('click', '#favoriteToggle', function (e) {
        e.preventDefault();
        e.stopPropagation();

        const href = $(this).attr('href');
        const icon = $(this).find('svg');

        if (icon.hasClass('favorite-active')) {
            icon.removeClass('favorite-active');
        } else {
            icon.addClass('favorite-active');
        }

        $.get(href, function (result) {

        });
    });

    $('body').on('click', '.js-share-course', function (e) {
        e.preventDefault();

        Swal.fire({
            html: $('#courseShareModal').html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            onOpen: () => {
                $('[data-toggle="tooltip"]').tooltip();
            },
            width: '32rem',
        });
    });

    $('body').on('click', '.js-course-share-link-copy', function (e) {
        e.preventDefault();

        $(this).attr('data-original-title', copiedLang)
            .tooltip('show');

        $(this).attr('data-original-title', copyLang);

        copyToClipboard();
    });

    function copyToClipboard() {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.css('position', 'absolute');

        $temp.val($('.js-course-share-link').html()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    function handleCourseLearningToggle(course_id, item, item_id, status, $this) {
        const data = {
            item: item,
            item_id: item_id,
            status: status
        };

        $.post('/course/' + course_id + '/learningStatus', data, function (result) {
            $.toast({
                heading: '',
                text: learningToggleLangSuccess,
                bgColor: '#43d477',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: 'success'
            });

            setTimeout(() => {
                window.location.reload();
            }, 500);
        }).fail(err => {

            $this.prop('checked', !status);

            $.toast({
                heading: '',
                text: learningToggleLangError,
                bgColor: '#f63c3c',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: 'error'
            });
        });
    }

    $('body').on('change', '.js-file-learning-toggle', function (e) {

        const $this = $(this);
        const course_id = $this.val();
        const file_id = $this.attr('data-file-id');
        const status = this.checked;

        handleCourseLearningToggle(course_id, 'file_id', file_id, status, $this);
    });

    $('body').on('change', '.js-text-lesson-learning-toggle', function (e) {

        const $this = $(this);
        const course_id = $this.val();
        const lesson_id = $this.attr('data-lesson-id');
        const status = this.checked;

        handleCourseLearningToggle(course_id, 'text_lesson_id', lesson_id, status, $this);
    });

    $('body').on('change', '.js-text-session-toggle', function (e) {

        const $this = $(this);
        const course_id = $this.val();
        const session_id = $this.attr('data-session-id');
        const status = this.checked;

        handleCourseLearningToggle(course_id, 'session_id', session_id, status, $this);
    });

    function errorToast(heading, text) {
        $.toast({
            heading: heading,
            text: text,
            bgColor: '#f63c3c',
            textColor: 'white',
            hideAfter: 10000,
            position: 'bottom-right',
            icon: 'error'
        });
    }

    $('body').on('click', '.not-login-toast', function (e) {
        e.preventDefault();

        if (notLoginToastTitleLang && notLoginToastMsgLang) {
            errorToast(notLoginToastTitleLang, notLoginToastMsgLang);
        }
    });

    $('body').on('click', '.not-access-toast', function (e) {
        e.preventDefault();

        if (notAccessToastTitleLang && notAccessToastMsgLang) {
            errorToast(notAccessToastTitleLang, notAccessToastMsgLang);
        }
    });

    $('body').on('click', '.js-sequence-content-error-modal', function (e) {
        e.preventDefault();

        const passedError = $(this).attr('data-passed-error');
        const accessDaysError = $(this).attr('data-access-days-error');

        let html = '<ul class="list-group-custom">\n';
        if (passedError) {
            html += '<li class="font-14 mb-10">' + passedError + '</li>\n';
        }

        if (accessDaysError) {
            html += '<li class="font-14">' + accessDaysError + '</li>\n';
        }

        html += '</ul>';

        Swal.fire({
            icon: 'error',
            title: sequenceContentErrorModalTitle,
            html: html,
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '30rem',
        });
    });

    $('body').on('click', '.can-not-try-again-quiz-toast', function (e) {
        e.preventDefault();

        if (canNotTryAgainQuizToastTitleLang && canNotTryAgainQuizToastMsgLang) {
            errorToast(canNotTryAgainQuizToastTitleLang, canNotTryAgainQuizToastMsgLang);
        }
    });

    $('body').on('click', '.can-not-download-certificate-toast', function (e) {
        e.preventDefault();

        if (canNotDownloadCertificateToastTitleLang && canNotDownloadCertificateToastMsgLang) {
            errorToast(canNotDownloadCertificateToastTitleLang, canNotDownloadCertificateToastMsgLang);
        }
    });

    $('body').on('click', '.session-finished-toast', function (e) {
        e.preventDefault();

        if (sessionFinishedToastTitleLang && sessionFinishedToastMsgLang) {
            errorToast(sessionFinishedToastTitleLang, sessionFinishedToastMsgLang);
        }
    });


    $('body').on('click', '.js-play-video', function (e) {
        e.preventDefault();

        const $modal = $('#playVideo');
        const $modalLoading = $modal.find('.file-video-loading');
        const $modalVideoContent = $modal.find('.js-modal-video-content');

        $modalLoading.removeClass('d-none');
        $modalVideoContent.addClass('d-none');

        const file_id = $(this).attr('data-id');
        const file_title = $(this).attr('data-title');
        $modal.find('.section-title:first').text(file_title);

        $modal.modal('show');

        const root = document.getElementsByTagName('html')[0];
        root.classList.add('html-modal-open');

        $modal.animate({
            scrollTop: 0
        }, 100);

        // make video player html
        console.log($modalVideoContent)
        handleVideoByFileId(file_id, $modalVideoContent, function () {
            $modalLoading.addClass('d-none');
            $modalVideoContent.removeClass('d-none');

            $modal.find('.modal-video-item').removeClass('active');
            $modal.find('.modal-video-item[data-id="' + file_id + '"]').addClass('active');

            $modal.find('.collapse').removeClass('show');
            $modal.find('#collapseVideo' + file_id).addClass('show');
        });

        $('#playVideo').on('hidden.bs.modal', function () {
            pauseVideoPlayer();

            const root = document.getElementsByTagName('html')[0];
            root.classList.remove('html-modal-open');
        });
    });

    $('body').on('click', '.js-buy-with-point', function (e) {
        e.preventDefault();

        Swal.fire({
            html: $('#buyWithPointModal').html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '28rem',
        });
    });

    $('body').on('click', '.js-buy-course-with-point', function (e) {
        $(this).addClass('loadingbar primary').prop('disabled', true);
    });

    $('body').on('click', '.js-course-add-to-cart-btn', function (e) {
        const $this = $(this);
        $this.addClass('loadingbar primary').prop('disabled', true);

        const $form = $this.closest('form');
        $form.attr('action', '/cart/store');

        $form.trigger('submit');
    });

    $('body').on('click', '.js-course-direct-payment', function (e) {
        const $this = $(this);
        $this.addClass('loadingbar danger').prop('disabled', true);

        const $form = $this.closest('form');
        $form.attr('action', '/course/direct-payment');

        $form.trigger('submit');
    });

    $('body').on('click', '.js-bundle-direct-payment', function (e) {
        const $this = $(this);
        $this.addClass('loadingbar danger').prop('disabled', true);

        const $form = $this.closest('form');
        $form.attr('action', '/bundles/direct-payment');

        $form.trigger('submit');
    });

    $('body').on('click', '.js-course-has-bought-status', function (e) {
        e.preventDefault();

        if (courseHasBoughtStatusToastTitleLang && courseHasBoughtStatusToastMsgLang) {
            errorToast(courseHasBoughtStatusToastTitleLang, courseHasBoughtStatusToastMsgLang);
        }
    });

    $('body').on('click', '.js-course-not-capacity-status', function (e) {
        e.preventDefault();

        if (courseNotCapacityStatusToastTitleLang && courseNotCapacityStatusToastMsgLang) {
            errorToast(courseNotCapacityStatusToastTitleLang, courseNotCapacityStatusToastMsgLang);
        }
    });

    $('body').on('click', '.js-course-has-started-status', function (e) {
        e.preventDefault();

        if (courseHasStartedStatusToastTitleLang && courseHasStartedStatusToastMsgLang) {
            errorToast(courseHasStartedStatusToastTitleLang, courseHasStartedStatusToastMsgLang);
        }
    });

    $(document).ready(function () {
        const $chapterCollapseToggles = $('.js-chapter-collapse-toggle');

        if ($chapterCollapseToggles && $chapterCollapseToggles.length) {
            const firstChapterCollapseToggle = $chapterCollapseToggles[0];

            if (firstChapterCollapseToggle) {
                $(firstChapterCollapseToggle).trigger('click')
            }
        }
    });

    /* Waitlist */
    function showWaitlistModal(webinarSlug, isLogin) {
        let html = '<div id="waitlistModal" class="waitlist-modal">\n' +
            '        <h3 class="section-title after-line font-20 text-dark-blue">' + joinCourseWaitlistLang + '</h3>\n' +
            '        <div class="d-flex-center flex-column text-center mt-25">\n' +
            '            <div class="waitlist-modal-icon">\n' +
            '                <img src="/assets/default/img/course/waitlist.png" alt="waitlist" class="img-cover">\n' +
            '            </div>\n' +
            '            <p class="font-14 font-weight-500 mt-15 text-gray">' + joinCourseWaitlistModalHintLang + '</p>\n' +
            '        </div>';

        html += '<div class="waitlist-modal-form">' +
            '<input type="hidden" name="slug" value="' + webinarSlug + '">';

        if (!isLogin) {
            html += '<div class="mt-15">\n' +
                '            <div class="form-group mb-10">\n' +
                '                <label class="input-label">' + nameLang + ':</label>\n' +
                '                <input name="name" type="text" class="js-ajax-name form-control">\n' +
                '                <div class="invalid-feedback"></div>\n' +
                '            </div>\n' +
                '            <div class="form-group mb-10">\n' +
                '                <label class="input-label">' + emailLang + ':</label>\n' +
                '                <input name="email" type="text" class="js-ajax-email form-control">\n' +
                '                <div class="invalid-feedback"></div>\n' +
                '            </div>\n' +
                '            <div class="form-group mb-10">\n' +
                '                <label class="input-label">' + phoneLang + ':</label>\n' +
                '                <input name="phone" type="text" class="js-ajax-phone form-control">\n' +
                '                <div class="invalid-feedback"></div>\n' +
                '            </div>\n' +
                '           <div class="form-group mb-10">\n' +
                '                <label class="input-label font-weight-500">' + captchaLang + '</label>\n' +
                '               <div class="row align-items-center">\n' +
                '                   <div class="col">\n' +
                '                       <input type="text" name="captcha" class="js-ajax-captcha form-control">\n' +
                '                       <div class="invalid-feedback"></div>\n' +
                '                   </div>\n' +
                '                   <div class="col d-flex align-items-center">\n' +
                '                       <img id="captchaImageComment" class="captcha-image" src="">\n' +
                '                       <button type="button" id="refreshCaptcha" class="btn-transparent ml-15">\n' +
                '                           <i data-feather="refresh-ccw" width="24" height="24" class=""></i>\n' +
                '                       </button>\n' +
                '                   </div>\n' +
                '               </div>\n' +
                '          </div>\n' +
                '      </div>';
        }

        html += '</div>' +
            '<div class="d-flex align-items-center justify-content-end mt-20">\n' +
            '            <button type="button" class="js-save-waitlist btn btn-primary btn-sm">' + joinLang + '</button>\n' +
            '        </div>\n' +
            '    </div>';

        Swal.fire({
            html: html,
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '28rem',
            onOpen: () => {
                if (!isLogin) {
                    refreshCaptcha();
                    feather.replace();
                }
            }
        });
    }

    $('body').on('click', '.js-join-waitlist-user', function () {
        const webinarSlug = $(this).attr('data-slug')
        showWaitlistModal(webinarSlug, true)
    })

    $('body').on('click', '.js-join-waitlist-guest', function () {
        const webinarSlug = $(this).attr('data-slug')
        showWaitlistModal(webinarSlug, false)
    })

    $('body').on('click', '.js-save-waitlist', function (e) {
        e.preventDefault();
        const $this = $(this);

        const path = '/waitlists/join';
        const $form = $this.closest('#waitlistModal').find('.waitlist-modal-form');
        let data = serializeObjectByTag($form);

        $this.addClass('loadingbar primary').prop('disabled', true);
        $form.find('input').removeClass('is-invalid');
        $form.find('textarea').removeClass('is-invalid');

        $.post(path, data, function (result) {
            if (result && result.code === 200) {
                //window.location.reload();
                Swal.fire({
                    icon: 'success',
                    html: '<h3 class="font-16 text-center text-dark-blue py-25">' + result.msg + '</h3>',
                    showConfirmButton: false,
                    width: '25rem',
                });

                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }
        }).fail(function (err) {
            $this.removeClass('loadingbar primary').prop('disabled', false);
            var errors = err.responseJSON;

            if (errors && errors.errors) {
                Object.keys(errors.errors).forEach((key) => {
                    const error = errors.errors[key];
                    let element = $form.find('.js-ajax-' + key);

                    element.addClass('is-invalid');
                    element.parent().find('.invalid-feedback').text(error[0]);
                });
            }
        })
    })
})(jQuery);
