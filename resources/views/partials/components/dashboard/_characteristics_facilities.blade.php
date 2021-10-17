<div class="b-nav">
<a href="#characteristicsTab" data-tab-char="characteristicsTab" class="b-nav-tab active characteristics__info active"
>Characteristics</a
>
<a href="#facilitiesTab" data-tab-char="facilitiesTab" class="b-nav-tab characteristics__info">Facilities</a>
</div>
<div id="characteristicsTab" class="b-tab active">
    <div class="characteristics-of-rooms">
        @foreach($characteristics as $characteristic)
            {{--        @dd($characteristic)--}}
            <div class="characteristic-of-room">
                <h2 class="pluses">{{$characteristic->name}}</h2>

                @if($characteristic->is_range)
                    <div class="characteristics">
                        <div class="icons-of-homes first">
                            <i class="icon-building"></i>
                        </div>
                        <input type="text" placeholder="16" name="{{$characteristic->name}}[]"/>
                        <div class="icons-of-homes">to</div>
                        <input type="text" name="{{$characteristic->name}}[]"/>
                    </div>
                @elseif($characteristic->type === 'string')
                    <div class="characteristics repairs">
                        <div class="icons-of-homes first">
                            <i class="icon-hummer"></i>
                        </div>
                        <select name="value_{{$characteristic->id}}" id="">
                            @foreach($characteristic->variants as $variant)
                                <option value="{{$variant}}">{{$variant}}</option>
                            @endforeach
                        </select>
                        <div class="icons-of-homes repair">
                            <i class="icon-right-arr"></i>
                        </div>
                    </div>
                @elseif($characteristic->type === 'boolean')
                    <div class="character">
                        <div class="parking"><i class="icon-parking"></i></div>

                        <div class="character2">
                            <i class="icon-car"></i>
                        </div>
                    </div>
                @elseif($characteristic->type === 'integer' && $characteristic->is_range)
                    <div class="character-year">
                        <div class="calendar" onclick="showDatepicker()">
                            <i class="icon-calendar"></i>
                        </div>
                        <div class="character2">
                            <span>2022</span>
                        </div>
                        <div id="datepicker" class="d-none"></div>
                    </div>
                @endif
            </div>

        @endforeach


    </div>
    <div class="save__infos">
        <button type="button" class="saving">Save</button>
    </div>
</div>

<div id="facilitiesTab" class="b-tab">
    <div class="facilites">
        <h2 class="choosing-facilit">Choose Facilities</h2>
        <div class="row">

            {{--        @dd($facilities)--}}
            @foreach($facilities as $facility)

                <div class="col-6">
                    <div class="characteristics repairs mb-4">
                        <div class="icons-of-homes first">
                            <img src="{{$facility->icon}}" alt="t">
                        </div>
                        <div class="character2">
                            <span>{{$facility->name}}</span>
                        </div>
                        <div class="icons-of-homes repair">
                            <label class="switch">
                                <input type="checkbox" name="{{$facility->id}}"/>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="save__infos">
            <button type="button" class="saving">Save</button>
        </div>
    </div>
</div>
