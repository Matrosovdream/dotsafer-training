@extends(getTemplate() . '.panel.layouts.panel_layout')

@push('styles_top')

@endpush

@section('content')
<section>
    <h1 class="section-title">My invites</h1>

    <div class="activities-container mt-25 p-20 p-lg-35">
        <div class="row">

            <div class="col-3 d-flex align-items-center justify-content-center">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                    <strong class="font-30 text-dark-blue font-weight-bold mt-5">{{ count($invites) }}</strong>
                    <span class="font-16 text-gray font-weight-500">Total invites</span>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="mt-25">
    <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
        <h2 class="section-title">Course invites</h2>
    </div>

    @if (count($invites) > 0)

        <div class="panel-section-card py-20 px-25 mt-20"">
            <div class=" row">

            <div class="col-12 ">
                <div class="table-responsive">
                    <table class="table text-center custom-table">
                        <thead>
                            <tr>
                                <th class="text-left">Course</th>
                                <th class="text-center">Organization</th>
                                <th class="text-center">Status</th>
                                <th class="text-center"></th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invites as $invite)
                                <tr>
                                    <td class="text-left">
                                        <div class="d-flex flex-column">
                                            <div class="font-14 font-weight-500">
                                                {{ $invite->webinar->translation->title }}
                                            </div>
                                            <div class="font-12 text-gray">
                                            Invited on {{ $invite->created_at->format('d.m.Y') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column">
                                            <div class="font-14 font-weight-500">
                                                {{ $invite->organization->full_name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="font-weight-500 text-gray">
                                            {{ $invite->status->name }}
                                        </span>
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($invite->status_id == 1)
                                            <form action="{{ route('panel.webinar.student.invite.accept', $invite->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Accept</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($invite->status_id == 1)
                                            <form action="{{ route('panel.webinar.student.invite.reject', $invite->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Reject</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

    @endif

</section>

@endsection

@push('scripts_bottom')
    <script>
        var undefinedActiveSessionLang = '{{ trans('webinars.undefined_active_session') }}';
    </script>

    <script src="/assets/default/js/panel/join_webinar.min.js"></script>
@endpush