<div class="slider-item pop-item">
    @if(count($project->photos) > 0)
        <img src="{{ $project->photos[0]->fileOriginal }}" alt="partner logo">
    @endif
    <h6 class="title">{{ $project->name }}</h6>
    <p class="subtitle">Address: <span>{{ $project->address }}</span></p>
    <div class="some-info">
        <div class="info">
            @foreach($project->values as $value)
{{--            TODO: Once characteristics added need to fix these--}}
            <div class="small-info"><p>{{ $value->characteristic->name }}:</p><span><strong>{{ $value->value }} </strong></span></div>
            @endforeach
        </div>
        <div class="next-page"><a class="btn next-btn" href="{{ route('calculator', $project->id) }}">More <i class="icon-right"></i></a></div>
    </div>
    <div class="foot">
        <div class="row justify-content-between">
            <div class="col-auto"><p>Developer: <strong>{{ $project->developer->name }}</strong></p></div>
            <div class="col-auto">2022</div>
        </div>
    </div>
</div>