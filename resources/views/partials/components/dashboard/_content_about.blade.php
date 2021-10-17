<div class="b-nav">
    <a href="#uzbek" data-tab-lang="uzbek" class="b-nav-tab active info__language-span">Uzbek</a>
    <a href="#russian" data-tab-lang="russian" class="b-nav-tab info__language-span">Russian</a>
    <a href="#english" data-tab-lang="english" class="b-nav-tab info__language-span">English</a>
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
                {!! $project->about_uz ?? '' !!}
            </div>
        </div>
        <div class="form-group" style="display: none">
            {!! Form::label('about_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
            {!! Form::textarea('about_uz', old('about_uz', isset($project) && $project->about_uz ? $project->about_uz : null),
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
                {!! $project->about_en ?? '' !!}
            </div>
        </div>
        <div class="form-group" style="display: none">
            {!! Form::label('about_en', 'About', ['class' => 'col-form-label']); !!}
            {!! Form::textarea('about_en', old('about_en', isset($project) &&  $project ? $project->about_en : null),
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
                {!! $project->about_ru ?? '' !!}
            </div>
        </div>
        <div class="form-group" style="display: none">
            {!! Form::label('about_ru', 'Описание', ['class' => 'col-form-label']); !!}
            {!! Form::textarea('about_ru', old('about_ru', isset($project) && $project ? $project->about_ru : null),
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
<div class="save__infos">
    <button type="submit" class="saving">Save</button>
</div>
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
</script>

