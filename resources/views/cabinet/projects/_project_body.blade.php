<div class="card">
    <div class="developer-bar">
        <div class="developer-bar__image">
            <div id="logoImgContainer">
                @if(isset($project) && isset($project->logo))
                    <img src="{{$project->logoOriginal}}" alt="Logo Developer" onclick="callIconInput()" style="width: 50px;height: 50px;"/>
                @endif
            </div>
            <div class="{{isset($project->logo) && $project->logo ? '' : 'image-of-projects'}}" id="logoImgSelectorContainer"
                 style="height: 50px; display: {{isset($project->logo) && $project->logo ? 'none' : ''}}">
                @if(!isset($developer->logo))
                    <i class="icon-add-photo" id="logoImgPutter" onclick="callIconInput()"></i>
                @endif
                <input type="file" name="logo" class="d-none" id="logoInput">
            </div>
        </div>
        <div class="developer-bar__title" id="titleMain">{{$project->name ?? 'Project Name here'}}</div>
        <input type="hidden"
               name="name_en"
               id="titleInput"
               onblur="deactivateInput('title')"
               value="{{$project->name ?? ''}}">
        <a href="#" class="developer-bar__button" onclick="activateInput('title')"
        ><i class="icon-pencil"></i
            ></a>
    </div>
    <div class="b-nav">
        <a href="#info" data-tab="info" class="b-nav-tab active"
        >Info</a
        >
        <a href="#images" data-tab="images" class="b-nav-tab">Images</a>
        <a
                href="#characteristics"
                data-tab="characteristics"
                class="b-nav-tab"
        >Characteristics</a
        >
        @if($status !== 'create')
            <a href="#plan" data-tab="plan" class="b-nav-tab"
            >Plan and Prices</a
            >
        @endif
        <a href="#location" data-tab="location" class="b-nav-tab"
        >Location</a
        >
    </div>
    <div id="info" class="b-tab active">
        @include('partials.components.dashboard._content_about')
    </div>
    <div id="images" class="b-tab">
        <h2 class="project-images">Add project images</h2>
        <div class="row">

            <div id="project_images" class="row">
                @if(isset($project) && $project->photos)
                    @foreach($project->photos as $photo)
                        <div class="col-4">
                            <div class="image-of-projects">

                                <img
                                        src="{{$photo->fileOriginal}}"
                                        alt=""
                                        class="project-image"
                                />
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
            <div class="col-4">
                <div class="image-of-projects">
                    <i class="icon-add-photo" id="imageFilePutter" onclick="callNewInput()"></i>
                    <input type="file" name="images[0]" class="d-none" id="imageNewInput" multiple>
                </div>
            </div>
        </div>

        <div class="save__infos">
            <button type="button" class="saving">Save</button>
        </div>
    </div>
    <div id="characteristics" class="b-tab">
        {{--        @dd($project->values)--}}
        @if(isset($project) && $project->facilities && count($project->facilities) > 0)
            @include('partials.components.dashboard._characteristics_facilities',
            ['project_facilities'=>$project->facilities, 'project_characteristics'=> $project->values])
        @else
            @include('partials.components.dashboard._characteristics_facilities')
        @endif
    </div>
    @if($status !== 'create')
        @include('cabinet.projects.create.plan_price_component')
    @endif
    <div id="location" class="b-tab">
        @include('partials.components.dashboard._address_input', ['info'=>$project ?? []])
    </div>
    <input type="file" style="display: none" id="allImages" name="allImages[]" multiple>
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

    const inputElement = document.getElementById("imageNewInput");
    inputElement.addEventListener("change", uploadImage, false)

    let imageArray = [];
    let imagesArrayAll = [];

    function uploadImage() {
        console.log(this.files, this.files[0], 'testsetst')
        const fd = new FormData();
        console.log(this.files[imageArray.length], imageArray.length)
        imagesArrayAll.push(this.files[0])
        imageArray.push({order: imageArray.length + 1, imageUrl: window.URL.createObjectURL(this.files[0])});

        const putterContainer = document.getElementById("imageFilePutter")

        putterContainer.outerHTML += (`<input type="file" name='images[${imageArray.length}]' class="d-none" id="imageNewInput" >  `)

        console.log(fd.getAll('allImages[]'))
        const inputElementDelete = document.querySelector('input[name="images[' + (imageArray.length - 1) + ']"]')
        inputElementDelete.removeAttribute('id')
        const newEveryInput = document.getElementById("imageNewInput");
        newEveryInput.addEventListener("change", uploadImage, false)

        let imageContainer = document.getElementById('project_images');
        let imagesHtml = '';
        for (let i = 0; i < imageArray.length; i++) {
            imagesHtml += `
        <div class="col-4">
                    <div class="image-of-projects">
                        <img
                                src="${imageArray[i].imageUrl}"
                                alt=""
                                class="project-image"
                        />
                    </div>
                </div>

        `;
        }
        imageContainer.innerHTML = imagesHtml;
    }

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

