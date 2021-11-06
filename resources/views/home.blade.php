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
                            <option value="{{ $region }}">{{ $region }}</option>
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
                    <button type="submit" class="btn filter-item" style="width: calc(30% - 30px);">Search Appartments <i class="icon-search"></i></button>
{{--                </div>--}}
            </form>
            <a href="#partners" class="scroll-down">Scroll Down <i class="icon-down"></i></a>
        </div>
    </section>

    @include('clients.components.partners', ['developers' => $developers])
    @include('clients.components.popular-projects', ['projects' => $projects])


{{--    <div class="ad">--}}
{{--        <div class="container">--}}
{{--            <div class="ad-item">Place for AD</div>--}}
{{--        </div>--}}
{{--    </div>--}}

    @include('clients.components.recent-projects', ['projects' => $lastAddedProjects])

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
                        <img src="{{ asset('/assets/user-front/assets/img/domtut-8.jpg') }}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img class="hight-half" src="{{ asset('/assets/user-front/assets/img/domtut-9.jpg') }}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                    <div class="areas-item">
                        <img class="hight-half" src="{{ asset('/assets/user-front/assets/img/domtut-15.jpg') }}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img src="{{ asset('/assets/user-front/assets/img/domtut-7.jpg') }}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="areas-item">
                        <img class="hight-half" src="{{ asset('/assets/user-front/assets/img/domtut-16.jpg') }}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="areas-item">
                        <img class="hight-half" src="{{ asset('/assets/user-front/assets/img/domtut-14.jpg') }}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img src="{{ asset('/assets/user-front/assets/img/domtut-11.jpg') }}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img class="hight-half" src="{{ asset('/assets/user-front/assets/img/domtut-12.jpg') }}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                    <div class="areas-item">
                        <img class="hight-half" src="{{ asset('/assets/user-front/assets/img/domtut-13.jpg') }}" alt="areas-item-img">
                        <div class="informs">
                            <div class="district"><strong>Chilanzar</strong> district</div>
                            <div class="complex"><strong>32</strong> Residential complexes</div>
                            <div class="complex-sinch"><strong>32</strong> RC</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="areas-item">
                        <img src="{{ asset('/assets/user-front/assets/img/domtut-10.jpg') }}" alt="areas-item-img">
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

    <section class="blog">
        <div class="container">
            <div class="blog-box">
                <h3 class="page-title dblint">See how <img src="{{ asset('/assets/user-front/assets/img/logo.svg') }}" alt="Kvadrat metr logo"> can help
                </h3>
                <h3 class="page-title dblint-sec">See how <img src="{{ asset('/assets/user-front/assets/img/logo-small.svg') }}" alt="Kvadrat metr logo">
                    can help</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <article class="blog-item">
                            <img src="{{ asset('/assets/user-front/assets/img/89cdbd8bfa158949b3d428a8a775c896.jpg') }}" class="blog-image" alt="">
                            <h4 class="blog-title">Buy a home</h4>
                            <p class="blog-text">With over 1 million+ homes for sale available on the website, Trulia
                                can match you with a house you will want to call home.</p>
                            <a href="#" class="btn">Find a Home</a>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <article class="blog-item">
                            <img src="{{ asset('/assets/user-front/assets/img/4560e02f69e215304fd993c448f358fd.jpg') }}" class="blog-image" alt="">
                            <h4 class="blog-title">Explore Districs</h4>
                            <p class="blog-text">Take a deep dive and browse original neighborhood photos, drone
                                footage, resident reviews and local insights to see if the homes for sale are right for
                                you.</p>
                            <a href="#" class="btn">Learn more</a>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <article class="blog-item">
                            <img src="{{ asset('/assets/user-front/assets/img/c1b61af1fe23a6535807041fec0f10a6.jpg') }}" class="blog-image" alt="">
                            <h4 class="blog-title">See Statistics</h4>
                            <p class="blog-text">With more neighborhood insights than any other real estate website,
                                we've captured the color and diversity of communities.</p>
                            <a href="#" class="btn">See Statistics</a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
