<div class="card">
    <div class="developer-bar">
        <div class="developer-bar__image">
            <img src="{{asset('./assets/img/NRG-oybek-logo.svg')}}" alt=""/>
        </div>
        <div class="developer-bar__title" id="titleMain">{{$project->name ?? 'Developer Name here'}}</div>
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
        <a href="#plan" data-tab="plan" class="b-nav-tab"
        >Plan and Prices</a
        >
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
                <div class="col-4">
                    <div class="image-of-projects">
                        <img
                                src="{{asset('./assets/img/0caec11cdc98518be7e4b885b3aff1c6.png')}}"
                                alt=""
                                class="project-image"
                        />
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="image-of-projects" >
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
    <div id="plan" class="b-tab">
        <div class="room__numbers">
            <div class="room-numbers disabled">
                <h3>1-room</h3>
            </div>
            <div class="room-numbers active">
                <h3>2-room</h3>
            </div>
            <div class="room-numbers">
                <h3>3-room</h3>
            </div>
            <div class="room-numbers">
                <h3>4-room</h3>
            </div>
            <div class="room-numbers disabled">
                <h3>5-room</h3>
            </div>
            <div class="room-numbers disabled">
                <h3>6-room</h3>
            </div>
            <div class="room-numbers disabled">
                <h3>7-room</h3>
            </div>
            <div class="room-numbers disabled">
                <h3>8-room</h3>
            </div>
        </div>
        <div class="about-room-character">
            <h2 class="add-character">
                Add Room Characteristics (2 - ROOM)
            </h2>
            <div class="room-characters">
                <div class="room-characteristic">
                    <div class="plan-character__first">
                        <h3 class="plan-title">Area</h3>
                        <div class="plan-character">
                            <div class="icon-div"><i class="icon-area"></i></div>
                            <h4>80 m<sup>2</sup></h4>
                        </div>
                    </div>
                    <div class="plan-character__second">
                        <h3 class="plan-title">Bathroom</h3>
                        <div class="plan-character">
                            <div class="icon-div"><i class="icon-water"></i></div>
                            <h4>1</h4>
                        </div>
                    </div>
                    <div class="plan-character__third">
                        <h3 class="plan-title">Price</h3>
                        <div class="plan-character">
                            <div class="icon-div">
                                <i class="icon-calculator"></i>
                            </div>
                            <h4 class="minH">9 200 000</h4>
                            <div class="price">
                                <h5>/ per sq.</h5>
                            </div>
                        </div>

                        <div class="save-edit">
                            <button class="button__save btn">Save Parameters</button>
                            <button class="button__edit btn"><i class="icon-pencil"></i></button>
                        </div>
                    </div>
                </div>
                <div class="image-character">
                    <h3 class="plan-title">Image</h3>
                    <div class="image">
                        <img src="./assets/img/Сгруппировать 917.png" alt=""/>
                    </div>
                </div>
            </div>
            <button type="button" class="add-new-room">
                <i class="icon-plus"></i> Add New Room Configurations
            </button>
            <div class="save__infos">
                <button type="button" class="saving">Save</button>
            </div>
        </div>
    </div>
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

        putterContainer.outerHTML += (`<input type="file" name='images[${imageArray.length }]' class="d-none" id="imageNewInput" >  `)

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
</script>

