@php
    $latest = \BookStack\Entities\Models\Page::visible()
        ->whereNotNull('promoted_at')
        ->where('draft', false)
        ->where('promoted_at', '<=', \Carbon\Carbon::now())
        ->where('promoted_at', '>', \Carbon\Carbon::now()->subDays(7))
        ->orderBy('promoted_at', 'desc')
        ->first();
@endphp
@if ($latest)
    <div class="container">
        <div class="grid full">
            <div class="card mb-xl">
                <div class="px-s py-xs" style="background: rgba(0,0,0,0.15); display: flex; justify-content: space-between">
                    <strong>{{ trans('common.news') }}</strong>
                    <a href="{{ $latest->getUrl() }}">&raquo; {{ trans('common.view') }}</a>
                </div>
                <main class="content-wrap px-m" style="max-height: 500px; overflow-y: auto;">
                    <div component="page-display" option:page-display:page-id="{{ $latest->id }}"
                        class="page-content clearfix">
                        @include('pages.parts.page-display', ['page' => $latest])
                    </div>
                    @include('pages.parts.pointer', ['page' => $latest])
                </main>
            </div>
        </div>
    </div>
@endif
