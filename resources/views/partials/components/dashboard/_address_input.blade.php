<a href="#" class="locations__info active">Location Info</a>
<a href="#" class="locations__info">Map</a>

<h2 class="location__address-title">Address uz</h2>
<div class="location-address">
    <div class="location__our-address">
        <i class="icon-location-pin"></i>
    </div>
    <input class="location__office-address" name="address_uz"
           placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor"
           value="{{$info->address_uz ?? ''}}"/>
</div>
<h2 class="location__address-title">Landmark Uz</h2>
<div class="location-address">
    <div class="location__our-address">
        <i class="icon-location-pin"></i>
    </div>
    <input class="location__office-address" name="landmark_uz"
           placeholder="Tashkent City Park. RC 'Boulevard'" value="{{$info->landmark_uz ?? ''}}"/>

</div>
<h2 class="location__address-title">Address ru</h2>
<div class="location-address">
    <div class="location__our-address">
        <i class="icon-location-pin"></i>
    </div>
    <input class="location__office-address" name="address_ru"
           placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor"
           value="{{$info->address_ru ?? ''}}"/>
</div>
<h2 class="location__address-title">Landmark Ru</h2>
<div class="location-address">
    <div class="location__our-address">
        <i class="icon-location-pin"></i>
    </div>
    <input class="location__office-address" name="landmark_ru"
           placeholder="Tashkent City Park. RC 'Boulevard'" value="{{$info->landmark_ru ?? ''}}"/>

</div>
<h2 class="location__address-title">Address en</h2>
<div class="location-address">
    <div class="location__our-address">
        <i class="icon-location-pin"></i>
    </div>
    <input class="location__office-address" name="address_en"
           placeholder="38а, st. Aybek, Shaykhontokhur district, BC Avalon, 1st floor"
           value="{{$info->address_en ?? ''}}"/>
</div>

<h2 class="location__address-title">Landmark en</h2>
<div class="location-address">
    <div class="location__our-address">
        <i class="icon-location-pin"></i>
    </div>
    <input class="location__office-address" name="landmark_en"
           placeholder="Tashkent City Park. RC 'Boulevard'" value="{{$info->landmark_en ?? ''}}"/>

</div>


<div class="location__in-map">
    <h2 class="location__address-title">
        Mark your Office on the map
    </h2>
    <div id="map" class="map"></div>
</div>
<div class="save__infos">
    <button type="submit" class="saving">Save</button>
</div>
<input type="hidden" name="lng" id="lng" value="{{$info->lng ?? ''}}">
<input type="hidden" name="ltd" id="ltd" value="{{$info->ltd ?? ''}}">
<script src="{{asset('./assets/leaflet/leaflet.js')}}"></script>

<script>
    map.on('click', function (e) {
        document.getElementById('lng').value = e.latlng.lng;
        document.getElementById('ltd').value = e.latlng.lat;
        // alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
    });
</script>