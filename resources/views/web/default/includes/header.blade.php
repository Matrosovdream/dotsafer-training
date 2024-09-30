<div class="sticky z-40 top-0">
  <div class="shadow-sm">
    <header class="header-base header-base-space-x">
      <div class="sm:w-auto w-full flex justify-center">
        <a href="/" class="default-transition flex nuxt-link-exact-active nuxt-link-active text-primary max-h-40"> 
          <img alt="logo" loading="lazy" class="max-w-full aspect-auto object-contain min-w-[30px] w-full max-h-[58px] xl:!max-w-[340px] !max-w-[280px] lazyLoad isLoaded" height="58" width="280" 
               src="https://fs.yourcourses.com/worktraining/images/hotFJSrhacC3oxXf1jC82Zr1Ci4RCnhkucAdWBH9.png" data-uw-rm-alt-original="logo" data-uw-rm-alt="ALT"> 
        </a>
      </div>
      <form class="w-full lg:flex-1 max-w-3xl mx-auto lg:order-none order-1" action="/search">
        <div class="relative">
          <div class="relative text-left base-field md:max-w-3xl w-full mx-auto full-adornment" data-v-9b539bdc="" data-v-7fd26c98="">
            <fieldset class="relative" data-v-9b539bdc="">
              <input name="search" type="text" placeholder="Search for a course by typing, then press enter" value="" class="base-input secondary-input base-input--end-adornment border border-gray-150 px-8 py-3.5">
              <div class="adornment adornment--right" data-v-9b539bdc="">
                <button type="submit" class="btn btn--contained btn--primary btn--middle" style="height: auto;">
                  <span class="btn__content">
				  	        <i class='fa-solid fa-magnifying-glass'></i>
                  </span> 
                </button>
              </div>
            </fieldset>
          </div>
        </div>
      </form>
      <div class="flex flex-wrap gap-4 sm:mx-0 mx-auto">
        <button type="button" rel="nofollow" aria-label="Search" class="btn lg:hidden flex btn--fab btn--contained btn--secondary btn--middle">
          <span class="btn__content">
		  <i class="fa fa-search"></i> 
          </span> 
        </button>
        <div class="lg:block hidden">
          <p class="uppercase fs-small !break-words"> talk to us: 
          </p>
          <div class="flex items-center gap-3">
            <a rel="nofollow" href="tel:+1-888-390-5574" target="_blank" class="default-transition font-bold whitespace-nowrap text-current hover:underline" aria-label="call {{ $generalSettings['site_phone'] }}" uw-rm-vague-link-id="tel:{{ $generalSettings['site_phone'] }}" data-uw-rm-vglnk="">
              {{ $generalSettings['site_phone'] }}
            </a>
          </div>
        </div>
        <button type="button" aria-label="Menu toggle" class="btn btn--burger lg:hidden flex ignore-click-outside btn--fab btn--contained btn--secondary btn--middle">
          <span class="btn__content"> 
            <span>
              <span
                    class="flex w-5 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <span
                      aria-hidden="true"
                      class="block absolute h-0.5 max-h-0.5 w-5 bg-current transform transition duration-500 ease-in-out  -translate-y-1.5">
                </span> 
                <span aria-hidden="true" class="block absolute max-h-0.5 h-0.5 w-5 bg-current transform transition duration-500 ease-in-out">
                </span> 
                <span aria-hidden="true" class="block absolute max-h-0.5 h-0.5 w-5 bg-current transform transition duration-500 ease-in-out  translate-y-1.5">
                </span>
              </span>
            </span>
          </span>
        </button> 

        @include('web.default.includes.top_nav.user_menu')

        <a href="/login" class="btn lg:hidden flex btn--fab btn--contained btn--base btn--middle" rel="nofollow" aria-label="Log In">
          <span class="btn__content">
		  	<i class='fa-solid fa-cart-shopping'></i>
          </span>
        </a> 
		@include(getTemplate().'.includes.shopping-cart-dropdwon') 
      </div>
    </header>

    @if( empty($isPanel) )
      <div class="flex justify-end items-center gap-3 header-nav-menu p-2 header-base-space-x lg:flex hidden font-semibold"> 
        <span>
          Solutions for:
        </span> 
        @include('web.default.includes.navbar') 
      </div>
    @endif

  </div>
</div>


<?php /* ?> @php $userLanguages = !empty($generalSettings['site_language']) ? [$generalSettings['site_language'] => getLanguages($generalSettings['site_language'])] : []; if (!empty($generalSettings['user_languages']) and is_array($generalSettings['user_languages'])) { $userLanguages = getLanguages($generalSettings['user_languages']); } $localLanguage = []; foreach($userLanguages as $key => $userLanguage) { $localLanguage[localeToCountryCode($key)] = $userLanguage; } @endphp
	<div class="top-navbar d-flex border-bottom">
		<div class="container d-flex justify-content-between flex-column flex-lg-row">
			<div class="top-contact-box border-bottom d-flex flex-column flex-md-row align-items-center justify-content-center"> @if(getOthersPersonalizationSettings('platform_phone_and_email_position') == 'header')
				<div class="d-flex align-items-center justify-content-center mr-15 mr-md-30"> @if(!empty($generalSettings['site_phone']))
					<div class="d-flex align-items-center py-10 py-lg-0 text-dark-blue font-14"> <i data-feather="phone" width="20" height="20" class="mr-10"></i> {{ $generalSettings['site_phone'] }} </div> @endif @if(!empty($generalSettings['site_email']))
					<div class="border-left mx-5 mx-lg-15 h-100"></div>
					<div class="d-flex align-items-center py-10 py-lg-0 text-dark-blue font-14"> <i data-feather="mail" width="20" height="20" class="mr-10"></i> {{ $generalSettings['site_email'] }} </div> @endif </div> @endif
				<div class="d-flex align-items-center justify-content-between justify-content-md-center"> {{-- Currency --}} @include('web.default.includes.top_nav.currency') @if(!empty($localLanguage) and count($localLanguage) > 1)
					<form action="/locale" method="post" class="mr-15 mx-md-20"> {{ csrf_field() }}
						<input type="hidden" name="locale"> @if(!empty($previousUrl))
						<input type="hidden" name="previous_url" value="{{ $previousUrl }}"> @endif
						<div class="language-select">
							<div id="localItems" data-selected-country="{{ localeToCountryCode(mb_strtoupper(app()->getLocale())) }}" data-countries='{{ json_encode($localLanguage) }}'></div>
						</div>
					</form> @else
					<div class="mr-15 mx-md-20"></div> @endif
					<form action="/search" method="get" class="form-inline my-2 my-lg-0 navbar-search position-relative">
						<input class="form-control mr-5 rounded" type="text" name="search" placeholder="{{ trans('navbar.search_anything') }}" aria-label="Search">
						<button type="submit" class="btn-transparent d-flex align-items-center justify-content-center search-icon"> <i data-feather="search" width="20" height="20" class="mr-10"></i> </button>
					</form>
				</div>
			</div>
			<div class="xs-w-100 d-flex align-items-center justify-content-between ">
				<div class="d-flex"> @include(getTemplate().'.includes.shopping-cart-dropdwon')
					<div class="border-left mx-5 mx-lg-15"></div> @include(getTemplate().'.includes.notification-dropdown') </div> {{-- User Menu --}} @include('web.default.includes.top_nav.user_menu') </div>
		</div>
	</div> @push('scripts_bottom')
	<link href="/assets/default/vendors/flagstrap/css/flags.css" rel="stylesheet">
	<script src="/assets/default/vendors/flagstrap/js/jquery.flagstrap.min.js"></script>
	<script src="/assets/default/js/parts/top_nav_flags.min.js"></script> @endpush