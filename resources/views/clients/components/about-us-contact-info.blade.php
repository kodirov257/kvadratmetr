<div class="contact-us-page-contacts">
    <div class="contact-us-logo-name">
        <h3 class="logo-name">{{$developer->name}}</h3>
        <img src="{{$developer->logo}}" alt="site logo" class="logo">
    </div>
    <i class="icon-map"></i><span class="contact-us-page-coordinate">{{$developer->address}}</span>
    <div class="contact-us-page-contact">
        <a href="tel:+{{$developer->phone ?? ''}}"><i class="icon-phone"></i>{{$developer->phone ?? ''}}</a>
        <a href="tel:{{$developer->call_center ?? ''}}"><i class="icon-phone"></i>{{$developer->call_center ?? ''}}</a>
        <a href="{{$developer->website ?? ''}}" target="_blank"><i class="icon-earth"></i>{{$developer->website ?? ''}}</a>
        <a href="mailto:{{$developer->email ?? ''}}"><i class="icon-at"></i>{{$developer->email ?? ''}}</a>
        <span>Follow as:</span>
{{--        TODO: Social network--}}
{{--        <a href="#" class="social facebook"><i class="icon-facebook"></i></a>--}}
{{--        <a href="#" class="social instagram"><i class="icon-instagram"></i></a>--}}
{{--        <a href="#" class="social telegram"><i class="icon-telegram"></i></a>--}}
    </div>
</div>