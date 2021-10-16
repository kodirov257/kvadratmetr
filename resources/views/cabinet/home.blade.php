@extends('layouts.developer.app')

@section('content')
    <div class="main-content">
        <div class="main-title" id="goodDay">
            <h1 class="main-title__name">Good Day, <span>{{$name->name}}</span>!</h1>
            <div class="main-title__progress"><div class="main-title__progress-bar"></div></div>
        </div>
        <div class="row home-row">
            <div class="col-8">
                <div class="card">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title">Top Apartments</div>
                        <select class="card-toolbar__select" id="appartment-select">
                            <option value="Impressions">Impressions</option>
                            <option value="Impressions-2">Impressions-2</option>
                        </select>
                    </div>
                    <div class="appartments">
                        <div class="appartment">
                            <div class="appartment__section">
                                <div class="appartment__name">1. <span>NRG Oybek /</span>4 room | Pan. Window</div>
                                <div class="appartment__number">43128</div>
                            </div>
                            <div class="appartment__percent">(16.3%)</div>
                        </div>
                        <div class="appartment">
                            <div class="appartment__section">
                                <div class="appartment__name">2. <span>NRG Oybek /</span>4 room | Pan. Window</div>
                                <div class="appartment__number">43128</div>
                            </div>
                            <div class="appartment__percent">(16.3%)</div>
                        </div>
                        <div class="appartment">
                            <div class="appartment__section">
                                <div class="appartment__name">3. <span>NRG Oybek /</span>4 room | Pan. Window</div>
                                <div class="appartment__number">43128</div>
                            </div>
                            <div class="appartment__percent">(16.3%)</div>
                        </div>
                        <div class="appartment">
                            <div class="appartment__section">
                                <div class="appartment__name">4. <span>NRG Oybek /</span>4 room | Pan. Window</div>
                                <div class="appartment__number">43128</div>
                            </div>
                            <div class="appartment__percent">(16.3%)</div>
                        </div>
                        <div class="appartment">
                            <div class="appartment__section">
                                <div class="appartment__name">5. <span>NRG Oybek /</span>4 room | Pan. Window</div>
                                <div class="appartment__number">43128</div>
                            </div>
                            <div class="appartment__percent">(16.3%)</div>
                        </div>
                        <div class="appartment">
                            <div class="appartment__section">
                                <div class="appartment__name">6. <span>NRG Oybek /</span>4 room | Pan. Window</div>
                                <div class="appartment__number">43128</div>
                            </div>
                            <div class="appartment__percent">(16.3%)</div>
                        </div>
                        <div class="appartments__footer"><a href="#">View More Appartments</a></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title">Top Projects</div>
                        <select class="card-toolbar__select" id="appartment-select">
                            <option value="Sales Rating">Sales Rating</option>
                            <option value="Sales Rating-2">Sales Rating-2</option>
                        </select>
                    </div>
                    <div class="project">
                        <div class="project__image"><img src="{{asset('assets/img/image-1.jpgu7mjy6hntgbdcx')}}" alt="item-photo"></div>
                        <div class="project__info">
                            <div class="project__title">
                                <h2>NRG Oybek</h2>
                                <button class="btn-next"><i class="icon-next"></i></button>
                            </div>
                            <div class="project__desc">
                                <p class="project__descriptions"><span><i class="icon-building"></i>Storeys:</span>16 floor</p>
                                <p class="project__descriptions"><span><i class="icon-area"></i>Area:</span>47 m<sup>2</sup> to 61 m<sup>2</sup></p>
                                <p class="project__descriptions"><span><i class="icon-square"></i>Rooms:</span>from 1 to 4</p>
                                <p class="project__descriptions"><span><i class="icon-hummer"></i>Repairs:</span>with Repair</p>
                                <p class="project__descriptions"><span><i class="icon-parking"></i>Parking:</span>private Parking</p>
                                <p class="project__descriptions"><span><i class="icon-location-pin"></i>Address:</span>Shaykhontokhur</p>
                            </div>
                        </div>
                    </div>
                    <div class="project">
                        <div class="project__image"><img src="{{asset('assets/img/image-1.jpg')}}" alt="item-photo"></div>
                        <div class="project__info">
                            <div class="project__title">
                                <h2>NRG Oybek</h2>
                                <button class="btn-next"><i class="icon-next"></i></button>
                            </div>
                            <div class="project__desc">
                                <p class="project__descriptions"><span><i class="icon-building"></i>Storeys:</span>16 floor</p>
                                <p class="project__descriptions"><span><i class="icon-area"></i>Area:</span>47 m<sup>2</sup> to 61 m<sup>2</sup></p>
                                <p class="project__descriptions"><span><i class="icon-square"></i>Rooms:</span>from 1 to 4</p>
                                <p class="project__descriptions"><span><i class="icon-hummer"></i>Repairs:</span>with Repair</p>
                                <p class="project__descriptions"><span><i class="icon-parking"></i>Parking:</span>private Parking</p>
                                <p class="project__descriptions"><span><i class="icon-location-pin"></i>Address:</span>Shaykhontokhur</p>
                            </div>
                        </div>
                    </div>
                    <div class="project">
                        <div class="project__image"><img src="{{asset('assets/img/image-1.jpg')}}" alt="item-photo"></div>
                        <div class="project__info">
                            <div class="project__title">
                                <h2>NRG Oybek</h2>
                                <button class="btn-next"><i class="icon-next"></i></button>
                            </div>
                            <div class="project__desc">
                                <p class="project__descriptions"><span><i class="icon-building"></i>Storeys:</span>16 floor</p>
                                <p class="project__descriptions"><span><i class="icon-area"></i>Area:</span>47 m<sup>2</sup> to 61 m<sup>2</sup></p>
                                <p class="project__descriptions"><span><i class="icon-square"></i>Rooms:</span>from 1 to 4</p>
                                <p class="project__descriptions"><span><i class="icon-hummer"></i>Repairs:</span>with Repair</p>
                                <p class="project__descriptions"><span><i class="icon-parking"></i>Parking:</span>private Parking</p>
                                <p class="project__descriptions"><span><i class="icon-location-pin"></i>Address:</span>Shaykhontokhur</p>
                            </div>
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
                            <div class="insights-single__item_first__name">Impressions</div>
                            <div class="insights-single__item_first__number">94 788</div>
                        </div>
                        <div class="insights-single__item_second">
                            <div class="insights-single__item_second__percent"><i class="icon-diagram-arrow-up"></i>4.1%</div>
                            <div class="insights-single__item_second__subtext">Up from Last Week</div>
                        </div>
                    </div>
                    <div class="insights-double">
                        <div class="insights-double__item__first">
                            <div class="insights-single__item_first__name">Clicks</div>
                            <div class="insights-single__item_first__number">15 791</div>
                            <div class="insights-single__item_second__percent mb-0"><i class="icon-diagram-arrow-up"></i>8.2%</div>
                        </div>
                        <div class="insights-double__item__second">
                            <div class="insights-single__item_first__name">Leads</div>
                            <div class="insights-single__item_first__number">625</div>
                            <div class="insights-single__item_second__percent mb-0 red"><i class="icon-diagram-arrow-down"></i>10.8%</div>
                        </div>
                    </div>
                    <div class="insights__link"><a href="#"><i class="icon-diagram-arrow-up"></i><span>Go to Insights</span></a></div>
                </div>
                <div class="card">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title fs-18">Platinum Plan</div>
                        <div class="card-toolbar__text">Until 20.12.2021</div>
                    </div>
                    <div class="platinum__text">But I must explain to you how all this mistaken idea of denouncing pleasure.</div>
                    <div class="platinum__button"><button class="platinum__button__btn">Upgrade Plan</button></div>
                    <div class="insights__link"><a href="#"><i class="icon-check-circle"></i><span>Go to Pricing & Plans</span></a></div>
                </div>
                <div class="card">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title fs-18">Lead Manager</div>
                    </div>
                    <div class="manager__info">Coming Soon . . .</div>
                    <div class="insights__link"><a href="#"><i class="icon-lead"></i><span>Go to Lead Manager</span></a></div>
                </div>
                <div class="card">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title fs-18">News Room</div>
                    </div>
                    <div class="news__photo"><img src="{{asset('assets/img/image-1.jpg')}}" alt="news photo"></div>
                    <div class="news__date">May 20, 2021</div>
                    <div class="news__info">KvadratMetr Reports 80% Revenue Growth in First Quarter as a Public Company</div>
                    <div class="news__subinfo">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you.</div>
                    <div class="insights__link"><a href="#"><i class="icon-news-letter"></i><span>Go to News Room</span></a></div>
                </div>
            </div>
        </div>
    </div>
@endsection