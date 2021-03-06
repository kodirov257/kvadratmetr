@extends('layouts.front-app')

@section('breadcrumbs', '')

@section('content')
    <section class="calculator-page">
        @include('clients.components.calculator-page-section')
    </section>

    <section class="images-page">
        @include('clients.components.galary-calculator')
    </section>

    <section class="characteristics-page">
        <div class="container">
            <h1 class="page-title text-align-left mb-5">Characteristics</h1>
            <div class="row">
                <div class="col-8">

                    @include('clients.components.characteristics')
                    @php($roomActive = explode(',', request('room')))
                    <h1 class="page-title text-align-left mb-4">Plans and Prices</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-6 mb-4">
                            <form action="{{route('calculator', $project->id)}}">
                                <input type="hidden" value="1" name="room">
                                <button class="characteristic-panel btn char-btn p-2 {{$roomActive[0] == 1 ? 'active' : ''}}" type="submit">
                                    <span>1 - Room</span><i
                                            class="{{$roomActive[0] == 1 ? 'icon-up' : 'icon-down'}}"></i></button>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6 mb-4">
                            <form action="{{route('calculator', $project->id)}}">
                                <input type="hidden" value="2" name="room">
                                <button type="submit" class="characteristic-panel btn char-btn p-2 {{$roomActive[0] == 2 ? 'active' : ''}}"><span>2 -
                    Room</span><i class="{{$roomActive[0] == 2 ? 'icon-up' : 'icon-down'}}"></i></button>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6 mb-4">
                            <form action="{{route('calculator', $project->id)}}">
                                <input type="hidden" value="3" name="room">

                                <button class="characteristic-panel btn char-btn p-2 {{$roomActive[0] == 3 ? 'active' : ''}}" type="submit">
                                    <span>3 - Room</span><i
                                            class="{{$roomActive[0] == 3 ? 'icon-up' : 'icon-down'}}"></i></button>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6 mb-4">
                            <form action="{{route('calculator', $project->id)}}">
                                <input type="hidden" value="4" name="room">
                                <button class="characteristic-panel btn char-btn p-2 {{$roomActive[0] == 4 ? 'active' : ''}}"><span>4 - Room</span><i
                                            class="{{$roomActive[0] == 4 ? 'icon-up' : 'icon-down'}}"></i></button>
                            </form>
                        </div>
                    </div>
                    @include('clients.components.plan-price-cards')
                    @include('clients.components.facilities')
                    {{--                    @include('clients.components.payment-calculator')--}}
                    <h1 class="page-title text-align-left mb-4">About Project</h1>
                    <div class="about-us-page-information mb-5">
                        {!! $project->about !!}
                    </div>
                    @include('clients.components.location-project-calculator')
                </div>
                <div class="col-4">
                    {{--                    @include('clients.layout.send-request-for-more')--}}
                    @include('clients.components.about-us-contact-info-developer', ['developer'=>$project->developer])
                    <div class="ad p-0 mb-30">
                        <div class="ad-item mh-240">Place for AD</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection