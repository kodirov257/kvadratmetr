<div class="col-4">
    <div class="project-card">
        <div class="project-card__image">
            @if(isset($project->photos) && count($project->photos) > 0)
            <img
                    src="{{$project->photos[0]->fileOriginal}}"
                    alt=""
            />
            @endif
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
{{--            <p class="project-card__detail">--}}
            @foreach($project->values as $value)
{{--                @if($value->value)--}}
                    <p class="project-card__detail"><img src="{{$value->characteristic->icon}}" alt="">{{$value->characteristic->name}}:
                        <span>{{$value->value}} </span>
                    </p>
{{--                @endif--}}
            @endforeach
{{--            <p class="project-card__detail">--}}
{{--                          <span><i class="icon-area"></i>Area:</span--}}
{{--                          ><b>16</b> m<sup>2</sup> to <b>16</b> m<sup>2</sup>--}}
{{--            </p>--}}
{{--            <p class="project-card__detail">--}}
{{--                <span><i class="icon-square"></i>Rooms:</span>from--}}
{{--                <b>16</b> to <b>16</b>--}}
{{--            </p>--}}
            @foreach($project->facilities as $facility)
                <p class="project-card__detail">
                    <span><img src="{{$facility->icon}}" alt="">With {{$facility->name}}</span>
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

<script>
    function submitChangeStatus(id, status){
        console.log(id, status)
    }


</script>