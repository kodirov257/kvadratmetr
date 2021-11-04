<div class="card">
    <div class="developer-bar">
        <div class="developer-bar__image">
            <div id="logoImgContainer">

            @if(isset($developer) && isset($developer->logo))
                <img src="{{$developer->logoOriginal}}" alt="Logo Developer" onclick="callIconInput()" style="width: 50px;height: 50px;"/>
            @endif
            </div>
            <div class="{{isset($developer->logo) && $developer->logo ? '' : 'image-of-projects'}}" id="logoImgSelectorContainer"
                 style="height: 50px; display: {{isset($developer->logo) && $developer->logo ? 'none' : ''}}">
                @if(!isset($developer->logo))
                <i class="icon-add-photo" id="logoImgPutter" onclick="callIconInput()"></i>
                @endif
                <input type="file" name="logo" class="d-none" id="logoInput">
            </div>
        </div>
        {{--        @dd($developer);--}}
        <div class="developer-bar__title" id="titleMain">{{$developer->name ?? 'Developer Name here'}}</div>
        <input type="hidden"
               name="name_en"
               id="titleInput"
               onblur="deactivateInput('title')"
               value="{{$developer->name ?? ''}}">
        <a href="#" class="developer-bar__button" onclick="activateInput('title')"
        ><i class="icon-pencil"></i
            ></a>
    </div>
    <div class="b-nav">
        <a href="#projects" data-tab="projects" class="b-nav-tab active"
        >Projects</a
        >
        <a href="#info" data-tab="info" class="b-nav-tab">Info</a>
        <a href="#contacts" data-tab="contacts" class="b-nav-tab"
        >Contacts</a
        >
        <a href="#location" data-tab="location" class="b-nav-tab"
        >Location</a
        >
    </div>
    <div id="projects" class="b-tab active">
        <div class="row">
            @if($developer)
                @foreach ($developer->projects as $project)
                    @include('partials.components.dashboard._project_card')
                @endforeach
                @include('partials.components.dashboard._create_new_project_card')
            @endif
        </div>
        <div class="save__infos">
            <button type="submit" class="saving">Save</button>
        </div>
    </div>
    <div id="info" class="b-tab">
        <div class="b-nav">
            <a href="#uzbek" data-tab-lang="uzbek" class="info__language-span">Uzbek</a>
            <a href="#russian" data-tab-lang="russian" class="info__language-span">Russian</a>
            <a href="#english" data-tab-lang="english" class="info__language-span">English</a>
        </div>
        <div id="uzbek" class="b-tab active info__about-uzbek">
            <h1 class="info__about">About Project Uzbek</h1>
            <div class="info__about-buildings">
                <div class="info__about-text">
                    <div class="info__bar">
                        <h1 class="info__text-main">
                            New building in Tashkent Oybek
                        </h1>
                        <a href="#" class="developer-bar__button" onclick="activateInput('uzAbout')"
                        ><i class="icon-pencil"></i
                            ></a>
                    </div>
                    <div class="info__text">
                        {!! $developer->about_uz ?? '' !!}
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
        <div id="english" class="b-tab info__about-english">
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
                        {!! $developer->about_en ?? '' !!}
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
        <div id="russian" class="b-tab info__about-russian">
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
                        {!! $developer->about_ru ?? '' !!}
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
    <div id="contacts" class="b-tab">
        <div class="b-nav">
            <a href="#contactsTab" data-tab-social="contactsTab" class="contacts__info active">Contact Info</a>
            <a href="#socialsTab" data-tab-social="socialsTab" class="contacts__info">Social Network Accounts</a>
        </div>
        <div id="contactsTab" class="b-tab active">
            <div class="contact__accounting">
                <div class="contact__address">
                    <h2 class="contact__social-sets">Phone Number (Manager)</h2>
                    <div class="contact__social-address">
                        <div class="social__phone">
                            <i class="icon-phone"></i>
                        </div>
                        <input class="social__phone-number" value="{{$developer->main_number ?? ''}}"
                               name="main_number"/>
                    </div>
                </div>
                <div class="contact__address">
                    <h2 class="contact__social-sets">Website</h2>
                    <div class="contact__social-address">
                        <div class="social__phone"><i class="icon-site"></i></div>
                        <input class="social__phone-number" value="{{$developer->website ?? ''}}" name="website"/>
                    </div>
                </div>
                <div class="contact__address">
                    <h2 class="contact__social-sets">Call-Center (HOT)</h2>
                    <div class="contact__social-address">
                        <div class="social__phone">
                            <i class="icon-phone"></i>
                        </div>
                        <input class="social__phone-number" value="{{$developer->call_center ?? ''}}"
                               name="call_center"/>
                    </div>
                </div>
                <div class="contact__address">
                    <h2 class="contact__social-sets">Email</h2>
                    <div class="contact__social-address">
                        <div class="social__phone">
                            <i class="icon-mail-dog"></i>
                        </div>
                        <input class="social__phone-number" value="{{$developer->email ?? ''}}" name="email"/>
                    </div>
                </div>
            </div>
        </div>
        <div id="socialsTab" class="b-tab active">
            <div class="contact__accounting">
                <div class="contact__address">
                    <h2 class="contact__social-sets">Facebook</h2>
                    <div class="contact__social-address">
                        <div class="social__phone">
                            <i class="icon-facebook"></i>
                        </div>
                        <input class="social__phone-number" value="{{$developer->facebook ?? ''}}" name="facebook"/>
                    </div>
                </div>
                <div class="contact__address">
                    <h2 class="contact__social-sets">Instagram</h2>
                    <div class="contact__social-address">
                        <div class="social__phone">
                            <i class="icon-instagram"></i>
                        </div>
                        <input class="social__phone-number" value="{{$developer->instagram ?? ''}}" name="instagram"/>
                    </div>
                </div>
                <div class="contact__address">
                    <h2 class="contact__social-sets">Tik-Tok</h2>
                    <div class="contact__social-address">
                        <div class="social__phone">
                            <i class="icon-tiktok"></i>
                        </div>
                        <input class="social__phone-number" value="{{$developer->tik_tok ?? ''}}" name="tik_tok"/>
                    </div>
                </div>
                <div class="contact__address">
                    <h2 class="contact__social-sets">Telegram</h2>
                    <div class="contact__social-address">
                        <div class="social__phone">
                            <i class="icon-telegram"></i>
                        </div>
                        <input class="social__phone-number" value="{{$developer->telegram ?? ''}}" name="telegram"/>
                    </div>
                </div>
                <div class="contact__address">
                    <h2 class="contact__social-sets">Youtube</h2>
                    <div class="contact__social-address">
                        <div class="social__phone">
                            <i class="icon-youtube"></i>
                        </div>
                        <input class="social__phone-number" value="{{$developer->youtube ?? ''}}" name="youtube"/>
                    </div>
                </div>
                <div class="contact__address">
                    <h2 class="contact__social-sets">Twitter</h2>
                    <div class="contact__social-address">
                        <div class="social__phone">
                            <i class="icon-twitter"></i>
                        </div>
                        <input class="social__phone-number" value="{{$developer->twitter ?? ''}}" name="twitter"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="save__infos">
            <button type="submit" class="saving">Save</button>
        </div>
    </div>
    <div id="location" class="b-tab">
        @include('partials.components.dashboard._address_input', ['info'=>$developer])
    </div>


</div>

<script src="{{asset('./assets/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
        integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0=" crossorigin="anonymous"></script>
<script src="{{asset('./assets/js/main.js')}}"></script>
<script>
    function activateInput(type) {
        let childrenElements;
        switch (type) {
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

    function deactivateInput(type) {
        let childrenElements;
        switch (type) {
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
    CKEDITOR.instances.about_uz.on('blur', function () {
        deactivateInput('uzAbout')
    });
    CKEDITOR.instances.about_ru.on('blur', function () {
        deactivateInput('ruAbout')
    });
    CKEDITOR.instances.about_en.on('blur', function () {
        deactivateInput('enAbout')
    });

    const inputLogoElement = document.getElementById("logoInput");
    inputLogoElement.addEventListener("change", uploadIconImage, false)

    function uploadIconImage() {
        console.log(this.files[0])
        document.getElementById('logoImgContainer').innerHTML = `<img
                                src="${window.URL.createObjectURL(this.files[0])}"
                                alt=""
                                onclick="callIconInput()"
                                class="project-image"
                                style="width: 50px;height: 50px;"
                        />`;

        document.querySelector('#logoImgPutter').remove();
        document.querySelector('#logoImgSelectorContainer').style.display = 'none';
    }

</script>
