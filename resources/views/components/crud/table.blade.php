<div class="table-responsive">
    <table class="table table-light align-middle">
        {{ $slot }}
    </table>
</div>
@if(isset($paginator))
    {!! $paginator->appends(request()->except('page'))->links() !!}
@endif
