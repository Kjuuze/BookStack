@php
    $recentlyPromoted = \BookStack\Entities\Models\Page::whereNotNull('promoted_at')
        ->where('draft', false)
        ->where('promoted_at', '<=', \Carbon\Carbon::now())
        ->orderBy('promoted_at', 'desc')
        ->limit(5)
        ->get();
@endphp

@if($recentlyPromoted->count())
<div id="recently-promoted" class="card mb-xl">
    <h3 class="card-title">Aktuellste News</h3>
    <div id="recently-promoted-pages" class="px-m">
        @include('entities.list', [
            'entities' => $recentlyPromoted,
            'style' => 'compact',
            'emptyText' => '',
        ])
    </div>
</div>
@endif