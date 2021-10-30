<div class="slider-item pop-item">
    @if(count($project->photos) > 0)
        <img src="{{$project->photos[0]->fileOriginal}}" alt="partner logo">
    @endif
    <h6 class="title">{{$project->name}}</h6>
    <p class="subtitle">Address: <span>{{$project->address}}</span></p>
    <div class="some-info">
        <div class="info">
{{--            TODO: Once characteristics added need to fix these--}}
{{--            <div class="small-info"><p>Storeys:</p><span><strong>3 </strong>floor</span></div>--}}
{{--            <div class="small-info"><p>Area:</p><span>from <strong>47 </strong>m<sup>2 </sup>to <strong>114 </strong>m<sup>2 </sup></span></div>--}}
{{--            <div class="small-info"><p>Rooms:</p><span>from <strong>1 </strong>to <strong>3</strong></span></div>--}}
{{--            <div class="small-info"><p>Repairs:</p><span>with <strong>Repair</strong></span></div>--}}
{{--            <div class="small-info"><p>Parking:</p><span>private <strong>Parking</strong></span></div>--}}
        </div>
        <div class="next-page"><a class="btn next-btn" href="{{route('calculator', $project->id)}}">More <i class="icon-right"></i></a></div>
    </div>
    <div class="foot">
        <div class="row justify-content-between">
            <div class="col-auto"><p>Developer: <strong>{{$project->developer->name}}</strong></p></div>
            <div class="col-auto">2022</div>
        </div>
    </div>
</div>