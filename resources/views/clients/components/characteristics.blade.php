<div class="characteristic-panel mb-4">
    <div class="row">
        <div class="col-6">
            @foreach($project->values as $value)
                {{--            TODO: Once characteristics added need to fix these--}}
                {{--            @dd($value)--}}
                @if($value->value)
                    <p><i class="icon-building"></i>{{$value->characteristic->name}}:
                        <span>{{$value->value}} floor</span>
                    </p>
                @endif
            @endforeach
        </div>
        <div class="col-6">
            @foreach($project->facilities as $facility)
{{--                @dd($facility)--}}
                <p><img src="{{$facility->icon}}" alt="">With {{$facility->name}}<span></span></p>
            @endforeach
        </div>
    </div>
</div>