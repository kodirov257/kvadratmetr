<div class="big-item">
    <div class="row">
        <div class="col-4">
            <div class="big-item-logo">
                <img
                        src="{{$developer->logo}}"
                        alt="developers logo"
                />
            </div>
            <div class="big-item-follow">
                <span>Follow us:</span>
{{--                TODO: telegram instagram --}}
{{--                <a href="#"><i class="icon-instagram"></i></a>--}}
{{--                <a href="#"><i class="icon-facebook"></i></a>--}}
{{--                <a href="#"><i class="icon-telegram"></i></a>--}}
            </div>
        </div>
        <div class="col-4">
            <div class="big-item-name">{{$developer->title}}</div>
            <div class="big-item-address">
                {{$developer->address}}
            </div>
            <div class="big-item-landmark">Landmark:</div>
            <div class="big-item-location">
                {{$developer->landmark}}
            </div>
            <div class="big-item-about">About Developer:</div>
            <div class="big-item-descr">
                {!! $developer->about !!}
            </div>
        </div>
        <div class="col-4">
            <div class="big-item-phone"><span>Phone:</span><a href="tel:+998{{$developer->main_number}}">{{$developer->main_number}}</a></div>
            <div class="big-item-call-center"><span>Call Center:</span><a href="tel:{{$developer->call_center}}">{{$developer->call_center}}</a></div>
            <div class="big-item-website"><span>Website:</span><a  href="{{$developer->website ?? ''}}" target="_blank">{{$developer->website ?? ''}}</a></div>
            <div class="big-item-e-mail"><span>E-mail:</span><a href="mailto:{{$developer->email ?? ''}}">{{$developer->email ?? ''}}</a></div>
            <div class="big-item-details"><a class="btn btn-detail" href="developer/{{$developer->id}}">Developer Page <i class="icon-right"></i></a></div>
        </div>
    </div>
</div>