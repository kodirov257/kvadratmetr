<div class="about-developer-address">
    <div class="about-developer-locations">
        <address class="about-developer-location">
            <i class="icon-map"></i><span class="about-developer-coordinate">{{$developer->adress}}</span>
            <span class="about-developer-detail-coordinate">({{$developer->landmark}})</span>
            <div class="about-developer-landmark">Landmark:</div>
            <div class="about-developer-landmark-location">{{$developer->landmark}}</div>
        </address>
    </div>
    <div class="about-developer-contacts">
        <div class="about-developer-contact">
            <a href="tel:+{{$developer->phone ?? ''}}"><i class="icon-phone"></i>{{$developer->phone ?? ''}}</a>
            <a href="{{$developer->website ?? ''}}" target="_blank"><i class="icon-earth"></i>{{$developer->website ?? ''}}</a>
            <a href="mailto:{{$developer->email ?? ''}}"><i class="icon-at"></i>{{$developer->email ?? ''}}</a>
        </div>
        <div class="about-developer-social">
            <span>Follow as:</span>
{{--            TODO: Social media--}}
{{--            <a href="#" class="facebook"><i class="icon-facebook"></i></a>--}}
{{--            <a href="#" class="instagram"><i class="icon-instagram"></i></a>--}}
{{--            <a href="#" class="telegram"><i class="icon-telegram"></i></a>--}}
        </div>
    </div>
</div>