@extends('layouts.developer.app')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="developer-bar">
                        <div class="developer-bar__image">
                            <img src="assets/img/NRG-oybek-logo.svg" alt=""/>
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
                                    <input type="text" placeholder="16"/>
                                    <div class="icons-of-homes">to</div>
                                    <input type="text"/>
                                </div>
                            </div>
                            <div class="characteristic-of-room">
                                <h2 class="pluses">Area</h2>
                                <div class="characteristics">
                                    <div class="icons-of-homes first">
                                        <i class="icon-area"></i>
                                    </div>
                                    <input type="text" placeholder="47 m"/>
                                    <div class="icons-of-homes">to</div>
                                    <input type="text" placeholder="61m"/>
                                </div>
                            </div>
                            <div class="characteristic-of-room">
                                <h2 class="pluses">Rooms</h2>
                                <div class="characteristics">
                                    <div class="icons-of-homes first">
                                        <i class="icon-square"></i>
                                    </div>
                                    <input type="text" placeholder="1"/>
                                    <div class="icons-of-homes">to</div>
                                    <input type="text" placeholder="4"/>
                                </div>
                            </div>
                            <div class="characteristic-of-room">
                                <h2 class="pluses">Bathroom</h2>
                                <div class="characteristics">
                                    <div class="icons-of-homes first">
                                        <i class="icon-water"></i>
                                    </div>
                                    <input type="text" placeholder="1"/>
                                    <div class="icons-of-homes">to</div>
                                    <input type="text" placeholder="3"/>
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
                                        <div class="calendar" onclick="showDatepicker()">
                                            <i class="icon-calendar"></i>
                                        </div>
                                        <div class="character2">
                                            <span>2022</span>
                                        </div>
                                        <div id="datepicker" class="d-none"></div>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
                                                <input type="checkbox"/>
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
            </div>
            <div class="col-4">
                <div class="card view">
                    <div class="card-toolbar">
                        <div class="card-toolbar__title fs-18">NRG Group</div>
                        <div class="card-toolbar__text">
                            <img src="./assets/img/NRG-logo.svg" alt=""/>
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
    <script>
        function showDatepicker() {
            datePicker = document.getElementById('datepicker');
            if (datePicker.classList.contains('d-none')) {
                datePicker.classList.remove('d-none')
            } else {
                datePicker.classList.add('d-none')
            }
        }

        $("#datepicker").datepicker();
    </script>

@endsection