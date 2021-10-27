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
                    <h1 class="page-title text-align-left mb-4">Plans and Prices</h1>
                    <div class="row">
                        <div class="col-3 mb-4">
                            <button class="characteristic-panel btn char-btn p-2"><span>1 - Room</span><i
                                        class="icon-down"></i></button>
                        </div>
                        <div class="col-3 mb-4">
                            <button class="characteristic-panel btn char-btn p-2 active"><span>2 - Room</span><i
                                        class="icon-down"></i></button>
                        </div>
                        <div class="col-3 mb-4">
                            <button class="characteristic-panel btn char-btn p-2"><span>3 - Room</span><i
                                        class="icon-down"></i></button>
                        </div>
                        <div class="col-3 mb-4">
                            <button class="characteristic-panel btn char-btn p-2"><span>4 - Room</span><i
                                        class="icon-down"></i></button>
                        </div>
                    </div>
                    @include('clients.components.plan-price-cards')
                    @include('clients.components.facilities')
                    @include('clients.components.payment-calculator')
                    <h1 class="page-title text-align-left mb-4">About Project</h1>
                    <div class="about-us-page-information mb-5">
                        {{--TODO: Developer about show--}}
                    </div>
                    @include('clients.components.location-project-calculator')
                </div>
                <div class="col-4">
                    @include('clients.layout.send-request-for-more')
                    @include('clients.components.about-us-contact-info')
                    <div class="ad p-0 mb-30">
                        <div class="ad-item mh-240">Place for AD</div>
                    </div>
                    <div class="ad p-0 mb-30">
                        <div class="ad-item mh-1250">Place for AD</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection