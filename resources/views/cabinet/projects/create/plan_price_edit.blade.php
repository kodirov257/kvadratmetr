@extends('layouts.developer.app')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <form class="room__numbers" action="{{route('cabinet.projects.planEdit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$room}}" name="room">
                        <input type="hidden" value="{{$project_id}}" name="project_id">
                        <input type="hidden" value="{{$plan->id}}" name="plan_id">

                        <button class="room-numbers active" id="1room">
                            <h3>{{$room}}-room</h3>
                        </button>
                        <div class="about-room-character">
                            <div class="room-characters">
                                <div class="room-characteristic">
                                    <div class="plan-character__first">
                                        <h3 class="plan-title">Area</h3>
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
                                            <button type="submit" class="button__save btn">Save
                                                Parameters
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-character">
                                    <h3 class="plan-title">Image</h3>
                                    <div class="image" id="imageContainerPlan">
                                        <div class="image-of-projects" id="imagePlanPutterContainer">
                                            <i class="icon-add-photo" id="imagePlanPutter"
                                               onclick="callNewInputPlan()"><img src="{{$plan->image}}" alt=""></i>
                                            <input type="file" name="planImage" class="d-none" id="planImage">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const inputPlanImageElement = document.getElementById("planImage");
        inputPlanImageElement.addEventListener("change", uploadPlanImage, false)

        function uploadPlanImage() {
            console.log(this.files[0])
            let image = this.files[0];
            document.getElementById('imagePlanPutter').innerHTML = `<img
                                src="${window.URL.createObjectURL(image)}"
                                alt=""
                                onclick="callIconInput()"
                                class="project-image"
                                style="width: 50px;height: 50px;"
                        />`;

            // document.querySelector('#imagePlanPutterContainer').remove();
        }
    </script>
@endsection