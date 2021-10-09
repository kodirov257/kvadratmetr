@extends('layouts.developer.app')

@section('content')
{{--    'salom'--}}

    <div class="main-content">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="developer-bar">
                        <div class="developer-bar__image">
                            <img src="assets/img/NRG-oybek-logo.svg" alt="" />
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
                        <a href="#" class="info__language-span">Uzbek</a>
                        <a href="#" class="info__language-span">Russian</a>
                        <a href="#" class="info__language-span active">English</a>
                        <div class="info__about-english">
                            <h1 class="info__about">About Project</h1>
                            <div class="info__about-buildings">
                                <div class="info__about-text">
                                    <div class="info__bar">
                                        <h1 class="info__text-main">
                                            New building in Tashkent Oybek
                                        </h1>
                                        <a href="#" class="developer-bar__button"
                                        ><i class="icon-pencil"></i
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
                                <div class="save__infos">
                                    <button type="button" class="saving">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="info__about-english">
                            <h1 class="info__about">About Project</h1>
                            <div class="info__about-buildings">
                                <div class="info__about-text">
                                    <div class="info__bar">
                                        <h1 class="info__text-main">
                                            Новостройка в Ташкенте, Ойбек
                                        </h1>
                                        <a href="#" class="developer-bar__button"
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
                                <div class="save__infos">
                                    <button type="button" class="saving">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="images" class="b-tab">
                        <h2 class="project-images">Add project images</h2>
                        <div class="row">
                            <div class="col-4">
                                <div class="image-of-projects">
                                    <img
                                            src="./assets/img/53a198a4da48c57e6dfeb33ed82a7608.png"
                                            alt=""
                                            class="project-image"
                                    />
                                    <a href="#" class="project-card__edit"
                                    ><i class="icon-pencil"></i
                                        ></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="image-of-projects">
                                    <img
                                            src="./assets/img/771f1d8afd7448efc7f215135673b05b.png"
                                            alt=""
                                            class="project-image"
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="image-of-projects">
                                    <img
                                            src="./assets/img/0caec11cdc98518be7e4b885b3aff1c6.png"
                                            alt=""
                                            class="project-image"
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="image-of-projects">
                                    <i class="icon-add-photo"></i>
                                </div>
                            </div>
                        </div>

                        <div class="save__infos">
                            <button type="button" class="saving">Save</button>
                        </div>
                    </div>
                    <div id="characteristics" class="b-tab">
                        <a href="#" class="characteristics__info active"
                        >Characteristics</a
                        >
                        <a href="#" class="characteristics__info">Facilities</a>

                        <div class="characteristics-of-rooms">
                            <div class="characteristic-of-room">
                                <h2 class="pluses">Storeys (floor)</h2>
                                <div class="characteristics">
                                    <div class="icons-of-homes first">
                                        <i class="icon-building"></i>
                                    </div>
                                    <input type="text" placeholder="16" />
                                    <div class="icons-of-homes">to</div>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="characteristic-of-room">
                                <h2 class="pluses">Area</h2>
                                <div class="characteristics">
                                    <div class="icons-of-homes first">
                                        <i class="icon-area"></i>
                                    </div>
                                    <input type="text" placeholder="47 m" />
                                    <div class="icons-of-homes">to</div>
                                    <input type="text" placeholder="61m" />
                                </div>
                            </div>
                            <div class="characteristic-of-room">
                                <h2 class="pluses">Rooms</h2>
                                <div class="characteristics">
                                    <div class="icons-of-homes first">
                                        <i class="icon-square"></i>
                                    </div>
                                    <input type="text" placeholder="1" />
                                    <div class="icons-of-homes">to</div>
                                    <input type="text" placeholder="4" />
                                </div>
                            </div>
                            <div class="characteristic-of-room">
                                <h2 class="pluses">Bathroom</h2>
                                <div class="characteristics">
                                    <div class="icons-of-homes first">
                                        <i class="icon-water"></i>
                                    </div>
                                    <input type="text" placeholder="1" />
                                    <div class="icons-of-homes">to</div>
                                    <input type="text" placeholder="3" />
                                </div>
                            </div>
                            <div class="characteristic-of-room">
                                <h2 class="pluses">Repaires</h2>
                                <div class="characteristics repairs">
                                    <div class="icons-of-homes first">
                                        <i class="icon-hummer"></i>
                                    </div>
                                    <select name="select" id="">
                                        <option value="1">Custom Repair</option>
                                    </select>
                                    <div class="icons-of-homes repair">
                                        <i class="icon-right-arr"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="room-pluses">
                                <div class="characteristic-room">
                                    <h2 class="pluses">Parking</h2>
                                    <div class="character">
                                        <div class="parking"><i class="icon-parking"></i></div>

                                        <div class="character2">
                                            <i class="icon-car"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="characteristics-room">
                                    <h2 class="pluses">Year built</h2>
                                    <div class="character-year">
                                        <div class="calendar">
                                            <i class="icon-calendar"></i>
                                        </div>

                                        <div class="character2">
                                            <span>2022</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="save__infos">
                            <button type="button" class="saving">Save</button>
                        </div>
                        <div class="facilites">
                            <h2 class="choosing-facilit">Choose Facilities</h2>
                            <div class="row">
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-elevator"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Elevator</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-wifi"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Wi-Fi</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox"/>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-panoramic-window"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Panoramic window</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-working"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Work Zone</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-bedroom"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Bedroom</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-restaurant"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Restaurant</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-buildings"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Terrace</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-marketing"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Supermarket</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-security"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Security</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-kindergarten"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Kindergarten</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-parking"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Parking</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="characteristics repairs mb-4">
                                        <div class="icons-of-homes first">
                                            <i class="icon-playground"></i>
                                        </div>
                                        <div class="character2">
                                            <span>Playground</span>
                                        </div>
                                        <div class="icons-of-homes repair">
                                            <label class="switch">
                                                <input type="checkbox" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="save__infos">
                                <button type="button" class="saving">Save</button>
                            </div>
                        </div>
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
                                        <img src="./assets/img/Сгруппировать 917.png" alt="" />
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
                        <a href="#" class="locations__info active">Location Info</a>
                        <a href="#" class="locations__info">Map</a>

                        <h2 class="location__address-title">Address</h2>
                        <div class="location-address">
                            <div class="location__our-address">
                                <i class="icon-location-pin"></i>
                            </div>
                            <h3 class="location__office-address">
                                38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st
                                floor
                            </h3>
                        </div>
                        <h2 class="location__address-title">Landmark</h2>
                        <div class="location-address">
                            <div class="location__our-address">
                                <i class="icon-location-pin"></i>
                            </div>
                            <h3 class="location__office-address">
                                Tashkent City Park. RC "Boulevard"
                            </h3>
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
                </div>
            </div>
            <div class="col-4">
                <div class="card view">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title fs-18">NRG Group</div>
                        <div class="card-toolbar__text">
                            <img src="./assets/img/NRG-logo.svg" alt="" />
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

@endsection