<div class="col-4">
    <div class="card view">
        <div class="card-toolbar">
            <div class="card-toolbar__title fs-18">{{$developer->name_uz}}</div>
            <div class="card-toolbar__text">
{{--                <img src="./assets/img/NRG-logo.svg" alt="" />--}}
            </div>
        </div>
        <div class="card-toolbar-address">
            <i class="icon-location-pin"></i>
            <h3 class="toolbar-address__location">
                {{$developer->address_uz . ', ' . $developer->landmark_uz}}
            </h3>
        </div>
        @if($developer->main_number)
        <div class="card-toolbar-connecting">
            <i class="icon-phone"></i>
            <a href="tel:+998{{$developer->main_number ?? ''}}">+998 {{$developer->main_number ?? ''}}</a>
        </div>
        @endif
        @if($developer->call_center)
        <div class="card-toolbar-connecting">
            <i class="icon-phone"></i>
            <a href="tel:{{$developer->call_center ?? ''}}">{{$developer->call_center ?? ''}}</a>
        </div>
        @endif
        @if($developer->website)
        <div class="card-toolbar-internet">
            <i class="icon-site"></i>
            <a href="{{$developer->website ?? ''}}">{{$developer->website ?? ''}}</a>
        </div>
        @endif
        @if($developer->email)
        <div class="card-toolbar-mail">
            <i class="icon-mail-dog"></i>
            <a href="mailto:{{$developer->email ?? ''}}">{{$developer->email ?? ''}}</a>
        </div>
        @endif
        @if($developer->facebook)
        <div class="card__follow-us">
            <h3 class="follow__title">Follow us:</h3>
{{--            <i class="icon-facebook-follow"></i>--}}
{{--            <i class="icon-instagram"></i>--}}
        </div>
        @endif
        <div class="view-statics">
            <button type="button" class="viewing">View Statics</button>
        </div>
    </div>
</div>