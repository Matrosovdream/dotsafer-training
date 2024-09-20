@extends(getTemplate() . '.panel.layouts.panel_layout')

@push('styles_top')

@endpush

@section('content')
<section>
    <h1 class="section-title">Purchase credits</h1>
</section>

<section class="mt-25">
    <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">

        <form method="POST" action="{{ route('panel.webinar.manage.purchasecredits.gateway', ['id' => $webinar->id]) }}"
            style="width: 50%;">
            @csrf

            <div class="container my-5">
                <div class="row g-4 align-items-center">
                    <div class="col-md-4">
                        <label for="credits" class="form-label">Number of Credits <span
                                class="text-danger">*</span></label>
                        <input type="number" value="1" name="count" class="form-control" id="credits" placeholder="e.g. 50" min="1">
                    </div>
                    <div class="col-md-4 text-center">
                        <label for="pricePerCredit" class="form-label">Price per Credit</label>
                        <div class="input-group">
                            <input type="text" value="${{ $webinar->price }}" class="form-control text-center"  placeholder="0" disabled>
                            <input type="hidden" id="pricePerCredit" value="{{ $webinar->price }}">
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <label for="totalPrice" class="form-label">Total Price</label>
                        <h2 class="text-primary" id="totalPrice">${{ $webinar->price }}</h2>
                    </div>
                </div>
            </div>

            <div class="text-center pt-25">
                <button type="submit" class="btn btn-primary">Buy</button>
            </div>
            
        </form>

    </div>
</section>

@endsection



@push('scripts_bottom')
    <script>
        var undefinedActiveSessionLang = '{{ trans('webinars.undefined_active_session') }}';
    </script>

    <script src="/assets/default/js/panel/join_webinar.min.js"></script>

    <script>
        jQuery(document).ready(function () {
            jQuery('#credits').on('input', function () {
                var credits = Number( jQuery(this).val() );
                var pricePerCredit = Number( jQuery('#pricePerCredit').val() );
                var totalPrice = credits * pricePerCredit;
                jQuery('#totalPrice').text('$' + totalPrice);
            });
        });
    </script>


@endpush