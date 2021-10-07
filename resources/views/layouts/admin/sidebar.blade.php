@section('sidebar-accordion')
    <ul class="show-dropdown">
        @foreach($menus as $menu)
{{--            @dd($menu['text'])--}}
            <li>
                <a href="#">{{--<i class="icon-dash-icon"></i>--}}<i class="{{$menu['icon'] ?? ''}}"></i>>{{$menu['text']}}</a>
            @if(isset($menu['submenu']))
                @dd($menu['text'])
                @include('layouts.admin.sidebar', ['menus'=>$menu['submenu']])'

            @endif

            </li>
{{--        <li class="active">--}}
{{--            <a href="#"><i class="icon-content"></i>Content</a>--}}
{{--            <ul class="show-dropdown">--}}
{{--                <li class="active">--}}
{{--                    <a href="#"><i class="icon-buildings"></i>NRG Group</a>--}}
{{--                    <ul class="show-dropdown">--}}
{{--                        <li><a href="#">NRG Oybek</a></li>--}}
{{--                        <li class="active"><a href="#">NRG Mirzo Ulugbek</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="javascript:void(0);"><i class="icon-insight"></i>Insights</a></li>--}}
{{--        <li><a href="javascript:void(0);"><i class="icon-marketing"></i>Marketing</a></li>--}}
{{--        <li><a href="javascript:void(0);"><i class="icon-lead"></i>Lead Manager</a></li>--}}
{{--        <li class="sidebar__settings"><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>--}}
{{--        <li class="sidebar__support"><a href="javascript:void(0);"><i class="icon-help"></i>Support</a></li>--}}
        @endforeach
    </ul>

@endsection