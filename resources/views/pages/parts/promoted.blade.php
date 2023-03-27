<div>
    <p class="text-muted small">{{ trans('entities.pages_promoted_help') }}</p>
    <input value="{{ isset($page->promoted_at) ? $page->promoted_at->format('Y-m-d') : null }}"
            type="date"
            name="promoted_at"
            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
</div>