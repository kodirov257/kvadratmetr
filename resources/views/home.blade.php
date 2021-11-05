@extends('layouts.front-app')

@section('breadcrumbs', '')

@section('content')

    <section class="main-slider">
        <div class="container">
            <form action="{{route('search')}}" class="main-filter">
{{--                <div class="filter-item">--}}
{{--                    <span class="filter-item-type">Real Estate Name</span>--}}
{{--                    <span class="filter-item-value"><input type="text" name="name" style="width: 80%;"> <i class="icon-building"></i></span>--}}

{{--                    <small>Apartments in this Real estate</small>--}}
{{--                    <i class="filter-btn-btn icon-down"></i>--}}
{{--                </div>--}}
                <div class="filter-item">
                    <span class="filter-item-type">District</span>
                    <span class="filter-item-value">
                        <select name="district" id="district">
                          @foreach($regions as $region)
                            <option value="{{$region}}">{{$region}}</option>
                            @endforeach
                        </select>
                    <input type="text" name="district" hidden>
                    <i class="filter-btn-btn icon-down"></i>
                </div>
                <div class="filter-item" style="width: calc(50% - 30px);">
                    <div class="rangeslider">
                        <div class="range_div">
                            <div class="range_price">Price</div>
                            <div class="range_square_meter">Price per Square meter</div>
                        </div>
                        <span class="range_min light left">3.000.000</span>
                        <i class="icon-equalizer"></i>
                        <span class="range_max light right">38.000.000</span>
                        <input class="min" name="range_1" type="range" min="1" max="100" value="3"/>
                        <input class="max" name="range_1" type="range" min="1" max="100" value="38"/>
                    </div>
                </div>
{{--                <div class="filter-item" style="width: calc(30% - 30px);">--}}
                    <button type="submit" class="btn" class="filter-item" style="width: calc(30% - 30px);">Search Appartments <i class="icon-search"></i></button>
{{--                </div>--}}
            </form>
            <a href="#partners" class="scroll-down">Scroll Down <i class="icon-down"></i></a>
        </div>
    </section>

    @include('clients.components.partners', ['developers'=>$developers])
    @include('clients.components.popular-projects', ['developer'=>$projects])


{{--    <div class="ad">--}}
{{--        <div class="container">--}}
{{--            <div class="ad-item">Place for AD</div>--}}
{{--        </div>--}}
{{--    </div>--}}

    @include('clients.components.recent-projects', ['projects'=>$lastAddedProjects])

{{--    <div class="ad">--}}
{{--        <div class="container">--}}
{{--            <div class="ad-item">Place for AD</div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section class="areas">
        <div class="container">
            <h2 class="page-title">Choose the area that suits you</h2>
            <div class="row align-items-center">
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img src="{{asset('/assets/user-front/assets/img/domtut-8.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img class="hight-half" src="{{asset('/assets/user-front/assets/img/domtut-9.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                    <div class="areas-item">
                        <img class="hight-half" src="{{asset('/assets/user-front/assets/img/domtut-15.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img src="{{asset('/assets/user-front/assets/img/domtut-7.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="areas-item">
                        <img class="hight-half" src="{{asset('/assets/user-front/assets/img/domtut-16.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="areas-item">
                        <img class="hight-half" src="{{asset('/assets/user-front/assets/img/domtut-14.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img src="{{asset('/assets/user-front/assets/img/domtut-11.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img class="hight-half" src="{{asset('/assets/user-front/assets/img/domtut-12.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                    <div class="areas-item">
                        <img class="hight-half" src="{{asset('/assets/user-front/assets/img/domtut-13.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img src="{{asset('/assets/user-front/assets/img/domtut-10.jpg')}}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('clients.components.blog')

@endsection
