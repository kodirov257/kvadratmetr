<div class="contact-us-page-contacts">
    <div class="contact-us-logo-name">
        <h3 class="logo-name">{{$developer->name}}</h3>
        <img src="{{$developer->icon}}" alt="site logo" class="logo">
    </div>
    <i class="icon-map"></i><span class="contact-us-page-coordinate">{{$developer->address}}</span>
    <div class="contact-us-page-contact">
        <a href="tel:+998{{$developer->main_number}}"><i class="icon-phone"></i>{{$developer->main_number}}</a>
        <a href="tel:+998{{$developer->call_center}}"><i class="icon-phone"></i>{{$developer->call_center}}</a>
        <a href="{{$developer->website}}" target="_blank"><i
                    class="icon-earth"></i>{{$developer->website}}</a>
        <a href="mailto:{{$developer->email}}"><i class="icon-at"></i>{{$developer->email}}</a>
        <span>Follow us:</span>
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