@if (count($breadcrumbs))
    <div class="header-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <a href="{{ $breadcrumb->url }}" class="header-breadcrumb__link"><i class="icon-home"></i> {{ $breadcrumb->title }}</a>
                <i class="icon-right-arr"></i>
            @else
                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                <a href="#" class="header-breadcrumb__link active"><i class="icon-dash-icon"></i> {{ $breadcrumb->title }}</a>
            @endif
        @endforeach
    </div>
@endif
