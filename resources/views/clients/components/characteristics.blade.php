<div class="characteristic-panel mb-4">
    <div class="row">
        <div class="col-6">
            @foreach($project->values as $characteristic)
                {{--            TODO: Once characteristics added need to fix these--}}
                <p><i class="icon-building"></i>{{$characteristic->name}}: <span>{{$characteristic->value}} floor</span>
                </p>
            @endforeach
        </div>
        <div class="col-6">
            @foreach($project->facilities as $facility)
                <p><i class="icon-hummer"></i>With {{$facility->name}}<span></span></p>
            @endforeach
        </div>
    </div>
</div>