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