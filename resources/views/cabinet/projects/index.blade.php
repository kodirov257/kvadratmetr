@extends('layouts.developer.app')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-8">
                <form method="POST" action="{{route('cabinet.projects.store')}}" enctype="multipart/form-data">
                    @csrf
                    @include('cabinet.projects._project_body', ['status'=>'create'])
                </form>
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