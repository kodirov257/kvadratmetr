@extends('layouts.app')

@section('content')

    @if ($project->isDraft())
        <div class="alert alert-danger">
            It is a draft.
        </div>
        @if ($project->reject_reason)
            <div class="alert alert-danger">
                {{ $project->reject_reason }}
            </div>
        @endif
    @endif

    @can ('manage-projects')
        <div class="d-flex flex-row mb-3">
            <a href="{{ route('admin.projects.projects.edit', $project) }}" class="btn btn-primary mr-1">Edit</a>
            <a href="{{ route('admin.projects.projects.photos', $project) }}" class="btn btn-primary mr-1">Photos</a>

            @if ($project->isOnModeration())
                <form method="POST" action="{{ route('admin.projects.projects.moderate', $project) }}" class="mr-1">
                    @csrf
                    <button class="btn btn-success">Moderate</button>
                </form>
            @endif

            @if ($project->isOnModeration() || $project->isActive())
                <a href="{{ route('admin.projects.projects.reject', $project) }}" class="btn btn-danger mr-1">Reject</a>
            @endif

            <form method="POST" action="{{ route('admin.projects.projects.destroy', $project) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endcan

    @can ('manage-own-project', $project)
            <div class="d-flex flex-row mb-3">
                <a href="{{ route('cabinet.projects.edit', $project) }}" class="btn btn-primary mr-1">Edit</a>
                <a href="{{ route('cabinet.projects.photos', $project) }}" class="btn btn-primary mr-1">Photos</a>

                @if ($project->isDraft())
                    <form method="POST" action="{{ route('cabinet.projects.send', $project) }}" class="mr-1">
                        @csrf
                        <button class="btn btn-success">Publish</button>
                    </form>
                @endif
                @if ($project->isActive())
                    <form method="POST" action="{{ route('cabinet.projects.close', $project) }}" class="mr-1">
                        @csrf
                        <button class="btn btn-success">Close</button>
                    </form>
                @endif

                <form method="POST" action="{{ route('cabinet.projects.destroy', $project) }}" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
    @endcan

    <div class="row">
        <div class="col-md-9">

            <p class="float-right" style="font-size: 36px;">{{ $project->price }}</p>
            <h1 style="margin-bottom: 10px">{{ $project->title  }}</h1>
            <p>
                @if ($project->expires_at)
                    Date: {{ $project->published_at }} &nbsp;
                @endif
                @if ($project->expires_at)
                    Expires: {{ $project->expires_at }}
                @endif
            </p>

            <div style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-10">
                        <div style="height: 400px; background: #f6f6f6; border: 1px solid #ddd"></div>
                    </div>
                    <div class="col-2">
                        <div style="height: 100px; background: #f6f6f6; border: 1px solid #ddd"></div>
                        <div style="height: 100px; background: #f6f6f6; border: 1px solid #ddd"></div>
                        <div style="height: 100px; background: #f6f6f6; border: 1px solid #ddd"></div>
                        <div style="height: 100px; background: #f6f6f6; border: 1px solid #ddd"></div>
                    </div>
                </div>
            </div>

            <p>{!! nl2br(e($project->content)) !!}</p>

            <table class="table table-bordered">
                <tbody>
                @foreach ($project->category->allCharacteristics() as $characteristic)
                    <tr>
                        <th>{{ $characteristic->name }}</th>
                        <td>{{ $project->getValue($characteristic->id) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <p>Address: {{ $project->address }}</p>

            <div style="margin: 20px 0; border: 1px solid #ddd">
                <div id="map" style="width: 100%; height: 250px"></div>
            </div>

            <p style="margin-bottom: 20px">Seller: {{ $project->user->name }}</p>

            <div class="d-flex flex-row mb-3">
                <span class="btn btn-success mr-1"><span class="fa fa-envelope"></span> Send Message</span>
                <span class="btn btn-primary phone-button mr-1" data-source="{{ route('projects.phone', $project) }}"><span class="fa fa-phone"></span> <span class="number">Show Phone Number</span></span>
                @if ($user && $user->hasInFavorites($project->id))
                    <form method="POST" action="{{ route('projects.favorites', $project) }}" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-secondary"><span class="fa fa-star"></span> Remove from Favorites</button>
                    </form>
                @else
                    <form method="POST" action="{{ route('projects.favorites', $project) }}" class="mr-1">
                        @csrf
                        <button class="btn btn-danger"><span class="fa fa-star"></span> Add to Favorites</button>
                    </form>
                @endif
            </div>

            <hr/>

            <div class="h3">Similar projects</div>

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://images.pexels.com/photos/297933/pexels-photo-297933.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt=""/>
                        <div class="card-body">
                            <div class="card-title h4 mt-0" style="margin: 10px 0"><a href="#">The First Thing</a></div>
                            <p class="card-text" style="color: #666">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://images.pexels.com/photos/297933/pexels-photo-297933.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt=""/>
                        <div class="card-body">
                            <div class="card-title h4 mt-0" style="margin: 10px 0"><a href="#">The First Thing</a></div>
                            <p class="card-text" style="color: #666">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://images.pexels.com/photos/297933/pexels-photo-297933.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt=""/>
                        <div class="card-body">
                            <div class="card-title h4 mt-0" style="margin: 10px 0"><a href="#">The First Thing</a></div>
                            <p class="card-text" style="color: #666">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div style="height: 400px; background: #f6f6f6; border: 1px solid #ddd; margin-bottom: 20px"></div>
            <div style="height: 400px; background: #f6f6f6; border: 1px solid #ddd; margin-bottom: 20px"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>

    <script type='text/javascript'>
        ymaps.ready(init);
        function init(){
            var geocoder = new ymaps.geocode(
                '{{ $project->address }}',
                { results: 1 }
            );
            geocoder.then(
                function (res) {
                    var coord = res.geoObjects.get(0).geometry.getCoordinates();
                    var map = new ymaps.Map('map', {
                        center: coord,
                        zoom: 7,
                        behaviors: ['default', 'scrollZoom'],
                        controls: ['mapTools']
                    });
                    map.geoObjects.add(res.geoObjects.get(0));
                    map.zoomRange.get(coord).then(function(range){
                        map.setCenter(coord, range[1] - 1)
                    });
                    map.controls.add('mapTools')
                        .add('zoomControl')
                        .add('typeSelector');
                }
            );
        }
    </script>
@endsection