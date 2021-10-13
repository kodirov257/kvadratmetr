@extends('layouts.developer.app')

@section('content')


    <div class="main-content">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <form method="POST" action="{{route('cabinet.developer.update')}}" enctype="multipart/form-data">
{{--                        @method('PUT')--}}
                        @csrf
                        <div class="developer-bar">
                            <div class="developer-bar__image">
                            </div>
                            <div class="developer-bar__title" id="titleMain">{{$developer->name_en}}</div>
                            <input type="hidden"
                             name="name_en"
                             id="titleInput"
                             onblur="deactivateInput('title')"
                            value="{{$developer->name_en}}">
                            <a href="#" class="developer-bar__button"
                            ><i class="icon-pencil" onclick="activateInput('title')"></i></a>
                        </div>
                        <div class="b-nav">
                            <a href="#info" data-tab="info" class="b-nav-tab active"
                            >Info</a
                            >
                            <a href="#location" data-tab="location" class="b-nav-tab"
                            >Location</a
                            >
                        </div>
                        <div id="info" class="b-tab active">
                            <a href="#uzbek" class="info__language-span">Uzbek</a>
                            <a href="#russian" class="info__language-span">Russian</a>
                            <a href="#english" class="info__language-span">English</a>
                            <div id="uzbek" class="info__about-uzbek">
                                <h1 class="info__about">About Project Uzbek</h1>
                                <div class="info__about-buildings">
                                    <div class="info__about-text">
                                        <div class="info__bar">
                                            <h1 class="info__text-main">
                                                New building in Tashkent Oybek
                                            </h1>
                                            <a href="#" class="developer-bar__button" onclick="activateInput('uzAbout')"
                                            ><i class="icon-pencil" ></i
                                                ></a>
                                        </div>
                                        <div class="info__text">
                                            {!! $developer->about_uz !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: none">
                                        {!! Form::label('about_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
                                        {!! Form::textarea('about_uz', old('about_uz', $developer ? $developer->about_uz : null),
                                            ['class' => 'form-control' . $errors->has('about_uz') ? ' is-invalid' : '', 'id' => 'about_uz',
                                            'rows' => 10, 'onblur' => 'deactivate("uzAbout")']); !!}
                                        @if ($errors->has('about_uz'))
                                            <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('about_uz') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div id="english" class="info__about-english">
                                <h1 class="info__about">About Project English</h1>
                                <div class="info__about-buildings">
                                    <div class="info__about-text">
                                        <div class="info__bar">
                                            <h1 class="info__text-main">
                                                Новостройка в Ташкенте, Ойбек
                                            </h1>
                                            <a href="#" class="developer-bar__button" onclick="activateInput('enAbout')"
                                            ><i class="icon-pencil"></i
                                                ></a>
                                        </div>
                                        <div class="info__text">
                                            {!! $developer->about_en !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: none">
                                        {!! Form::label('about_en', 'About', ['class' => 'col-form-label']); !!}
                                        {!! Form::textarea('about_en', old('about_en', $developer ? $developer->about_en : null),
                                            ['class' => 'form-control' . $errors->has('about_en') ? ' is-invalid' : '', 'id' => 'about_en', 'rows' => 10]); !!}
                                        @if ($errors->has('about_en'))
                                            <span class="invalid-feedback"><strong>{{ $errors->first('about_en') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div id="russian" class="info__about-russian">
                                <h1 class="info__about">About Project Russian</h1>
                                <div class="info__about-buildings">
                                    <div class="info__about-text">
                                        <div class="info__bar">
                                            <h1 class="info__text-main">
                                                Новостройка в Ташкенте, Ойбек
                                            </h1>
                                            <a href="#" class="developer-bar__button" onclick="activateInput('ruAbout')"
                                            ><i class="icon-pencil"></i
                                                ></a>
                                        </div>
                                        <div class="info__text">
                                            {!! $developer->about_ru !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: none">
                                        {!! Form::label('about_ru', 'Описание', ['class' => 'col-form-label']); !!}
                                        {!! Form::textarea('about_ru', old('about_ru', $developer ? $developer->about_ru : null),
                                            ['class' => 'form-control' . $errors->has('about_ru') ? ' is-invalid' : '', 'id' => 'about_ru', 'rows' => 10]); !!}
                                        @if ($errors->has('about_ru'))
                                            <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('about_ru') }}</strong></span>
                                        @endif
                                    </div>
                                    <div class="save__infos">
                                        <button type="submit" class="saving">Save</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="location" class="b-tab">
                            <a href="#" class="locations__info active">Location Info</a>
                            <a href="#" class="locations__info">Map</a>

                            <h2 class="location__address-title">Address uz</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="address_uz"
                                       placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor" value="{{$developer->address_uz}}"/>
                            </div>
                            <h2 class="location__address-title">Landmark Uz</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="landmark_uz"
                                       placeholder="Tashkent City Park. RC 'Boulevard'" value="{{$developer->landmark_uz}}"/>

                            </div>
                            <h2 class="location__address-title">Address ru</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="address_ru"
                                       placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor" value="{{$developer->address_ru}}"/>
                            </div>
                            <h2 class="location__address-title">Landmark Ru</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="landmark_ru"
                                       placeholder="Tashkent City Park. RC 'Boulevard'" value="{{$developer->landmark_ru}}"/>

                            </div>
                            <h2 class="location__address-title">Address en</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="address_en"
                                       placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor" value="{{$developer->address_en}}"/>
                            </div>

                            <h2 class="location__address-title">Landmark en</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="landmark_en"
                                       placeholder="Tashkent City Park. RC 'Boulevard'" value="{{$developer->landmark_en}}"/>

                            </div>


                            <div class="location__in-map">
                                <h2 class="location__address-title">
                                    Mark your Office on the map
                                </h2>
                                <div id="map" class="map"></div>
                            </div>
                            <div class="save__infos">
                                <button type="button" class="saving">Save</button>
                            </div>
                        </div>

                        <input type="hidden" name="lng" id="lng" value="{{$developer->lng}}">
                        <input type="hidden" name="ltd" id="ltd" value="{{$developer->ltd}}">
                    </form>
                </div>
            </div>
            @include('partials.components._sidebar_info_developer')
        </div>
    </div>
    <script src="{{asset('./assets/leaflet/leaflet.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js" integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0=" crossorigin="anonymous"></script>
    <script src="{{asset('./assets/js/main.js')}}"></script>
    <script>
        function activateInput(type){
            let childrenElements;
            switch (type){
                case 'title':
                    document.getElementById('titleMain').style = ['display:none']
                    document.getElementById('titleInput').type = 'text'
                    console.log('test');
                    break;
                case 'uzAbout':
                    childrenElements = document.getElementById('uzbek');
                    childrenElements = childrenElements.querySelector('.info__about-buildings');
                    childrenElements.querySelector('.info__about-text').style = ['display:none']
                    childrenElements.querySelector('.form-group').style = ['display:block']
                    break;
                case 'ruAbout':
                    childrenElements = document.getElementById('russian');
                    childrenElements = childrenElements.querySelector('.info__about-buildings');
                    childrenElements.querySelector('.info__about-text').style = ['display:none']
                    childrenElements.querySelector('.form-group').style = ['display:block']
                    break;
                case 'enAbout':
                    childrenElements = document.getElementById('english');
                    childrenElements = childrenElements.querySelector('.info__about-buildings');
                    childrenElements.querySelector('.info__about-text').style = ['display:none']
                    childrenElements.querySelector('.form-group').style = ['display:block']

                    break;

                default:
                    console.log('default');
                    break
            }
        }

        function deactivateInput(type){
            let childrenElements;
            switch (type){
                case 'title':
                    document.getElementById('titleMain').style = ['display:show']
                    document.getElementById('titleInput').type = 'hidden'
                    document.getElementById('titleMain').innerHTML = document.getElementById('titleInput').value;
                    console.log(document.getElementById('titleInput').value);
                    break;
                case 'uzAbout':
                    childrenElements = document.getElementById('uzbek');
                    childrenElements = childrenElements.querySelector('.info__about-buildings');
                    childrenElements.querySelector('.info__about-text').style = ['display:block']
                    childrenElements.querySelector('.info__about-text  > .info__text').innerHTML = CKEDITOR.instances['about_uz'].getData()
                    console.log(CKEDITOR.instances['about_uz'].getData())
                    childrenElements.querySelector('.form-group').style = ['display:none']
                    break;
                case 'ruAbout':
                    childrenElements = document.getElementById('russian');
                    childrenElements = childrenElements.querySelector('.info__about-buildings');
                    childrenElements.querySelector('.info__about-text').style = ['display:block']
                    childrenElements.querySelector('.info__about-text  > .info__text').innerHTML = CKEDITOR.instances['about_ru'].getData()
                    console.log(CKEDITOR.instances['about_ru'].getData())
                    childrenElements.querySelector('.form-group').style = ['display:none']
                    break;
                case 'enAbout':
                    childrenElements = document.getElementById('english');
                    childrenElements = childrenElements.querySelector('.info__about-buildings');
                    childrenElements.querySelector('.info__about-text').style = ['display:block']
                    childrenElements.querySelector('.info__about-text  > .info__text').innerHTML = CKEDITOR.instances['about_en'].getData()
                    console.log(CKEDITOR.instances['about_en'].getData())
                    childrenElements.querySelector('.form-group').style = ['display:none']
                    break;


                default:
                    console.log('default');
                    break
            }
        }
    </script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('about_uz');
        CKEDITOR.replace('about_ru');
        CKEDITOR.replace('about_en');
        CKEDITOR.instances.about_uz.on('blur', function() {
            deactivateInput('uzAbout')
        });
        CKEDITOR.instances.about_ru.on('blur', function() {
            deactivateInput('ruAbout')
        });
        CKEDITOR.instances.about_en.on('blur', function() {
            deactivateInput('enAbout')
        });
    </script>
    <script>
        map.on('click', function(e) {
            document.getElementById('lng').value = e.latlng.lng;
            document.getElementById('ltd').value = e.latlng.lat;
            // alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        });
    </script>

@endsection
