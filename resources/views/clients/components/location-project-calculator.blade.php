<h1 class="page-title text-align-left mb-2">Location</h1>
<div class="title-flex">
    <p class="subtitle mb-0"><i class="icon-map"></i>{{$project->address}}</p>
    <a class="share" href="#" onclick="copyUrl()"><i class="icon-share"></i><span>Share</span></a>
</div>
@include('clients.layout.map', ['mapInfo'=>$project])