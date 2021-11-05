@if($plans)
    @foreach($plans as $plan)
        <div class="characteristic-panel mb-4 p-0">
            <div class="flex-div">
                <span>Area: <b>{{$plan->area}}</b> m<sup>2</sup></span>
                <span>Rooms: <b>{{$plan->rooms}}</b></span>
                <span>Bathrooms: <b>{{$plan->bathroom}}</b></span>
                <span>Price: <b>{{$plan->price}}</b> / sq.</span>
                <button class="btn calc-btn"><i class="icon-calculator"></i></button>
                <button class="btn calc-btn" onclick="showCharDetail('char-detail', 'charShowDetBtn')"><i
                            id="charShowDetBtn" class="icon-up"></i></button>
            </div>
            <div id="char-detail" class="char-detail d-none">
                <div class="row align-items-end mb-5">
                    <div class="col-9">
                        <p class="char-block-name mb-0">БЛОК №1</p>
{{--                        <p class="char-flat-name mb-0">КВАРТИРА С ДВУМЯ СПАЛЬНЯМИ</p>--}}
                    </div>
                    <div class="col-3">
                        <p class="char-place mb-0">{{$plan->area}} м<sup>2</sup></p>
                    </div>
                </div>
                <div class="char-image"><img src="{{$plan->image}}" alt="flat-img.jpg"></div>
            </div>
        </div>
    @endforeach
@endif