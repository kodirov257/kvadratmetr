<section class="about-developer">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="about-developer-logo">
                    <img src="{{$developer->logo}}" alt="developer-logo" class="logo">
                </div>
            </div>
            <div class="col-8">
                @include('clients.layout.adress-developer')
                <div class="about-developer-descriptions">
                    {!! $developer->about !!}
                </div>
            </div>
        </div>
    </div>
</section>