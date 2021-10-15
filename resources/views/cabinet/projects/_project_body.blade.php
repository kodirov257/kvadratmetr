<div class="card">
    <div class="developer-bar">
        <div class="developer-bar__image">
            <img src="{{asset('./assets/img/NRG-oybek-logo.svg')}}" alt=""/>
        </div>
        <div class="developer-bar__title">NRG Oybek</div>
        <a href="#" class="developer-bar__button"
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

            <div class="col-4">
                <div class="image-of-projects">
                    <img
                            src="{{asset('./assets/img/0caec11cdc98518be7e4b885b3aff1c6.png')}}"
                            alt=""
                            class="project-image"
                    />
                </div>
            </div>
            <div class="col-4">
                <div class="image-of-projects">
                    <i class="icon-add-photo" onclick="callNewInput()"></i>
                    <input type="file" class="d-none" id="imageNewInput">
                </div>
            </div>
        </div>

        <div class="save__infos">
            <button type="button" class="saving">Save</button>
        </div>
    </div>
    <div id="characteristics" class="b-tab">
        @include('partials.components.dashboard._characteristics_facilities')
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
        @include('partials.components.dashboard._address_input')
    </div>
</div>