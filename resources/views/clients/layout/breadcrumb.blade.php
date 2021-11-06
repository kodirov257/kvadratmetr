{{--@if (count($breadcrumbs))--}}
{{--    <div class="bradcrump">--}}
{{--        @foreach ($breadcrumbs as $breadcrumb)--}}
{{--            @if ($breadcrumb->url && !$loop->last)--}}
{{--                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a><i class="icon-right"></i>--}}
{{--            @else--}}
{{--                <a href="{{ $breadcrumb->url }}" class="active">{{ $breadcrumb->title }}</a>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--@endif--}}


{{-- TODO: breadcrum --}}

<div class="bradcrump">
    <a href="/">Main Page</a><i class="icon-right"></i>

    <a href="/developers" class="active">Developers</a>

</div>
