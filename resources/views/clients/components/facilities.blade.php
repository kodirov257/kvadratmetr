<h1 class="page-title text-align-left mb-4">Facilities</h1>
<div class="characteristic-panel mb-4">
    <div class="row">
        <div class="col-4">
{{--            @dd($project->facilities)--}}
            @foreach($project->facilities as $facility)
            <p><img src="{{$facility->icon}}" alt="">{{$facility->name}}</p>
            @endforeach
        </div>
        <div class="col-4">
{{--            <p><i class="icon-wifi"></i>Wi-Fi</p>--}}
{{--            <p><i class="icon-bed"></i>Bedroom</p>--}}
{{--            <p><i class="icon-police"></i>Security</p>--}}
{{--            <p><i class="icon-parking"></i>Parking</p>--}}
        </div>
        <div class="col-4">
{{--            <p><i class="icon-laptop"></i>Work zone</p>--}}
{{--            <p><i class="icon-kitchen"></i>Restaurant</p>--}}
{{--            <p><i class="icon-terrace"></i>Terrace</p>--}}
{{--            <p><i class="icon-shop"></i>Supermarket</p>--}}
        </div>
    </div>
</div>