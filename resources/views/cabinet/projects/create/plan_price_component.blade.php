<div id="plan" class="b-tab">
    <div class="room__numbers">
        <div class="room-numbers disabled" id="1room" onclick="roomActivate('1-room')">
            <h3>1-room</h3>
        </div>
        <div class="room-numbers active" id="2room" onclick="roomActivate('2-room')">
            <h3>2-room</h3>
        </div>
        <div class="room-numbers" id="3room" onclick="roomActivate('3-room')">
            <h3>3-room</h3>
        </div>
        <div class="room-numbers" id="4room" onclick="roomActivate('4-room')">
            <h3>4-room</h3>
        </div>
        <div class="room-numbers disabled" id="5room" onclick="roomActivate('5-room')">
            <h3>5-room</h3>
        </div>
        <div class="room-numbers disabled" id="6room" onclick="roomActivate('6-room')">
            <h3>6-room</h3>
        </div>
        <div class="room-numbers disabled" id="7room" onclick="roomActivate('7-room')">
            <h3>7-room</h3>
        </div>
        <div class="room-numbers disabled" id="8room" onclick="roomActivate('8-room')">
            <h3>8-room</h3>
        </div>
    </div>
    <div class="about-room-character">
        <h2 class="add-character">
            Add Room Characteristics (<span id="roomActiveNumber">2</span> - ROOM)
        </h2>
        <div id="characteristicsContainer">


        </div>
        <button type="button" class="add-new-room" onclick="addNewRoom()">
            <i class="icon-plus"></i> Add New Room Configurations
        </button>
        <div class="save__infos">
            <button type="button" class="saving">Save</button>
        </div>
    </div>
</div>
<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script>
    function roomActivate(roomNumber) {
        let roomNewNumber = roomNumber.split('-')[0]

        document.getElementById('roomActiveNumber').innerHTML = roomNumber;
    }

    // handle submit and send ajax query
    function callAjaxOnSave(id) {

        let form = $('#characteristicsContainer').children()[id-1];

        let area, bathroom, price;

        console.log(form.find('input[name="area"]'))
    }


    //add new form with room characteristics html
    function addNewRoom() {
        let numberOfNewRooms = document.getElementById('characteristicsContainer').children.length;
        let newRoomInfoHtml = `
        <form class="formRoomCharacteristics">
<div class="room-characters">
                <div class="room-characteristic">
                    <div class="plan-character__first">
                        <h3 class="plan-title">Area</h3>
                        <div class="plan-character">
                            <div class="icon-div"><i class="icon-area"></i></div>
                            <input class="location__office-address" name="area"
                                   placeholder="3"
                            />
                        </div>
                    </div>
                    <div class="plan-character__second">
                        <h3 class="plan-title">Bathroom</h3>
                        <div class="plan-character">
                            <div class="icon-div"><i class="icon-water"></i></div>
                            <input class="location__office-address" name="bathroom"
                                   placeholder="3"
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
                                   placeholder="9 200 000"
                            />
                            <div class="price">
                                <h5>/ per sq.</h5>
                            </div>
                        </div>

                        <div class="save-edit">
                            <a class="button__save btn" onclick="callAjaxOnSave(${numberOfNewRooms + 1})">Save Parameters</a>
                            <button class="button__edit btn"><i class="icon-pencil"></i></button>
                        </div>
                    </div>
                </div>
                <div class="image-character">
                    <h3 class="plan-title">Image</h3>
                    <div class="image" id="imageContainerPlan">
                        <div class="image-of-projects" id="imagePlanPutterContainer">
                            <i class="icon-add-photo" id="imagePlanPutter" onclick="callNewInputPlan()"></i>
                            <input type="file" name="planImage" class="d-none" id="planImage">
                        </div>
                    </div>
                </div>
            </div>

</form>

    `;

        document.getElementById('characteristicsContainer').innerHTML += newRoomInfoHtml;
    }

    const inputPlanImageElement = document.getElementById("planImage");
    inputPlanImageElement.addEventListener("change", uploadPlanImage, false)

    function uploadPlanImage() {
        console.log(this.files[0])
        document.getElementById('imageContainerPlan').innerHTML = `<img
                                src="${window.URL.createObjectURL(this.files[0])}"
                                alt=""
                                onclick="callIconInput()"
                                class="project-image"
                                style="width: 50px;height: 50px;"
                        />`;

        document.querySelector('#imagePlanPutterContainer').remove();
    }

</script>