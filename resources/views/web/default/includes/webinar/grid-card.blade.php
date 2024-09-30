<div class="rounded-xl relative base-card flex flex-col relative md:p-4 p-3 bg-white border-4 md:min-h-[481px]">
	<div class="relative">
		<a href="{{ $webinar->getUrl() }}" rel="dofollow" title="DOT Reasonable Suspicion Training for Supervisors" aria-label="DOT Reasonable Suspicion Training for Supervisors" class="default-transition text-inherit"> 
            <img alt="DOT Reasonable Suspicion Training for Supervisors" loading="lazy" class="max-w-full rounded-xl md:mb-5 mb-3 aspect-[1.5] max-h-64 object-contain w-full lazyLoad isLoaded" 
                src="{{ $webinar->getImage() }}" /> 
        </a>
	</div>
	<div class="flex flex-1 justify-between gap-x-2.5 flex-col">
		<div class="min-w-[50%]">
			<div class="pb-3 mb-auto">
				<h4 class="text-center fs-h6 !break-words" style="display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden; word-break: break-all; text-overflow: ellipsis; -webkit-line-clamp: 2;" data-uw-rm-heading="level" role="heading" aria-level="3">
                    {{ $webinar->title }}
                </h4> 
            </div>
			<p class="font-bold flex gap-2 md:mb-5 mb-3 text-center flex-col mt-auto items-center text-3xl"> 

                    @if(!empty($isRewardCourses) and !empty($webinar->points)) 
                        <span class="text-warning real">
                            {{ $webinar->points }} {{ trans('update.points') }}
                        </span> 
                    @elseif(!empty($webinar->price) and $webinar->price > 0) 
                    
                    @if($webinar->bestTicket() < $webinar->price) 

                        <span class="capitalize text-lg">
                            save {{ $webinar->bestTicket(true)['percent'] }}%
                        </span> 
                        <span>
                            <span class="text-lg mr-2 font-normal line-through text-gray-600">
                                {{ handlePrice($webinar->price, true, true, false, null, true) }}
                            </span> 
                            <span>
                                {{ handlePrice($webinar->bestTicket(), true, true, false, null, true) }}
                            </span>
                        </span>

                    @else 
                        <span class="real">
                            {{ handlePrice($webinar->price, true, true, false, null, true) }}
                        </span> 
                    @endif 
                    
                    @else 
                        <span class="real">{{ trans('public.free') }}</span> 
                    @endif 
    
                <?php /* ?>
                <span>
                    @if( $webinar->price == 0 ) 
                        Free
                    @else
                        {{ handlePrice($webinar->price, true, true, false, null, true) }}
                    @endif
                </span>
                <?php */ ?>
			</p>
		</div>
	</div>
	<div class="flex flex-wrap gap-2.5 items-center">
        <?php /* ?>
		<button type="button" class="btn flex-1 min-w-max has-text btn--contained btn--base btn--middle"><span class="btn__content"><span>
                    Enroll Now
                </span></span>
		</button>
		<button type="button" aria-label="Add to cart DOT Reasonable Suspicion Training for Supervisors" class="btn flex-1 min-w-max has-text btn--outlined btn--base btn--middle">
            <span class="btn__content">
                <span>
                    Add to cart
                </span>
            </span>
		</button> 
        <?php */ ?>
        <a href="{{ $webinar->getUrl() }}" rel="dofollow" class="btn w-full has-text btn--outlined btn--primary btn--middle">
            <span class="btn__content">
                <span>
                    Learn More
                </span>
            </span> 
            <span class="sr-only">
                Learn more about DOT Reasonable Suspicion Training for Supervisors
            </span>
        </a>
    </div>
</div>



<?php /* ?>
	<div class="webinar-card">
		<figure>
			<div class="image-box">
				<div class="badges-lists"> @if($webinar->bestTicket()
					< $webinar->price) <span class="badge badge-danger">{{ trans('public.offer',['off' => $webinar->bestTicket(true)['percent']]) }}</span> @elseif(empty($isFeature) and !empty($webinar->feature)) <span class="badge badge-warning">{{ trans('home.featured') }}</span> @elseif($webinar->type == 'webinar') @if($webinar->start_date > time()) <span class="badge badge-primary">{{  trans('panel.not_conducted') }}</span> @elseif($webinar->isProgressing()) <span class="badge badge-secondary">{{ trans('webinars.in_progress') }}</span> @else <span class="badge badge-secondary">{{ trans('public.finished') }}</span> @endif @elseif(!empty($webinar->type)) <span class="badge badge-primary">{{ trans('webinars.'.$webinar->type) }}</span> @endif @include('web.default.includes.product_custom_badge', ['itemTarget' => $webinar]) </div> <a href="{{ $webinar->getUrl() }}">
                <img src="{{ $webinar->getImage() }}" class="img-cover" alt="{{ $webinar->title }}">
            </a> @if($webinar->checkShowProgress())
				<div class="progress"> <span class="progress-bar" style="width: {{ $webinar->getProgress() }}%"></span> </div> @endif @if($webinar->type == 'webinar')
				<a href="{{ $webinar->addToCalendarLink() }}" target="_blank" class="webinar-notify d-flex align-items-center justify-content-center"> <i data-feather="bell" width="20" height="20" class="webinar-icon"></i> </a> @endif </div>
			<figcaption class="webinar-card-body">
				<div class="user-inline-avatar d-flex align-items-center">
					<div class="avatar bg-gray200"> <img src="{{ $webinar->teacher->getAvatar() }}" class="img-cover" alt="{{ $webinar->teacher->full_name }}"> </div> <a href="{{ $webinar->teacher->getProfileUrl() }}" target="_blank" class="user-name ml-5 font-14">{{ $webinar->teacher->full_name }}</a> </div>
				<a href="{{ $webinar->getUrl() }}">
					<h3 class="mt-15 webinar-title font-weight-bold font-16 text-dark-blue">
                    {{ clean($webinar->title,'title') }}
                </h3> </a> @if(!empty($webinar->category)) <span class="d-block font-14 mt-10">{{ trans('public.in') }} <a href="{{ $webinar->category->getUrl() }}"
                        target="_blank" class="text-decoration-underline">{{ $webinar->category->title }}</a></span> @endif @include(getTemplate() . '.includes.webinar.rate',['rate' => $webinar->getRate()])
				<div class="d-flex justify-content-between mt-20">
					<div class="d-flex align-items-center"> <i data-feather="clock" width="20" height="20" class="webinar-icon"></i> <span class="duration font-14 ml-5">{{ convertMinutesToHourAndMinute($webinar->duration) }}
                        {{ trans('home.hours') }}</span> </div>
					<div class="vertical-line mx-15"></div>
					<div class="d-flex align-items-center"> <i data-feather="calendar" width="20" height="20" class="webinar-icon"></i> <span class="date-published font-14 ml-5">{{ dateTimeFormat(!empty($webinar->start_date) ? $webinar->start_date : $webinar->created_at,'j M Y') }}</span> </div>
				</div>
				<div class="webinar-price-box mt-25"> @if(!empty($isRewardCourses) and !empty($webinar->points)) <span class="text-warning real font-14">{{ $webinar->points }} {{ trans('update.points') }}</span> @elseif(!empty($webinar->price) and $webinar->price > 0) @if($webinar->bestTicket()
					< $webinar->price) <span class="real">{{ handlePrice($webinar->bestTicket(), true, true, false, null, true) }}</span> <span class="off ml-10">{{ handlePrice($webinar->price, true, true, false, null, true) }}</span> @else <span class="real">{{ handlePrice($webinar->price, true, true, false, null, true) }}</span> @endif @else <span class="real font-14">{{ trans('public.free') }}</span> @endif </div>
			</figcaption>
		</figure>
	</div>