<br/><br/><br/><br/><br/><br/>

<footer class="">
	<div class="md:py-8 p-4 container relative px-4 ">
		<div class="flex justify-between flex-col lg:flex-row gap-5">
			<div class="lg:max-w-xl w-full">
				<h2 class="md:mb-7 mb-5 font-semibold fs-h3 !break-words">
                    Trusted by 1,676 Employers and 42,467 Learners Since 2014.
                  </h2>
				<div class="mb-2">
					<div class="editor-text-wrap max-w-full data-table table-auto relative overflow-x-auto overflow-y-hidden main-scrollbar">
						<p>Founded in 2014 by Andrew Easler, a former high-school teacher turned attorney, <a href="index.html" rel="dofollow">WorkTraining.com</a>® provides content creation, <a href="scorm-files.html" rel="dofollow">licenses SCORM-courseware</a>, offers a subscription-based <a href="learning-management-system.html" rel="dofollow">learning management
                          system</a>, EaslerLMS, and delivers legal insights, compliance, and qualification training covering topics related to workplace safety, <a href="training-courses/reasonable-suspicion-training.html" rel="dofollow">reasonable
                          suspicion</a>, <a href="training-courses/drug-testing.html" rel="dofollow">drug and alcohol
                          testing</a>, <a href="training-courses/sexual-harassment-training.html" rel="dofollow">harassment prevention</a>, <a href="training-courses/hipaa.html" rel="dofollow">HIPAA compliance</a>, and more.</p>
					</div>
				</div>
				<div class="flex flex-wrap items-center gap-2.5 sm:gap-4 mt-7">
                    <a href="{{ $generalSettings['site_phone'] }}" target="_blank" class="btn has-text btn--contained btn--primary btn--middle"><span class="btn__content"> <span>
                {{ $generalSettings['site_phone'] }}
                        </span></span>  </a> <a href="/courses" class="btn has-text btn--contained btn--base btn--middle"><span class="btn__content">
                        <span>
                          Explore Training
                        </span></span>  </a></div>
			</div>
			<div class="lg:max-w-lg w-full">
				<h2 class="mb-5 font-semibold fs-h3 !break-words">
                    Have Questions? Let’s Chat<br> <a rel="nofollow" href="tel:+1-888-390-5574" target="_blank" class="default-transition whitespace-nowrap text-inherit hover:underline"><span class="whitespace-nowrap">+1-888-390-5574</span> </a></h2>
				<ul class="mb-5 [&amp;>li]:pb-2 [&amp;>li]:last:pb-0">
					<li>Se habla Español</li>
					<li>Monday - Friday 9 AM to 5 PM EST.</li>
					<li>Closed on weekends and holidays.</li>
				</ul>

			</div>
		</div>
	</div>
	<div class="px-4 container relative md:pt-20 pt-10 md:pb-7 bg-no-repeat bg-bottom bg-[length:100%_100%] bg-[url('assets/images/wave.png')]">
		<div class="flex flex-col sm:flex-row justify-center sm:gap-7 gap-4">
			<div class="shrink-0">
				
			</div>
			<div class="flex-grow self-end text-center">
				<div class="editor-text-wrap max-w-full data-table table-auto relative overflow-x-auto overflow-y-hidden main-scrollbar">
					<p>Explore our <a href="terms.html" rel="nofollow">Terms of Service</a> and <a href="privacy-statement.html" rel="nofollow">Privacy Policy</a>, and <a href="meet-easler.html" rel="dofollow">meet our team</a>. We are dedicated to <a href="ada-accessibility.html" rel="nofollow">accessibility</a>, <a href="equal-employment-opportunity-and-anti-discrimination-policy.html" rel="nofollow">equal
                        employment</a>, and compliance with <a href="https://oag.ca.gov/privacy/ccpa#" target="_blank" rel="nofollow">CCPA</a> and <a href="dmca-act.html" rel="nofollow">DMCA</a> regulations. We also offer <a href="enrollment-marketing.html" rel="dofollow">enrollment marketing</a>. <strong>We are
                        not a law firm</strong>, and the information on our website is for informational purposes only and may not be up-to-date. Always consult a licensed attorney for personalized legal advice.</p>
				</div>
				<div class="md:p-4 p-3 items-center flex flex-col gap-1">
					<p> © 2014 - 2024 WorkTraining.com, or its affiliates. All Rights Reserved. </p>
				</div>
			</div>
		</div>
	</div>
</footer>


<?php /* ?>
@php
    $socials = getSocials();
    if (!empty($socials) and count($socials)) {
        $socials = collect($socials)->sortBy('order')->toArray();
    }

    $footerColumns = getFooterColumns();
@endphp

<footer class="footer bg-secondary position-relative user-select-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" footer-subscribe d-block d-md-flex align-items-center justify-content-between">
                    <div class="flex-grow-1">
                        <strong>{{ trans('footer.join_us_today') }}</strong>
                        <span class="d-block mt-5 text-white">{{ trans('footer.subscribe_content') }}</span>
                    </div>
                    <div class="subscribe-input bg-white p-10 flex-grow-1 mt-30 mt-md-0">
                        <form action="/newsletters" method="post">
                            {{ csrf_field() }}

                            <div class="form-group d-flex align-items-center m-0">
                                <div class="w-100">
                                    <input type="text" name="newsletter_email" class="form-control border-0 @error('newsletter_email') is-invalid @enderror" placeholder="{{ trans('footer.enter_email_here') }}"/>
                                    @error('newsletter_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill">{{ trans('footer.join') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $columns = ['first_column','second_column','third_column','forth_column'];
    @endphp

    <div class="container">
        <div class="row">

            @foreach($columns as $column)
                <div class="col-6 col-md-3">
                    @if(!empty($footerColumns[$column]))
                        @if(!empty($footerColumns[$column]['title']))
                            <span class="header d-block text-white font-weight-bold">{{ $footerColumns[$column]['title'] }}</span>
                        @endif

                        @if(!empty($footerColumns[$column]['value']))
                            <div class="mt-20">
                                {!! $footerColumns[$column]['value'] !!}
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach

        </div>

        <div class="mt-40 border-blue py-25 d-flex align-items-center justify-content-between">
            <div class="footer-logo">
                <a href="/">
                    @if(!empty($generalSettings['footer_logo']))
                        <img src="{{ $generalSettings['footer_logo'] }}" class="img-cover" alt="footer logo">
                    @endif
                </a>
            </div>

            <div class="footer-social">
                @if(!empty($socials) and count($socials))
                    @foreach($socials as $social)
                        <a href="{{ $social['link'] }}" target="_blank">
                            <img src="{{ $social['image'] }}" alt="{{ $social['title'] }}" class="mr-15">
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @if(getOthersPersonalizationSettings('platform_phone_and_email_position') == 'footer')
        <div class="footer-copyright-card">
            <div class="container d-flex align-items-center justify-content-between py-15">
                <div class="font-14 text-white">{{ trans('update.platform_copyright_hint') }}</div>

                <div class="d-flex align-items-center justify-content-center">
                    @if(!empty($generalSettings['site_phone']))
                        <div class="d-flex align-items-center text-white font-14">
                            <i data-feather="phone" width="20" height="20" class="mr-10"></i>
                            {{ $generalSettings['site_phone'] }}
                        </div>
                    @endif

                    @if(!empty($generalSettings['site_email']))
                        <div class="border-left mx-5 mx-lg-15 h-100"></div>

                        <div class="d-flex align-items-center text-white font-14">
                            <i data-feather="mail" width="20" height="20" class="mr-10"></i>
                            {{ $generalSettings['site_email'] }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

</footer>
