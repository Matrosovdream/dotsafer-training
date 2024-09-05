<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">
                <?php if(!empty($generalSettings['site_name'])): ?>
                    <?php echo e(strtoupper($generalSettings['site_name'])); ?>

                <?php else: ?>
                    Platform Title
                <?php endif; ?>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">
                <?php if(!empty($generalSettings['site_name'])): ?>
                    <?php echo e(strtoupper(substr($generalSettings['site_name'],0,2))); ?>

                <?php endif; ?>
            </a>
        </div>

        <ul class="sidebar-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_show')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/'))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl('')); ?>" class="nav-link">
                        <i class="fas fa-fire"></i>
                        <span><?php echo e(trans('admin/main.dashboard')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_marketing_dashboard')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/marketing', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl('/marketing')); ?>" class="nav-link">
                        <i class="fas fa-chart-pie"></i>
                        <span><?php echo e(trans('admin/main.marketing_dashboard')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_webinars') or
                $authUser->can('admin_bundles') or
                $authUser->can('admin_categories') or
                $authUser->can('admin_filters') or
                $authUser->can('admin_quizzes') or
                $authUser->can('admin_certificate') or
                $authUser->can('admin_reviews_lists') or
                $authUser->can('admin_webinar_assignments') or
                $authUser->can('admin_enrollment') or
                $authUser->can('admin_waitlists')
            ): ?>
                <li class="menu-header"><?php echo e(trans('site.education')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/webinars*', false)) and !request()->is(getAdminPanelUrl('/webinars/comments*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i>
                        <span><?php echo e(trans('panel.classes')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars', false)) and request()->get('type') == 'course') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['courses']) and $sidebarBeeps['courses']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/webinars?type=course"><?php echo e(trans('admin/main.courses')); ?></a>
                            </li>

                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars', false)) and request()->get('type') == 'webinar') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['webinars']) and $sidebarBeeps['webinars']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/webinars?type=webinar"><?php echo e(trans('admin/main.live_classes')); ?></a>
                            </li>

                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars', false)) and request()->get('type') == 'text_lesson') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['textLessons']) and $sidebarBeeps['textLessons']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/webinars?type=text_lesson"><?php echo e(trans('admin/main.text_courses')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/webinars/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_agora_history_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/agora_history', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/agora_history"><?php echo e(trans('update.agora_history')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_personal_notes')): ?>
                            <?php if(!empty(getFeaturesSettings('course_notes_status'))): ?>
                                <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars/personal-notes', false))) ? 'active' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/webinars/personal-notes"><?php echo e(trans('update.course_notes')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_bundles')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/bundles*', false)) and !request()->is(getAdminPanelUrl('/bundles/comments*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-cube"></i>
                        <span><?php echo e(trans('update.bundles')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_bundles_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/bundles', false)) and request()->get('type') == 'course') ? 'active' : ''); ?>">
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/bundles" class="nav-link <?php if(!empty($sidebarBeeps['bundles']) and $sidebarBeeps['bundles']): ?> beep beep-sidebar <?php endif; ?>"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_bundles_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/bundles/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/bundles/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_upcoming_courses')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/upcoming_courses*', false)) and !request()->is(getAdminPanelUrl('/upcoming_courses/comments*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-calendar"></i>
                        <span><?php echo e(trans('update.upcoming_courses')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_upcoming_courses_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/upcoming_courses', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/upcoming_courses')); ?>"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_upcoming_courses_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/upcoming_courses/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/upcoming_courses/new')); ?>"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_quizzes')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/quizzes*', false))) ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(getAdminPanelUrl()); ?>/quizzes">
                        <i class="fas fa-file"></i>
                        <span><?php echo e(trans('admin/main.quizzes')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/certificates*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-certificate"></i>
                        <span><?php echo e(trans('admin/main.certificates')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/certificates', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/certificates"><?php echo e(trans('update.quizzes_related')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_certificate_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/certificates/course-competition', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/certificates/course-competition"><?php echo e(trans('update.course_certificates')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate_template_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/certificates/templates', false))) ? 'active' : ''); ?>">
                                <a class="nav-link"
                                   href="<?php echo e(getAdminPanelUrl()); ?>/certificates/templates"><?php echo e(trans('admin/main.certificates_templates')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate_template_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/certificates/templates/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link"
                                   href="<?php echo e(getAdminPanelUrl()); ?>/certificates/templates/new"><?php echo e(trans('admin/main.new_template')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_certificate_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/certificates/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link"
                                   href="<?php echo e(getAdminPanelUrl()); ?>/certificates/settings"><?php echo e(trans('admin/main.setting')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_assignments')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/assignments', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/assignments" class="nav-link">
                        <i class="fas fa-pen"></i>
                        <span><?php echo e(trans('update.assignments')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_question_forum_list')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars/course_forums', false))) ? 'active' : ''); ?>">
                    <a class="nav-link " href="<?php echo e(getAdminPanelUrl()); ?>/webinars/course_forums">
                        <i class="fas fa-comment-alt"></i>
                        <span><?php echo e(trans('update.course_forum')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_noticeboards_list')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/course-noticeboards*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-clipboard-check"></i>
                        <span><?php echo e(trans('update.course_notices')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_noticeboards_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/course-noticeboards', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/course-noticeboards"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_noticeboards_send')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/course-noticeboards/send', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/course-noticeboards/send"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/enrollments*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-plus"></i>
                        <span><?php echo e(trans('update.enrollment')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_history')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/enrollments/history', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/enrollments/history"><?php echo e(trans('public.history')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_add_student_to_items')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/enrollments/add-student-to-class', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/enrollments/add-student-to-class"><?php echo e(trans('update.add_student_to_a_class')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_waitlists_lists')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/waitlists', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl("/waitlists")); ?>" class="nav-link">
                        <i class="fas fa-user-graduate"></i>
                        <span><?php echo e(trans('update.waitlists')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/categories*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-th"></i>
                        <span><?php echo e(trans('admin/main.categories')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/categories', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/categories"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/categories/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/categories/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_trending_categories')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/categories/trends', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/categories/trends"><?php echo e(trans('admin/main.trends')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_filters')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/filters*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-filter"></i>
                        <span><?php echo e(trans('admin/main.filters')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_filters_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/filters', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/filters"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_filters_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/filters/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/filters/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_reviews_lists')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/reviews', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/reviews" class="nav-link <?php if(!empty($sidebarBeeps['reviews']) and $sidebarBeeps['reviews']): ?> beep beep-sidebar <?php endif; ?>">
                        <i class="fas fa-star"></i>
                        <span><?php echo e(trans('admin/main.reviews')); ?></span>
                    </a>
                </li>
            <?php endif; ?>






            <?php if($authUser->can('admin_consultants_lists') or
                $authUser->can('admin_appointments_lists')
            ): ?>
                <li class="menu-header"><?php echo e(trans('site.appointments')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_consultants_lists')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/consultants', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/consultants" class="nav-link">
                        <i class="fas fa-id-card"></i>
                        <span><?php echo e(trans('admin/main.consultants')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_appointments_lists')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/appointments', false))) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/appointments">
                        <i class="fas fa-address-book"></i>
                        <span><?php echo e(trans('admin/main.appointments')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_users') or
                $authUser->can('admin_roles') or
                $authUser->can('admin_users_not_access_content') or
                $authUser->can('admin_group') or
                $authUser->can('admin_users_badges') or
                $authUser->can('admin_become_instructors_list') or
                $authUser->can('admin_delete_account_requests') or
                $authUser->can('admin_user_login_history') or
                $authUser->can('admin_user_ip_restriction')
            ): ?>
                <li class="menu-header"><?php echo e(trans('panel.users')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/staffs', false)) or request()->is(getAdminPanelUrl('/students', false)) or request()->is(getAdminPanelUrl('/instructors', false)) or request()->is(getAdminPanelUrl('/organizations', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-users"></i>
                        <span><?php echo e(trans('admin/main.users_list')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_staffs_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/staffs', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/staffs"><?php echo e(trans('admin/main.staff')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/students', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/students"><?php echo e(trans('public.students')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_instructors_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/instructors', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/instructors"><?php echo e(trans('home.instructors')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_organizations_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/organizations', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/organizations"><?php echo e(trans('admin/main.organizations')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_not_access_content_lists')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/not-access-to-content', false))) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/not-access-to-content">
                        <i class="fas fa-user-lock"></i> <span><?php echo e(trans('update.not_access_to_content')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/roles*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> <span><?php echo e(trans('admin/main.roles')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/roles', false))) ? 'active' : ''); ?>">
                                <a class="nav-link active" href="<?php echo e(getAdminPanelUrl()); ?>/roles"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/roles/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/roles/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/users/groups*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-sitemap"></i>
                        <span><?php echo e(trans('admin/main.groups')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/groups', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/groups"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/groups/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/groups/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_badges')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/badges', false))) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/badges">
                        <i class="fas fa-trophy"></i>
                        <span><?php echo e(trans('admin/main.badges')); ?></span>
                    </a>
                </li>
            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_become_instructors_list')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/users/become-instructors*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-list-alt"></i>
                        <span><?php echo e(trans('admin/main.instructor_requests')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/become-instructors/instructors', false))) ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/become-instructors/instructors">
                                <span><?php echo e(trans('admin/main.instructors')); ?></span>
                            </a>
                        </li>

                        <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/become-instructors/organizations', false))) ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/become-instructors/organizations">
                                <span><?php echo e(trans('admin/main.organizations')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_delete_account_requests')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/users/delete-account-requests*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/users/delete-account-requests" class="nav-link">
                        <i class="fa fa-user-times"></i>
                        <span><?php echo e(trans('update.delete-account-requests')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can("admin_user_login_history") or $authUser->can("admin_user_ip_restriction")): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/users/login-history*', false)) or request()->is(getAdminPanelUrl('/users/ip-restriction*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-clock"></i>
                        <span><?php echo e(trans('update.ip_management')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_login_history')): ?>
                            <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/users/login-history*', false))) ? 'active' : ''); ?>">
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/users/login-history" class="nav-link">
                                    <span><?php echo e(trans('update.login_history')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_ip_restriction')): ?>
                            <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/users/ip-restriction*', false))) ? 'active' : ''); ?>">
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/users/ip-restriction" class="nav-link">
                                    <span><?php echo e(trans('update.ip_restriction')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if(
                $authUser->can('admin_forum') or
                $authUser->can('admin_featured_topics')
                ): ?>
                <li class="menu-header"><?php echo e(trans('update.forum')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forum')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/forums*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-comment-dots"></i>
                        <span><?php echo e(trans('update.forums')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forum_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/forums', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/forums"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forum_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/forums/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/forums/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_featured_topics')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/featured-topics*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-comment"></i>
                        <span><?php echo e(trans('update.featured_topics')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_featured_topics_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/featured-topics', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/featured-topics"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_featured_topics_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/featured-topics/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/featured-topics/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_recommended_topics')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/recommended-topics*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-thumbs-up"></i>
                        <span><?php echo e(trans('update.recommended_topics')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_recommended_topics_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/recommended-topics', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/recommended-topics"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_recommended_topics_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/recommended-topics/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/recommended-topics/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_supports') or
                $authUser->can('admin_comments') or
                $authUser->can('admin_reports') or
                $authUser->can('admin_contacts') or
                $authUser->can('admin_noticeboards') or
                $authUser->can('admin_notifications')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.crm')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/supports*', false)) and request()->get('type') != 'course_conversations') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-headphones"></i>
                        <span><?php echo e(trans('admin/main.supports')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/supports', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/supports"><?php echo e(trans('public.tickets')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_send')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/supports/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/supports/create"><?php echo e(trans('admin/main.new_ticket')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_departments')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/supports/departments', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/supports/departments"><?php echo e(trans('admin/main.departments')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_course_conversations')): ?>
                    <li class="<?php echo e((request()->is(getAdminPanelUrl('/supports*', false)) and request()->get('type') == 'course_conversations') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/supports?type=course_conversations">
                            <i class="fas fa-envelope-square"></i>
                            <span><?php echo e(trans('admin/main.classes_conversations')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments')): ?>
                <li class="nav-item dropdown <?php echo e((!request()->is(getAdminPanelUrl('admin/comments/products, false')) and (request()->is(getAdminPanelUrl('/comments*', false)) and !request()->is(getAdminPanelUrl('/comments/webinars/reports', false)))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-comments"></i> <span><?php echo e(trans('admin/main.comments')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_comments')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/comments/webinars', false))) ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['classesComments']) and $sidebarBeeps['classesComments']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/comments/webinars"><?php echo e(trans('admin/main.classes_comments')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_bundle_comments')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/comments/bundles', false))) ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['bundleComments']) and $sidebarBeeps['bundleComments']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/comments/bundles"><?php echo e(trans('update.bundle_comments')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_comments')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/comments/blog', false))) ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['blogComments']) and $sidebarBeeps['blogComments']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/comments/blog"><?php echo e(trans('admin/main.blog_comments')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_comments')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/comments/products', false))) ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['productComments']) and $sidebarBeeps['productComments']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/comments/products"><?php echo e(trans('update.product_comments')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_reports')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/reports*', false)) or request()->is(getAdminPanelUrl('/comments/webinars/reports', false)) or request()->is(getAdminPanelUrl('/comments/blog/reports', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-info-circle"></i> <span><?php echo e(trans('admin/main.reports')); ?></span></a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_reports')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/reports/webinars', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/reports/webinars"><?php echo e(trans('panel.classes')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_comments_reports')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/comments/webinars/reports', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/comments/webinars/reports"><?php echo e(trans('admin/main.classes_comments_reports')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_comments_reports')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/comments/blog/reports', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/comments/blog/reports"><?php echo e(trans('admin/main.blog_comments_reports')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_report_reasons')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/reports/reasons', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/reports/reasons"><?php echo e(trans('admin/main.report_reasons')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forum_topic_post_reports')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/reports/forum-topics', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/reports/forum-topics"><?php echo e(trans('update.forum_topics')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_contacts')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/contacts*', false))) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/contacts">
                        <i class="fas fa-phone-square"></i>
                        <span><?php echo e(trans('admin/main.contacts')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/noticeboards*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-sticky-note"></i> <span><?php echo e(trans('admin/main.noticeboard')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/noticeboards', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/noticeboards"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards_send')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/noticeboards/send', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/noticeboards/send"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/notifications*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span><?php echo e(trans('admin/main.notifications')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications"><?php echo e(trans('public.history')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_posted_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications/posted', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications/posted"><?php echo e(trans('admin/main.posted')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_send')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications/send', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications/send"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_templates')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications/templates', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications/templates"><?php echo e(trans('admin/main.templates')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_template_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications/templates/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications/templates/create"><?php echo e(trans('admin/main.new_template')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_blog') or
                $authUser->can('admin_pages') or
                $authUser->can('admin_additional_pages') or
                $authUser->can('admin_testimonials') or
                $authUser->can('admin_tags') or
                $authUser->can('admin_regions') or
                $authUser->can('admin_store') or
                $authUser->can('admin_forms') or
                $authUser->can('admin_ai_contents')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.content')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/store*', false)) or request()->is(getAdminPanelUrl('/comments/products*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-store-alt"></i>
                        <span><?php echo e(trans('update.store')); ?></span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_new_product')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/products/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/products/create"><?php echo e(trans('update.new_product')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/products', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/products"><?php echo e(trans('update.products')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_in_house_products')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/in-house-products', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/in-house-products"><?php echo e(trans('update.in-house-products')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_orders')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/orders', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/orders"><?php echo e(trans('update.orders')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_in_house_orders')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/in-house-orders', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/in-house-orders"><?php echo e(trans('update.in-house-orders')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_sellers')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/sellers', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/sellers"><?php echo e(trans('update.sellers')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_categories_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/categories', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/categories"><?php echo e(trans('admin/main.categories')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_filters_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/filters', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/filters"><?php echo e(trans('update.filters')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_specifications')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/specifications', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/specifications"><?php echo e(trans('update.specifications')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_discounts')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/discounts', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/discounts"><?php echo e(trans('admin/main.discounts')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_comments')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/comments/products*', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/comments/products"><?php echo e(trans('admin/main.comments')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_products_comments_reports')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/comments/products/reports', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/comments/products/reports"><?php echo e(trans('admin/main.comments_reports')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_reviews')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/reviews', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/reviews"><?php echo e(trans('admin/main.reviews')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/store/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/store/settings"><?php echo e(trans('admin/main.settings')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/blog*', false)) and !request()->is(getAdminPanelUrl('/blog/comments', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-rss-square"></i>
                        <span><?php echo e(trans('admin/main.blog')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_lists')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/blog', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/blog"><?php echo e(trans('site.posts')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/blog/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/blog/create"><?php echo e(trans('admin/main.new_post')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_categories')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/blog/categories', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/blog/categories"><?php echo e(trans('admin/main.categories')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/pages*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-pager"></i>
                        <span><?php echo e(trans('admin/main.pages')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/pages', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/pages"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/pages/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/pages/create"><?php echo e(trans('admin/main.new_page')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/additional_page*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-plus-circle"></i> <span><?php echo e(trans('admin/main.additional_pages_title')); ?></span></a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_404')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/additional_page/404', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/additional_page/404"><?php echo e(trans('admin/main.error_404')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_contact_us')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/additional_page/contact_us', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/additional_page/contact_us"><?php echo e(trans('admin/main.contact_us')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_footer')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/additional_page/footer', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/additional_page/footer"><?php echo e(trans('admin/main.footer')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_navbar_links')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/additional_page/navbar_links', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/additional_page/navbar_links"><?php echo e(trans('admin/main.top_navbar')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_testimonials')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/testimonials*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-address-card"></i>
                        <span><?php echo e(trans('admin/main.testimonials')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_testimonials_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/testimonials', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/testimonials"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_testimonials_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/testimonials/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/testimonials/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_tags')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/tags', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/tags" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <span><?php echo e(trans('admin/main.tags')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_regions')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/regions*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-map-marked"></i>
                        <span><?php echo e(trans('update.regions')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_regions_countries')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/regions/countries', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/regions/countries"><?php echo e(trans('update.countries')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_regions_provinces')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/regions/provinces', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/regions/provinces"><?php echo e(trans('update.provinces')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_regions_cities')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/regions/cities', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/regions/cities"><?php echo e(trans('update.cities')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_regions_districts')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/regions/districts', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/regions/districts"><?php echo e(trans('update.districts')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forms')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/forms*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-file-alt"></i>
                        <span><?php echo e(trans('update.form_builder')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forms_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/forms/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/forms/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forms_lists')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/forms', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/forms"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forms_submissions')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/forms/submissions', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/forms/submissions"><?php echo e(trans('update.submissions')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_ai_contents')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/ai-contents*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-robot"></i>
                        <span><?php echo e(trans('update.ai_contents')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_ai_contents_lists')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/ai-contents/lists', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/ai-contents/lists"><?php echo e(trans('update.generated_contents')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_ai_contents_templates_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/ai-contents/templates/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/ai-contents/templates/create"><?php echo e(trans('update.new_template')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_ai_contents_templates_lists')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/ai-contents/templates', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/ai-contents/templates"><?php echo e(trans('update.service_template')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_ai_contents_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/ai-contents/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/ai-contents/settings"><?php echo e(trans('update.settings')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_content_delete_requests_lists')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/content-delete-requests*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl("/content-delete-requests")); ?>" class="nav-link">
                        <i class="fas fa-trash"></i>
                        <span><?php echo e(trans('update.content_delete_requests')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_documents') or
                $authUser->can('admin_sales_list') or
                $authUser->can('admin_payouts') or
                $authUser->can('admin_offline_payments_list') or
                $authUser->can('admin_subscribe') or
                $authUser->can('admin_registration_packages') or
                $authUser->can('admin_installments')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.financial')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/documents*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span><?php echo e(trans('admin/main.balances')); ?></span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/documents', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/documents"><?php echo e(trans('admin/main.list')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/documents/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/documents/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_sales_list')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/financial/sales*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/sales" class="nav-link">
                        <i class="fas fa-list-ul"></i>
                        <span><?php echo e(trans('admin/main.sales_list')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/payouts*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-credit-card"></i> <span><?php echo e(trans('admin/main.payout')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/payouts', false)) and request()->get('payout') == 'requests') ? 'active' : ''); ?>">
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/payouts?payout=requests" class="nav-link <?php if(!empty($sidebarBeeps['payoutRequest']) and $sidebarBeeps['payoutRequest']): ?> beep beep-sidebar <?php endif; ?>">
                                    <span><?php echo e(trans('panel.requests')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/payouts', false)) and request()->get('payout') == 'history') ? 'active' : ''); ?>">
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/payouts?payout=history" class="nav-link">
                                    <span><?php echo e(trans('public.history')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_offline_payments_list')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/offline_payments*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-university"></i> <span><?php echo e(trans('admin/main.offline_payments')); ?></span></a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/offline_payments', false)) and request()->get('page_type') == 'requests') ? 'active' : ''); ?>">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/offline_payments?page_type=requests" class="nav-link <?php if(!empty($sidebarBeeps['offlinePayments']) and $sidebarBeeps['offlinePayments']): ?> beep beep-sidebar <?php endif; ?>">
                                <span><?php echo e(trans('panel.requests')); ?></span>
                            </a>
                        </li>

                        <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/offline_payments', false)) and request()->get('page_type') == 'history') ? 'active' : ''); ?>">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/offline_payments?page_type=history" class="nav-link">
                                <span><?php echo e(trans('public.history')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_subscribe')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/subscribes*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-cart-plus"></i>
                        <span><?php echo e(trans('admin/main.subscribes')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_subscribe_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/subscribes', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/subscribes"><?php echo e(trans('admin/main.packages')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_subscribe_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/subscribes/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/subscribes/new"><?php echo e(trans('admin/main.new_package')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/rewards*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-gift"></i>
                        <span><?php echo e(trans('update.rewards')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards_history')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/rewards', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/rewards"><?php echo e(trans('public.history')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards_items')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/rewards/items', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/rewards/items"><?php echo e(trans('update.conditions')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/rewards/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/rewards/settings"><?php echo e(trans('admin/main.settings')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_packages')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/registration-packages*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-gem"></i>
                        <span><?php echo e(trans('update.registration_packages')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_packages_lists')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/registration-packages', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/registration-packages"><?php echo e(trans('admin/main.packages')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_packages_new')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/registration-packages/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/registration-packages/new"><?php echo e(trans('admin/main.new_package')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_packages_reports')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/registration-packages/reports', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/registration-packages/reports"><?php echo e(trans('admin/main.reports')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_packages_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/registration-packages/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/registration-packages/settings"><?php echo e(trans('admin/main.settings')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/installments*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-money-bill-wave"></i>
                        <span><?php echo e(trans('update.installments')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/installments/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/financial/installments/create')); ?>"><?php echo e(trans('update.new_plan')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/installments', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/financial/installments')); ?>"><?php echo e(trans('update.plans')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_purchases')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/installments/purchases', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/financial/installments/purchases')); ?>"><?php echo e(trans('update.purchases')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_overdue_lists')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/installments/overdue', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/financial/installments/overdue')); ?>"><?php echo e(trans('update.overdue')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_overdue_history')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/installments/overdue_history', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/financial/installments/overdue_history')); ?>"><?php echo e(trans('update.overdue_history')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_verification_requests')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/installments/verification_requests', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/financial/installments/verification_requests')); ?>"><?php echo e(trans('update.verification_requests')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_verified_users')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/installments/verified_users', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/financial/installments/verified_users')); ?>"><?php echo e(trans('update.verified_users')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/installments/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/financial/installments/settings')); ?>"><?php echo e(trans('admin/main.settings')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_discount_codes') or
                $authUser->can('admin_cart_discount') or
                $authUser->can('admin_abandoned_cart') or
                $authUser->can('admin_product_discount') or
                $authUser->can('admin_feature_webinars') or
                $authUser->can('admin_gift') or
                $authUser->can('admin_promotion') or
                $authUser->can('admin_advertising') or
                $authUser->can('admin_newsletters') or
                $authUser->can('admin_advertising_modal') or
                $authUser->can('admin_registration_bonus') or
                $authUser->can('admin_floating_bar_create') or
                $authUser->can('admin_purchase_notifications') or
                $authUser->can('admin_product_badges')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.marketing')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_discount_codes')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/discounts*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-percent"></i>
                        <span><?php echo e(trans('admin/main.discount_codes')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_discount_codes_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/discounts', false)) and empty(request()->get('instructor_coupons'))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/discounts"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_discount_codes_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/discounts/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/discounts/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_discount_codes_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/discounts', false)) and !empty(request()->get('instructor_coupons'))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/discounts?instructor_coupons=1"><?php echo e(trans('update.instructor_coupons')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cart_discount_controls')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/cart_discount*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/cart_discount" class="nav-link">
                        <i class="fa fa-percentage"></i>
                        <span><?php echo e(trans('update.cart_discount')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/special_offers*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-fire"></i>
                        <span><?php echo e(trans('admin/main.special_offers')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/special_offers', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/special_offers"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/special_offers/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/special_offers/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_abandoned_cart')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/abandoned-cart*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-cart-plus"></i>
                        <span><?php echo e(trans('update.abandoned_cart')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_abandoned_cart_rules')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/abandoned-cart/rules/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl("/abandoned-cart/rules/create")); ?>"><?php echo e(trans('update.new_rule')); ?></a>
                            </li>

                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/abandoned-cart/rules', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl("/abandoned-cart/rules")); ?>"><?php echo e(trans('update.rules')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_abandoned_cart_users')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/abandoned-cart/users-carts', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl("/abandoned-cart/users-carts")); ?>"><?php echo e(trans('update.users_carts')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_abandoned_cart_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/abandoned-cart/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl("/abandoned-cart/settings")); ?>"><?php echo e(trans('update.settings')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/webinars/features*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-star"></i>
                        <span><?php echo e(trans('admin/main.feature_webinars')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars/features', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/webinars/features"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars/features/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/webinars/features/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/cashback*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-wallet"></i>
                        <span><?php echo e(trans('update.cashback')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback_rules')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/cashback/rules/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/cashback/rules/new')); ?>"><?php echo e(trans('update.new_rule')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback_rules')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/cashback/rules', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/cashback/rules')); ?>"><?php echo e(trans('update.rules')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback_transactions')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/cashback/transactions', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/cashback/transactions')); ?>"><?php echo e(trans('update.transactions')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback_history')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/cashback/history', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/cashback/history')); ?>"><?php echo e(trans('update.history')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_gift')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/gifts*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-gift"></i>
                        <span><?php echo e(trans('update.gifts')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_gift_history')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/gifts', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl("/gifts")); ?>"><?php echo e(trans('public.history')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_gift_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/gifts/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl("/gifts/settings")); ?>"><?php echo e(trans('admin/main.settings')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/promotions*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-rocket"></i>
                        <span><?php echo e(trans('admin/main.promotions')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/promotions', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/promotions"><?php echo e(trans('admin/main.plans')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/promotions/sales', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/promotions/sales"><?php echo e(trans('admin/main.promotion_sales')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/promotions/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/promotions/new"><?php echo e(trans('admin/main.new_plan')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/advertising*', false)) and !request()->is(getAdminPanelUrl('/advertising_modal*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-file-image"></i>
                        <span><?php echo e(trans('admin/main.ad_banners')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising_banners')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/advertising/banners', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/advertising/banners"><?php echo e(trans('admin/main.list')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising_banners_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/advertising/banners/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/advertising/banners/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_newsletters')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/newsletters*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-newspaper"></i>
                        <span><?php echo e(trans('admin/main.newsletters')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_newsletters_lists')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/newsletters', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/newsletters"><?php echo e(trans('admin/main.list')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_newsletters_send')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/newsletters/send', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/newsletters/send"><?php echo e(trans('admin/main.send')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_newsletters_history')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/newsletters/history', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/newsletters/history"><?php echo e(trans('public.history')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_referrals')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/referrals*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-bullhorn"></i>
                        <span><?php echo e(trans('panel.affiliate')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_referrals_history')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/referrals/history', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/referrals/history"><?php echo e(trans('public.history')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_referrals_users')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/referrals/users', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/referrals/users"><?php echo e(trans('admin/main.affiliate_users')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_bonus')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/registration_bonus*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-gem"></i>
                        <span><?php echo e(trans('update.registration_bonus')); ?></span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_bonus_history')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/registration_bonus/history', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/registration_bonus/history')); ?>"><?php echo e(trans('update.bonus_history')); ?></a>
                            </li>
                        <?php endif; ?>


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_bonus_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/registration_bonus/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/registration_bonus/settings')); ?>"><?php echo e(trans('admin/main.settings')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising_modal_config')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/advertising_modal*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/advertising_modal" class="nav-link">
                        <i class="fa fa-ad"></i>
                        <span><?php echo e(trans('update.advertising_modal')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_floating_bar_create')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/floating_bars*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/floating_bars" class="nav-link">
                        <i class="fa fa-pager"></i>
                        <span><?php echo e(trans('update.top_bottom_bar')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_purchase_notifications')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/purchase_notifications*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-clipboard-check"></i>
                        <span><?php echo e(trans('update.purchase_notifications')); ?></span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_purchase_notifications_lists')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/purchase_notifications', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/purchase_notifications')); ?>"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_purchase_notifications_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/purchase_notifications/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/purchase_notifications/create')); ?>"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_badges')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/product-badges*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-tag"></i>
                        <span><?php echo e(trans('update.product_badges')); ?></span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_badges_lists')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/product-badges', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/product-badges')); ?>"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_badges_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/product-badges/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl('/product-badges/create')); ?>"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_settings')): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.settings')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_translator')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/translator*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/translator" class="nav-link">
                        <i class="fa fa-language"></i>
                        <span><?php echo e(trans('update.translator')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings')): ?>
                <?php
                    $settingClass ='';

                    if (request()->is(getAdminPanelUrl('/settings*', false)) and
                            !(
                                request()->is(getAdminPanelUrl('/settings/404', false)) or
                                request()->is(getAdminPanelUrl('/settings/contact_us', false)) or
                                request()->is(getAdminPanelUrl('/settings/footer', false)) or
                                request()->is(getAdminPanelUrl('/settings/navbar_links', false))
                            )
                        ) {
                            $settingClass = 'active';
                        }
                ?>

                <li class="nav-item <?php echo e($settingClass ?? ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/settings" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <span><?php echo e(trans('admin/main.settings')); ?></span>
                    </a>
                </li>
            <?php endif; ?>


            <li>
                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span><?php echo e(trans('admin/main.logout')); ?></span>
                </a>
            </li>

        </ul>
        <br><br><br>
    </aside>
</div>
<?php /**PATH C:\PROJECTS\dotsafer-lms\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>