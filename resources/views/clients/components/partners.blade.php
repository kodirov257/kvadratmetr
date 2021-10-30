<section class="partners" id="partners">
    <div class="container">
        <div class="partners-slider">
            <div class="slider-item">
                @foreach($developers as $developer)
                    <img src="{{$developer->logo}}" alt="partner logo">
                @endforeach
            </div>
        </div>
    </div>
</section>