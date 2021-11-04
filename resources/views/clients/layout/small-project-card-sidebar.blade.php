<div class="small-item">
    <div class="image">
        @if(isset($project->photos) && count($project->photos) > 0)
            <img src="{{$project->photos[0]->fileOriginal}}" alt="small-item-image"
                 class="picture">
        @endif

    </div>
    <div class="small-item-info">
        {{--        TODO: Characteristics after need to here--}}
        @if($project->values)
            @foreach($project->values as $value)
                {{--            TODO: Once characteristics added need to fix these--}}
                <div class="small-info"><p>{{ $value->characteristic->name }}:</p><span><strong>{{ $value->value }} </strong></span></div>
            @endforeach
        @endif
    </div>
    <h6 class="name">{{ $project->name }}</h6>

    @if($project->price)
        <p class="price">
            {{ $project->price }} <span>sum</span><small>and more</small>
        </p>
    @endif

    <div class="foot">
        <div class="row justify-content-between">
            {{--            @dd($project->developer)--}}
            @if($project->developer)
                <div class="col-auto"><p>{{$project->developer->name}}</p></div>
            @endif
            <div class="col-auto">2022</div>
        </div>
    </div>
</div>