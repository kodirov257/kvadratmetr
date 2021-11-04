<section class="partners" id="partners">
    <div class="container">
        <div class="partners-slider">
            @foreach($developers as $developer)
            <div class="slider-item">

                    <img src="{{$developer->logo}}" alt="partner logo">
            </div>
            @endforeach
        </div>
    </div>
</section>