@extends('layouts.developer.app')

@section('content')


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
                    <div id="location" class="b-tab">
                        <a href="#" class="locations__info active">Location Info</a>
                        <a href="#" class="locations__info">Map</a>

                        <h2 class="location__address-title">Address</h2>
                        <div class="location-address">
                            <div class="location__our-address">
                                <i class="icon-location-pin"></i>
                            </div>
                            <input class="location__office-address" placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor"/>
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