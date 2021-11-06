@if(isset($mapInfo) && $mapInfo)
<div id="map" class="map"></div>
{{--@dd($project->ltd)--}}
<script src="{{asset('assets/user-front/assets/leaflet/leaflet.js')}}"></script>



<script>
    document.addEventListener("DOMContentLoaded", function (event) {

        var popup = L.popup().setLatLng({{$mapInfo->lng}},{{$mapInfo->ltd}}).setContent('{{$mapInfo->name}}').openOn(map);
    });
</script>
@endif