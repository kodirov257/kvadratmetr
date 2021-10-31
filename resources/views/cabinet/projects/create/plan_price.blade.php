@extends('layouts.developer.app')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    @php($roomNumber = explode(',', request('roomNumber')))
                    <form class="room__numbers" action="{{route('cabinet.projects.planPrice', $project->id)}}">
{{--                        @dd($roomNumber)--}}
                        <button class="room-numbers {{$roomNumber[0] == 1 ? 'active' : ''}}" id="1room" type="submit" onclick="submitFunction('1')">
                            <h3>1-room</h3>
                        </button>
                        <button class="room-numbers {{$roomNumber[0] == 2 || $roomNumber[0] == ''  ? 'active' : ''}}" id="2room" type="submit" onclick="submitFunction('2')">
                            <h3>2-room</h3>
                        </button>
                        <button class="room-numbers {{$roomNumber[0] == 3 ? 'active' : ''}}" id="3room" type="submit" onclick="submitFunction('3')">
                            <h3>3-room</h3>
                        </button>
                        <button class="room-numbers {{$roomNumber[0] == 4 ? 'active' : ''}}" id="4room" type="submit" onclick="submitFunction('4')">
                            <h3>4-room</h3>
                        </button>
                        <button class="room-numbers {{$roomNumber[0] == 5 ? 'active' : ''}}" id="5room" type="submit" onclick="submitFunction('5')">
                            <h3>5-room</h3>
                        </button>
                        <button class="room-numbers {{$roomNumber[0] == 6 ? 'active' : ''}}" id="6room" type="submit" onclick="submitFunction('6')">
                            <h3>6-room</h3>
                        </button>
                        <button class="room-numbers {{$roomNumber[0] == 7 ? 'active' : ''}}" id="7room" type="submit" onclick="submitFunction('7')">
                            <h3>7-room</h3>
                        </button>
                        <button class="room-numbers {{$roomNumber[0] == 8 ? 'active' : ''}}" id="8room" type="submit" onclick="submitFunction('8')">
                            <h3>8-room</h3>
                        </button>
                        <input type="hidden" name="roomNumber" id="roomNumber"/>
                    </form>
                    <div class="about-room-character">
                        <h2 class="add-character">
                            Add Room Characteristics ({{$roomNumber[0]}} - ROOM)
                        </h2>
                        @foreach($plans as $plan)
                        <div class="room-characters">
                            <div class="room-characteristic">
                                <div class="plan-character__first">
                                    <h3 class="plan-title">Area in m<sup>2</sup></h3>
                                    <div class="plan-character">
                                        <div class="icon-div"><i class="icon-area"></i></div>
                                        <input class="location__office-address" name="area"
                                               placeholder="3" value="{{$plan->area}}"
                                        />
                                    </div>
                                </div>
                                <div class="plan-character__second">
                                    <h3 class="plan-title">Bathroom</h3>
                                    <div class="plan-character">
                                        <div class="icon-div"><i class="icon-water"></i></div>
                                        <input class="location__office-address" name="bathroom"
                                               placeholder="3" value="{{$plan->bathroom}}"
                                        />
                                    </div>
                                </div>
                                <div class="plan-character__third">
                                    <h3 class="plan-title">Price</h3>
                                    <div class="plan-character">
                                        <div class="icon-div">
                                            <i class="icon-calculator"></i>
                                        </div>
                                        <input class="location__office-address" name="price"
                                               placeholder="9 200 000" value="{{$plan->price}}"
                                        />
                                        <div class="price">
                                            <h5>/ per sq.</h5>
                                        </div>
                                    </div>

                                    <div class="save-edit">
                                        <a class="button__edit btn" href="{{route('cabinet.projects.planEdit', [$project->id, $roomNumber[0], $plan->id])}}"><i class="icon-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="image-character">
                                <h3 class="plan-title">Image</h3>
                                <div class="image" id="imageContainerPlan">
                                    <div class="image-of-projects" id="imagePlanPutterContainer">
                                        <i class="icon-add-photo" id="imagePlanPutter" onclick="callNewInputPlan()"><img src="{{$plan->image}}" /></i>
                                        <input type="file" name="planImage" class="d-none" id="planImage">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div style="padding: 20px 0;">
                            <a class="add-new-room" href="{{route('cabinet.projects.planAdd', [$project->id, $roomNumber[0]])}}">
                                <i class="icon-plus"></i> Add New Room Configurations
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        {{--            @include('partials.components.dashboard._sidebar_info_developer')--}}
    </div>
    </div>
    <script>
        function submitFunction(number) {
            document.getElementById('roomNumber').value = number;

        }

    </script>


@endsection