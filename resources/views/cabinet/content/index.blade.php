@extends('layouts.developer.app')

@section('content')
    <div class="main-content">
        <div class="row home-row">
            <div class="col-8">
                <div class="card">
                    <div class="developer-bar">
                        <div class="developer-bar__image">
                            <img src="{{asset('assets/img/NRG-logo.svg')}}" alt=""/>
                        </div>
                        <div class="developer-bar__title"></div>
                        <a href="#" class="developer-bar__button"
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
                            @if(isset($projects) && count($projects) > 0)
                                <div class="col-4">
                                    <div class="project-card">
                                        <div class="project-card__image">
                                            <img
                                                    src="assets/img/53a198a4da48c57e6dfeb33ed82a7608.jpg"
                                                    alt=""
                                            />
                                            <a href="#" class="project-card__edit"
                                            ><i class="icon-pencil"></i
                                                ></a>
                                            <span
                                                    class="project-card__type project-card__type_active"
                                            >Active</span
                                            >
                                        </div>
                                        <div class="project-card__title">NRG Oybek</div>
                                        <div class="project-card__details">
                                            <p class="project-card__detail">
                          <span><i class="icon-building"></i>Storeys:</span
                          ><b>16</b> floor
                                            </p>
                                            <p class="project-card__detail">
                          <span><i class="icon-area"></i>Area:</span
                          ><b>16</b> m<sup>2</sup> to <b>16</b> m<sup>2</sup>
                                            </p>
                                            <p class="project-card__detail">
                                                <span><i class="icon-square"></i>Rooms:</span>from
                                                <b>16</b> to <b>16</b>
                                            </p>
                                            <p class="project-card__detail">
                                                <span><i class="icon-hummer"></i>Repairs:</span>with
                                                <b>repair</b>
                                            </p>
                                            <p class="project-card__detail">
                          <span><i class="icon-parking"></i>Parking:</span
                          >private <b>Parking</b>
                                            </p>
                                        </div>
                                        <div class="project-card__footer">
                                            Status: <span class="text">Active</span>
                                            <label class="switch">
                                                <input type="checkbox" checked/>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="project-card">
                                        <div class="project-card__image">
                                            <img src="assets/img/photo.jpg" alt=""/>
                                            <span class="project-card__type">Deactive</span>
                                        </div>
                                        <div class="project-card__title">NRG Mirzo Ulugbek</div>
                                        <div class="project-card__details">
                                            <p class="project-card__detail">
                          <span><i class="icon-building"></i>Storeys:</span
                          ><b>16</b> floor
                                            </p>
                                            <p class="project-card__detail">
                          <span><i class="icon-area"></i>Area:</span
                          ><b>16</b> m<sup>2</sup> to <b>16</b> m<sup>2</sup>
                                            </p>
                                            <p class="project-card__detail">
                                                <span><i class="icon-square"></i>Rooms:</span>from
                                                <b>16</b> to <b>16</b>
                                            </p>
                                            <p class="project-card__detail">
                                                <span><i class="icon-hummer"></i>Repairs:</span>with
                                                <b>repair</b>
                                            </p>
                                            <p class="project-card__detail">
                          <span><i class="icon-parking"></i>Parking:</span
                          >private <b>Parking</b>
                                            </p>
                                        </div>
                                        <div class="project-card__footer">
                                            Status: <span class="text deactive">Deactive</span>
                                            <label class="switch">
                                                <input type="checkbox"/>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-4 adding-new-projects">
                                <i class="icon-plus adding"></i>
                                <h2 class="new-project">Add Project</h2>
                                <p class="new-project__title">
                                    Construction companies can add their own Newly Built
                                    Projects
                                </p>
                                <a href="{{ route('cabinet.projects.create') }}" class="adding-new-project">
                                    New Project
                                </a>

                                {{--                                <button type="button" class="adding-new-project">--}}
                                {{--                                </button>--}}
                            </div>
                        </div>
                        <div class="save__infos">
                            <button type="button" class="saving">Save</button>
                        </div>
                    </div>
                    <div id="info" class="b-tab">
                        <a href="#" class="info__language-span">Uzbek</a>
                        <a href="#" class="info__language-span">Russian</a>
                        <a href="#" class="info__language-span active">English</a>
                        <div class="info__about-english">
                            <h1 class="info__about">About Company</h1>
                            <div class="info__about-buildings">
                                <div class="info__about-text">
                                    <div class="info__bar">
                                        <h1 class="info__text-main">
                                            Developer Tashkent - NRG Group
                                        </h1>
                                        <a href="#" class="developer-bar__button"
                                        ><i class="icon-pencil"></i
                                            ></a>
                                    </div>
                                    <p class="info__text">
                                        The new generation developer Dream City Development is
                                        engaged in the construction of modern residential
                                        complexes in Uzbekistan. The company's goals: to become
                                        a leader in the real estate market and to modernize the
                                        architectural appearance of the country.
                                    </p>
                                    <h1 class="info__text-main">
                                        Apartments in the residential complex NRG
                                    </h1>
                                    <p class="info__text">
                                        At the moment, the company is building 2 objects on the
                                        territory of the international business center Tashkent
                                        City - Boulevard and Gardens Residence. Boulevard is
                                        seven houses with 1167 business class apartments. The
                                        infrastructure here is thought out to the smallest
                                        detail: underground parking, shopping avenue on the
                                        ground floors, and Tashkent City park is just a couple
                                        of minutes away. Every detail has been thought out for
                                        maximum carefree living. Gardens Residence has been
                                        designed and built with all the requirements of
                                        international safety standards, taking into account the
                                        long service life and impressive appearance. This is a
                                        landscaped area of ​​more than 10,000 m2 with
                                        comfortable houses, artificial ponds, green gardens, a
                                        health center, a kindergarten, a parking lot, 24-hour
                                        security and many other elements of an innovative
                                        residential complex.
                                    </p>
                                </div>
                                <div class="save__infos">
                                    <button type="button" class="saving">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="contacts" class="b-tab">
                        <a href="#" class="contacts__info active">Contact Info</a>
                        <a href="#" class="contacts__info">Social Network Accounts</a>
                        <div class="contact__accounting">
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Phone Number (Manager)</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone">
                                        <i class="icon-phone"></i>
                                    </div>
                                    <h3 class="social__phone-number">+998 (97) 740-23-99</h3>
                                </div>
                            </div>
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Website</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone"><i class="icon-site"></i></div>
                                    <h3 class="social__phone-number">
                                        https://www.u-nrg.uz/
                                    </h3>
                                </div>
                            </div>
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Call-Center (HOT)</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone">
                                        <i class="icon-phone"></i>
                                    </div>
                                    <h3 class="social__phone-number">1060</h3>
                                </div>
                            </div>
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Website</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone">
                                        <i class="icon-mail-dog"></i>
                                    </div>
                                    <h3 class="social__phone-number">info@u-nrg.uz</h3>
                                </div>
                            </div>
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Facebook</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone">
                                        <i class="icon-facebook"></i>
                                    </div>
                                    <h3 class="social__phone-number">nrggroup</h3>
                                </div>
                            </div>
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Instagram</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone">
                                        <i class="icon-instagram"></i>
                                    </div>
                                    <h3 class="social__phone-number">nrgdeveloper</h3>
                                </div>
                            </div>
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Tik-Tok</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone">
                                        <i class="icon-tiktok"></i>
                                    </div>
                                    <h3 class="social__phone-number">nrgtiktok</h3>
                                </div>
                            </div>
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Telegram</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone">
                                        <i class="icon-telegram"></i>
                                    </div>
                                    <h3 class="social__phone-number">unrguz</h3>
                                </div>
                            </div>
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Youtube</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone">
                                        <i class="icon-youtube"></i>
                                    </div>
                                    <h3 class="social__phone-number"></h3>
                                </div>
                            </div>
                            <div class="contact__address">
                                <h2 class="contact__social-sets">Twitter</h2>
                                <div class="contact__social-address">
                                    <div class="social__phone">
                                        <i class="icon-twitter"></i>
                                    </div>
                                    <h3 class="social__phone-number"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="save__infos">
                            <button type="button" class="saving">Save</button>
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
                <div class="card">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title fs-18">Insights</div>
                        <div class="card-toolbar__text">Last 7 days</div>
                    </div>
                    <div class="insights-single">
                        <div class="insights-single__item_first">
                            <div class="insights-single__item_first__name">
                                Impressions
                            </div>
                            <div class="insights-single__item_first__number">94 788</div>
                        </div>
                        <div class="insights-single__item_second">
                            <div class="insights-single__item_second__percent">
                                <i class="icon-diagram-arrow-up"></i>4.1%
                            </div>
                            <div class="insights-single__item_second__subtext">
                                Up from Last Week
                            </div>
                        </div>
                    </div>
                    <div class="insights-double">
                        <div class="insights-double__item__first">
                            <div class="insights-single__item_first__name">Clicks</div>
                            <div class="insights-single__item_first__number">15 791</div>
                            <div class="insights-single__item_second__percent mb-0">
                                <i class="icon-diagram-arrow-up"></i>8.2%
                            </div>
                        </div>
                        <div class="insights-double__item__second">
                            <div class="insights-single__item_first__name">Leads</div>
                            <div class="insights-single__item_first__number">625</div>
                            <div class="insights-single__item_second__percent mb-0 red">
                                <i class="icon-diagram-arrow-down"></i>10.8%
                            </div>
                        </div>
                    </div>
                    <div class="insights__link">
                        <a href="#"
                        ><i class="icon-diagram-arrow-up"></i
                            ><span>Go to Insights</span></a
                        >
                    </div>
                </div>
                <div class="card">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title fs-18">Platinum Plan</div>
                        <div class="card-toolbar__text">Until 20.12.2021</div>
                    </div>
                    <button class="platinum__button__btn">Upgrade Plan</button>
                    <div class="insights__link">
                        <a href="#"
                        ><i class="icon-check-circle"></i><span>Go to Pricing & Plans</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection