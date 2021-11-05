<div class="about-developer-address">
    <div class="about-developer-locations">
        <address class="about-developer-location">
{{--            @dd($developer)--}}
            <i class="icon-map"></i><span class="about-developer-coordinate">{{$developer->address}}</span>
            <span class="about-developer-detail-coordinate">({{$developer->landmark}})</span>
            <div class="about-developer-landmark">Landmark:</div>
            <div class="about-developer-landmark-location">{{$developer->landmark}}</div>
        </address>
    </div>
    <div class="about-developer-contacts">
        <div class="about-developer-contact">
            <a href="tel:+{{$developer->$developer ?? ''}}"><i class="icon-phone"></i>{{$developer->main_number ?? ''}}</a>
            <a href="{{$developer->website ?? ''}}" target="_blank"><i class="icon-earth"></i>{{$developer->website ?? ''}}</a>
            <a href="mailto:{{$developer->email ?? ''}}"><i class="icon-at"></i>{{$developer->email ?? ''}}</a>
        </div>
        <div class="about-developer-social">
            <span>Follow as:</span>
{{--            TODO: Social media--}}
{{--            <a href="#" class="facebook"><i class="icon-facebook"></i></a>--}}
{{--            <a href="#" class="instagram"><i class="icon-instagram"></i></a>--}}
{{--            <a href="#" class="telegram"><i class="icon-telegram"></i></a>--}}
            @if($developer->instagram)
                <a href="{{$developer->instagram}}"><i class="icon-instagram"></i></a>
            @endif
            @if($developer->facebook)
                <a href="{{$developer->facebook}}"><i class="icon-facebook"></i></a>
            @endif
            @if($developer->telegram)
                <a href="{{$developer->telegram}}"><i class="icon-telegram"></i></a>
            @endif
            @if($developer->tik_tok)
                <a href="{{$developer->tik_tok}}"><i class="icon-tiktok"></i></a>
            @endif
            @if($developer->youtube)
                <a href="{{$developer->youtube}}"><i class="icon-youtube"></i></a>
            @endif
            @if($developer->twitter)
                <a href="{{$developer->twitter}}"><i class="icon-twitter"></i></a>
            @endif
        </div>
    </div>
</div>