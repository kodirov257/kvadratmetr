@extends('layouts.front-app')

@section('breadcrumbs', '')

@section('content')
    <section class="developers-page">
        <div class="container">
            @include('clients.layout.breadcrumb')
            <h1 class="page-title text-align-left">Developers</h1>
            <div class="row dispresp">
                <div class="col-3">
                    <!-- AD -->
                    @include('clients.layout.place-for-ads-sidebar')
                    <!-- END AD -->
                    @include('clients.layout.small-project-card-sidebar')
                    @include('clients.layout.small-project-card-sidebar')
                    @include('clients.layout.small-project-card-sidebar')
                    @include('clients.layout.small-project-card-sidebar')
                </div>
                <div class="col-9">
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.pagination')
                </div>
            </div>
            <div class="row dispresp-sec">
                <div class="col-12">
                    <div class="developers-item">
                        <div class="developers-item__header">
                            <img src="./assets/img/ghlogo.jpg" alt="developers-logo" class="developers-item__logo">
                            <h5 class="developers-item__title">Golden House</h5>
                        </div>
                        <div class="developers-item__body">
                            <label for="" class="developers-item__label">Address:</label>
                            <p class="developers-item__desc mb-2">1, str. Osiyo, district Mirzo Ulugbek</p>
                            <label for="" class="developers-item__label">Landmark:</label>
                            <p class="developers-item__desc mb-4">Irrigation Institute,Darkhan. RC "Novomoskovskaya"</p>
                            <label for="" class="developers-item__label">Phone:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-2">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Call Center:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-4">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Website:</label>
                            <a href="https://gh.uz" class="developers-item__phone mb-2">https://gh.uz</a>
                            <label for="" class="developers-item__label">E-mail:</label>
                            <div class="developers-item__link">
                                <a href="mailto:info@gh.uz" class="developers-item__phone">info@gh.uz</a>
                                <div class="developers-item__social">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-telegram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                            </div>
                        </div>
                        <div class="developers-item__footer">
                            <button class="btn developers-item__btn">Developer page <i class="icon-right"></i></button>
                        </div>
                    </div>
                    <div class="developers-item">
                        <div class="developers-item__header">
                            <img src="./assets/img/ghlogo.jpg" alt="developers-logo" class="developers-item__logo">
                            <h5 class="developers-item__title">Golden House</h5>
                        </div>
                        <div class="developers-item__body">
                            <label for="" class="developers-item__label">Address:</label>
                            <p class="developers-item__desc mb-2">1, str. Osiyo, district Mirzo Ulugbek</p>
                            <label for="" class="developers-item__label">Landmark:</label>
                            <p class="developers-item__desc mb-4">Irrigation Institute,Darkhan. RC "Novomoskovskaya"</p>
                            <label for="" class="developers-item__label">Phone:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-2">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Call Center:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-4">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Website:</label>
                            <a href="https://gh.uz" class="developers-item__phone mb-2">https://gh.uz</a>
                            <label for="" class="developers-item__label">E-mail:</label>
                            <div class="developers-item__link">
                                <a href="mailto:info@gh.uz" class="developers-item__phone">info@gh.uz</a>
                                <div class="developers-item__social">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-telegram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                            </div>
                        </div>
                        <div class="developers-item__footer">
                            <button class="btn developers-item__btn">Developer page <i class="icon-right"></i></button>
                        </div>
                    </div>
                    <div class="developers-item">
                        <div class="developers-item__header">
                            <img src="./assets/img/ghlogo.jpg" alt="developers-logo" class="developers-item__logo">
                            <h5 class="developers-item__title">Golden House</h5>
                        </div>
                        <div class="developers-item__body">
                            <label for="" class="developers-item__label">Address:</label>
                            <p class="developers-item__desc mb-2">1, str. Osiyo, district Mirzo Ulugbek</p>
                            <label for="" class="developers-item__label">Landmark:</label>
                            <p class="developers-item__desc mb-4">Irrigation Institute,Darkhan. RC "Novomoskovskaya"</p>
                            <label for="" class="developers-item__label">Phone:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-2">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Call Center:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-4">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Website:</label>
                            <a href="https://gh.uz" class="developers-item__phone mb-2">https://gh.uz</a>
                            <label for="" class="developers-item__label">E-mail:</label>
                            <div class="developers-item__link">
                                <a href="mailto:info@gh.uz" class="developers-item__phone">info@gh.uz</a>
                                <div class="developers-item__social">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-telegram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                            </div>
                        </div>
                        <div class="developers-item__footer">
                            <button class="btn developers-item__btn">Developer page <i class="icon-right"></i></button>
                        </div>
                    </div>
                    <div class="ad p-0 mb-4">
                        <div class="ad-item mh-200">Place for AD</div>
                    </div>
                    <div class="developers-item">
                        <div class="developers-item__header">
                            <img src="./assets/img/ghlogo.jpg" alt="developers-logo" class="developers-item__logo">
                            <h5 class="developers-item__title">Golden House</h5>
                        </div>
                        <div class="developers-item__body">
                            <label for="" class="developers-item__label">Address:</label>
                            <p class="developers-item__desc mb-2">1, str. Osiyo, district Mirzo Ulugbek</p>
                            <label for="" class="developers-item__label">Landmark:</label>
                            <p class="developers-item__desc mb-4">Irrigation Institute,Darkhan. RC "Novomoskovskaya"</p>
                            <label for="" class="developers-item__label">Phone:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-2">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Call Center:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-4">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Website:</label>
                            <a href="https://gh.uz" class="developers-item__phone mb-2">https://gh.uz</a>
                            <label for="" class="developers-item__label">E-mail:</label>
                            <div class="developers-item__link">
                                <a href="mailto:info@gh.uz" class="developers-item__phone">info@gh.uz</a>
                                <div class="developers-item__social">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-telegram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                            </div>
                        </div>
                        <div class="developers-item__footer">
                            <button class="btn developers-item__btn">Developer page <i class="icon-right"></i></button>
                        </div>
                    </div>
                    <div class="developers-item">
                        <div class="developers-item__header">
                            <img src="./assets/img/ghlogo.jpg" alt="developers-logo" class="developers-item__logo">
                            <h5 class="developers-item__title">Golden House</h5>
                        </div>
                        <div class="developers-item__body">
                            <label for="" class="developers-item__label">Address:</label>
                            <p class="developers-item__desc mb-2">1, str. Osiyo, district Mirzo Ulugbek</p>
                            <label for="" class="developers-item__label">Landmark:</label>
                            <p class="developers-item__desc mb-4">Irrigation Institute,Darkhan. RC "Novomoskovskaya"</p>
                            <label for="" class="developers-item__label">Phone:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-2">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Call Center:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-4">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Website:</label>
                            <a href="https://gh.uz" class="developers-item__phone mb-2">https://gh.uz</a>
                            <label for="" class="developers-item__label">E-mail:</label>
                            <div class="developers-item__link">
                                <a href="mailto:info@gh.uz" class="developers-item__phone">info@gh.uz</a>
                                <div class="developers-item__social">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-telegram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                            </div>
                        </div>
                        <div class="developers-item__footer">
                            <button class="btn developers-item__btn">Developer page <i class="icon-right"></i></button>
                        </div>
                    </div>
                    <div class="developers-item">
                        <div class="developers-item__header">
                            <img src="./assets/img/ghlogo.jpg" alt="developers-logo" class="developers-item__logo">
                            <h5 class="developers-item__title">Golden House</h5>
                        </div>
                        <div class="developers-item__body">
                            <label for="" class="developers-item__label">Address:</label>
                            <p class="developers-item__desc mb-2">1, str. Osiyo, district Mirzo Ulugbek</p>
                            <label for="" class="developers-item__label">Landmark:</label>
                            <p class="developers-item__desc mb-4">Irrigation Institute,Darkhan. RC "Novomoskovskaya"</p>
                            <label for="" class="developers-item__label">Phone:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-2">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Call Center:</label>
                            <a href="tel:+998998089291" class="developers-item__phone mb-4">+998 (99) 808-92-91</a>
                            <label for="" class="developers-item__label">Website:</label>
                            <a href="https://gh.uz" class="developers-item__phone mb-2">https://gh.uz</a>
                            <label for="" class="developers-item__label">E-mail:</label>
                            <div class="developers-item__link">
                                <a href="mailto:info@gh.uz" class="developers-item__phone">info@gh.uz</a>
                                <div class="developers-item__social">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-telegram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                            </div>
                        </div>
                        <div class="developers-item__footer">
                            <button class="btn developers-item__btn">Developer page <i class="icon-right"></i></button>
                        </div>
                    </div>
                    <div class="pagination">
                        <button class="btn-left"><i class="icon-left"></i></button>
                        <div class="pagination-btns">
                            <button class="pagination-btn active">1</button>
                            <button class="pagination-btn">2</button>
                            <button class="pagination-btn">3</button>
                            <button class="pagination-btn">4</button>
                            <button class="pagination-btn">5</button>
                            <button class="pagination-btn">6</button>
                        </div>
                        <button class="btn-right"><i class="icon-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection