@extends('layouts.front-app')

@section('breadcrumbs', '')

@section('content')
    {{--    TODO: breadcrumb--}}
    <section class="developer-page">
        <div class="container">
            <div class="bradcrump">
                <a href="#">Main Page</a><i class="icon-right"></i>
                <a href="#">Developers</a><i class="icon-right"></i>
                <a href="#">Buildings in Tashkent</a><i class="icon-right"></i>
                <a href="#" class="active">Mirzo Ulugbek</a>
            </div>
            <h1 class="page-title text-align-left">Buildings</h1>
        </div>
    </section>

    {{--Selected filter--}}
    @php($realEstateSlugs = explode(',', request('name')))
    @php($districtSlugs = explode(',', request('district')))

    <section class="buildings-selects">
        <div class="container">
            <div class="title">Real Estates in Mirzo Ulugbek in Tashkent 2021</div>
            <div class="selects_div">
                @if($realEstateSlugs[0] != '')
                    <button class="selects_btn d-block">{{$realEstateSlugs[0]}} ({{$resultNumber}}) <i
                                class="icon-plus radius"></i></button>
                @endif
                @if($districtSlugs[0] != '')
                    <button class="selects_btn">{{$districtSlugs[0]}} ({{$resultNumber}}) <i
                                class="icon-plus radius"></i></button>
                @endif
                <button class="selects_btn">Result ({{$resultNumber}}) <i class="icon-plus radius"></i></button>
            </div>
        </div>
    </section>

    <section class="buildings-projects">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="buildings-form characteristic-panel">
                        <div class="login">
                            <form action="{{route('search')}}">
                                <label for="name">Real Estate</label>
                                <input type="text" id="name" name="name" class="apart-input"
                                       placeholder="Enter Real Estate name" value="{{$realEstateSlugs[0]}}">
                                <label for="district">District</label>
                                <select class="characteristic-panel apart-input btn char-btn p-2 min-h-bg"
                                        name="district"
                                        id="district">

                                    <option value="{{$districtSlugs[0] == 'Bektemir' ?? ''}}">Bektemir</option>
                                    <option value="{{$districtSlugs[0] == 'Chilanzar' ?? ''}}">Chilanzar</option>
                                    <option value="{{$districtSlugs[0] == 'Mirobod' ?? ''}}">Mirobod</option>
                                    <option value="{{$districtSlugs[0] == 'Mirzo Ulugbek' ?? ''}}">Mirzo Ulugbek
                                    </option>
                                    <option value="{{$districtSlugs[0] == 'Olmazar' ?? ''}}">Olmazar</option>
                                    <option value="{{$districtSlugs[0] == 'Sergeli' ?? ''}}">Sergeli</option>
                                    <option value="{{$districtSlugs[0] == 'Shaykhontohur' ?? ''}}">Shaykhontohur
                                    </option>
                                    <option value="{{$districtSlugs[0] == 'Uchtepa' ?? ''}}">Uchtepa</option>
                                    <option value="{{$districtSlugs[0] == 'Yakkasaray' ?? ''}}">Yakkasaray</option>
                                    <option value="{{$districtSlugs[0] == 'Yashnobod' ?? ''}}">Yashnobod</option>
                                    <option value="{{$districtSlugs[0] == 'Yunusabad' ?? ''}}">Yunusabad</option>
                                </select>
                                {{--                                TODO: After plan and price--}}
                                {{--                                <label for="rooms">Rooms</label>--}}
                                {{--                                <select class="characteristic-panel apart-input btn char-btn p-2 min-h-bg" name="rooms"--}}
                                {{--                                        id="rooms">--}}
                                {{--                                    <option value="District">Select rooms</option>--}}
                                {{--                                </select>--}}
                                {{--                                TODO: Developer and real estet name????--}}
                                {{--                                <label for="developer">Developer</label>--}}
                                {{--                                <select class="characteristic-panel apart-input btn char-btn p-2 min-h-bg"--}}
                                {{--                                        name="developer"--}}
                                {{--                                        id="developer">--}}
                                {{--                                    <option value="Select Developer">Select Developer</option>--}}
                                {{--                                </select>--}}
                                <div class="bld-filt-item">
                                    <div class="rangeslider">
                                        <div class="range_div">
                                            <div class="range_price">Price</div>
                                            <div class="range_square_meter">Price per Square meter</div>
                                        </div>
                                        <span class="range_min light left">3.000.000</span>
                                        <i class="icon-equalizer"></i>
                                        <span class="range_max light right">38.000.000</span>
                                        @php($priceSlugs1 = explode(',', request('range_1')))
                                        @php($priceSlugs2 = explode(',', request('range_2')))
                                        <input class="min" name="range_1" type="range" min="1" max="100"
                                               value="{{$priceSlugs1[0] ?? 3}}"/>
                                        <input class="max" name="range_2" type="range" min="1" max="100"
                                               value="{{$priceSlugs2[0] ?? 38}}"/>
                                    </div>
                                </div>
                            </form>
                            <div class="send-buttons">
                                <button class="btn send-btn cus-my-btn">Filter by Parametrics<i
                                            class="icon-telegram"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    @foreach($result as $project)
                        <div class="buildings-item pop-item">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    @if(isset($project->photos) && count($project->photos) > 0)
                                        <img src="{{$project->photos[0]->fileOriginal}}" alt="domtut-image"
                                             class="hei-100">
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <h6 class="title">{{$project->name}}</h6>
                                    <p class="subtitle">Address: <span>{{$project->address}}</span></p>
                                    <div class="some-info">
                                        {{--                                        TODO with characteristics--}}
                                        {{--                                        <div class="info">--}}
                                        {{--                                            <div class="small-info">--}}
                                        {{--                                                <p>Storeys:</p><span><strong>3 </strong>floor</span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="small-info">--}}
                                        {{--                                                <p>Area:</p>--}}
                                        {{--                                                <span>from <strong>47 </strong>m<sup>2 </sup>to <strong>114 </strong>m<sup>2--}}
                                        {{--                          </sup></span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="small-info">--}}
                                        {{--                                                <p>Rooms:</p><span>from <strong>1 </strong>to <strong>3</strong></span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="small-info">--}}
                                        {{--                                                <p>Repairs:</p><span>with <strong>Repair</strong></span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="small-info">--}}
                                        {{--                                                <p>Parking:</p><span>private <strong>Parking</strong></span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="next-page">
                                            <a class="btn next-btn" href="{{route('calculator', $project->id)}}">More <i
                                                        class="icon-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="foot">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <p>Developer: <strong>{{$project->developer->name}}</strong></p>
                                            </div>
                                            <div class="col-auto">2022</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="buildings-paginator">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-md-8 col-sm-12">
                <div class="pagination">
                    <button class="btn-left"><i class="icon-left"></i></button>
                    <div class="pagination-btns">
                        <button class="pagination-btn active">1</button>
                    </div>
                    <button class="btn-right"><i class="icon-right"></i></button>
                </div>
            </div>
        </div>
    </section>

@endsection