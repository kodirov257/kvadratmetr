<div class="col-4">
    <div class="project-card">
        <div class="project-card__image">
            <img
                    src="{{$project->fileOriginal ?? ''}}"
                    alt=""
            />
            <a href="{{route('cabinet.projects.edit', [$project->id])}}" class="project-card__edit"
            ><i class="icon-pencil"></i
                ></a>
            <span
                    class="project-card__type {{$project->status === 5 ? 'project-card__type_active': ''}}"
            >{{$project->status === 5 ? 'Active': 'Deactive'}}</span
            >
        </div>
        <div class="project-card__title">{{$project->name ?? '-'}}</div>
        <div class="project-card__details">
            <p class="project-card__detail">
                @foreach($project->values as $value)
                    @php($characteristic = $value->characteristic)
                    {{--                    TODO: Only show 5 main characteristics after adding them #todo --}}

                @endforeach
                <span><i class="icon-building"></i>Storeys:</span
                ><b>16</b> floor
            </p>
            <p class="project-card__detail">
                          <span><i class="icon-area"></i>Area:</span
                          ><b>16</b> m<sup>2</sup> to <b>16</b> m<sup>2</sup>
            </p>
            <p class="project-card__detail">
                <span><i class="icon-square"></i>Rooms:</span>from
                <b>16</b> to <b>16</b>
            </p>
            @foreach($project->facilities as $facility)
                <p class="project-card__detail">
                    <span><i class="icon-hummer"></i>With {{$facility->name}}</span>
                </p>
            @endforeach

        </div>
        <div class="project-card__footer">
            Status: <span
                    class="text {{$project->status === 5 ? '' : 'deactive'}}">{{$project->status === 5 ? 'Active' : 'Deactive'}}</span>
            <label class="switch">
                {{--                @dd($project->status)--}}
                @if($project->status === 5)
                    <input type="checkbox" checked/>

                @else
                    <input type="checkbox"/>

                @endif
                <span class="slider round"></span>
            </label>
        </div>
    </div>
</div>