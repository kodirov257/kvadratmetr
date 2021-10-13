@extends('layouts.developer.app')

@section('content')


    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="POST" action="{{route('cabinet.developer.store')}}">
{{--                        {{ csrf_field() }}--}}

                        @csrf
                        <div class="developer-bar">
                            <div class="developer-bar__image">
                                <img src="{{asset('assets/img/NRG-oybek-logo.svg')}}" alt=""/>
                            </div>
                            <div class="developer-bar__title" id="titleMain">Name</div>
                            <input type="hidden" name="name_en" id="titleInput" onblur="deactivateInput('title')">
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
                                        <p class="info__text">
                                            The Oybek residential complex is a project of a new
                                            company NRG, which was created by the developer Murad
                                            Buildings and the Kazakhstani BI Group. The complex will
                                            consist of several 12 and 16-storey buildings with 9
                                            entrances. The occupied area will be 1.8 hectares. The
                                            project is planned to be commissioned in 2021. The
                                            architecture of the buildings combines comfort and
                                            beauty. Natural granite, decorative HPL panels, stained
                                            glass are used for decoration. The buildings will
                                            introduce a “smart home” system and other innovative
                                            solutions. This will be a business-class housing that
                                            will make everyday processes as comfortable and positive
                                            as possible.А
                                        </p>
                                        <h1 class="info__text-main">
                                            Apartments in the residential complex Oybek
                                        </h1>
                                        <p class="info__text">
                                            The new building presents different layouts of
                                            apartments with the number of rooms from 1 to 4 and
                                            areas from 48 to 133 sq.m. they will be equipped with
                                            the Smart Home system, which will allow you to control
                                            your home from a distance. In March 2020, the start of
                                            sales was announced. You can find out detailed
                                            information by phone or by leaving a message on the
                                            website.
                                        </p>
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
                                        <p class="info__text">
                                            Жилой комплекс «Ойбек» - проект новой компании NRG,
                                            которую создали девелопер Murad Buildings и
                                            казахстанская BI Group. Комплекс будет состоять из
                                            нескольких 12-ти и 16-ти этажных корпусов с 9
                                            подъездами. Занимаемая площадь составит 1,8 га.
                                            Планируется, что объект будет сдан в эксплуатацию в 2021
                                            году. Архитектура зданий сочетает в себе комфорт и
                                            красоту. В отделке использован натуральный гранит,
                                            декоративные панели HPL, витражи. В зданиях будет
                                            внедрена система «умный дом» и другие инновационные
                                            решения. Это будет жилье бизнес-класса, которое сделает
                                            повседневные процессы максимально комфортными и
                                            позитивными.
                                        </p>
                                        <h1 class="info__text-main">
                                            Квартиры в Жилой Комплексе Ойбек
                                        </h1>
                                        <p class="info__text">
                                            В новостройке представлены квартиры различной планировки
                                            с количеством комнат от 1 до 4 и площадью от 48 до 133
                                            кв.м. они будут оснащены системой «Умный дом», которая
                                            позволит вам управлять своим домом на расстоянии. В
                                            марте 2020 года был объявлен старт продаж. Подробную
                                            информацию вы можете узнать по телефону или оставив
                                            сообщение на сайте.
                                        </p>
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
                                        <p class="info__text">
                                            Жилой комплекс «Ойбек» - проект новой компании NRG,
                                            которую создали девелопер Murad Buildings и
                                            казахстанская BI Group. Комплекс будет состоять из
                                            нескольких 12-ти и 16-ти этажных корпусов с 9
                                            подъездами. Занимаемая площадь составит 1,8 га.
                                            Планируется, что объект будет сдан в эксплуатацию в 2021
                                            году. Архитектура зданий сочетает в себе комфорт и
                                            красоту. В отделке использован натуральный гранит,
                                            декоративные панели HPL, витражи. В зданиях будет
                                            внедрена система «умный дом» и другие инновационные
                                            решения. Это будет жилье бизнес-класса, которое сделает
                                            повседневные процессы максимально комфортными и
                                            позитивными.
                                        </p>
                                        <h1 class="info__text-main">
                                            Квартиры в Жилой Комплексе Ойбек
                                        </h1>
                                        <p class="info__text">
                                            В новостройке представлены квартиры различной планировки
                                            с количеством комнат от 1 до 4 и площадью от 48 до 133
                                            кв.м. они будут оснащены системой «Умный дом», которая
                                            позволит вам управлять своим домом на расстоянии. В
                                            марте 2020 года был объявлен старт продаж. Подробную
                                            информацию вы можете узнать по телефону или оставив
                                            сообщение на сайте.
                                        </p>
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
                                       placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor"/>
                            </div>
                            <h2 class="location__address-title">Landmark Uz</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="landmark_uz"
                                       placeholder="Tashkent City Park. RC 'Boulevard'"/>

                            </div>
                            <h2 class="location__address-title">Address ru</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="address_ru"
                                       placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor"/>
                            </div>
                            <h2 class="location__address-title">Landmark Ru</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="landmark_ru"
                                       placeholder="Tashkent City Park. RC 'Boulevard'"/>

                            </div>
                            <h2 class="location__address-title">Address en</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="address_en"
                                       placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor"/>
                            </div>

                            <h2 class="location__address-title">Landmark en</h2>
                            <div class="location-address">
                                <div class="location__our-address">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <input class="location__office-address" name="landmark_en"
                                       placeholder="Tashkent City Park. RC 'Boulevard'"/>

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

                        <input type="hidden" name="lng" id="lng">
                        <input type="hidden" name="ltd" id="ltd">
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="card view">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title fs-18">NRG Group</div>
                        <div class="card-toolbar__text">
                            <img src="./assets/img/NRG-logo.svg" alt=""/>
                        </div>
                    </div>
                    <div class="card-toolbar-address">
                        <i class="icon-location-pin"></i>
                        <h3 class="toolbar-address__location">
                            38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor
                        </h3>
                    </div>
                    <div class="card-toolbar-connecting">
                        <i class="icon-phone"></i>
                        <a href="tel:+998781507779">+998 (78) 150-77-79</a>
                    </div>
                    <div class="card-toolbar-connecting">
                        <i class="icon-phone"></i>
                        <a href="tel:+998781507779">1006</a>
                    </div>
                    <div class="card-toolbar-internet">
                        <i class="icon-site"></i>
                        <a href="https://www.u-nrg.uz/">https://www.u-nrg.uz/</a>
                    </div>
                    <div class="card-toolbar-mail">
                        <i class="icon-mail-dog"></i>
                        <a href="mailto:info@u-nrg.uz">info@u-nrg.uz</a>
                    </div>
                    <div class="card__follow-us">
                        <h3 class="follow__title">Follow us:</h3>
                        <i class="icon-facebook-follow"></i>
                        <i class="icon-instagram"></i>
                    </div>
                    <div class="view-statics">
                        <button type="button" class="viewing">View Statics</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title fs-18">Standard Plan</div>
                        <div class="card-toolbar__text">Until 20.12.2021</div>
                    </div>
                    <div class="platinum__button">
                        <button class="platinum__button platinum__button__btn">
                            Upgrade Plan
                        </button>
                    </div>
                    <div class="insights__link">
                        <a href="#"
                        ><i class="icon-check-circle"></i
                            ><span>Go to Pricing & Plans</span></a
                        >
                    </div>
                </div>
            </div>
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
