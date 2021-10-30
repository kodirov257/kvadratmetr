<div class="container">
    <div class="bradcrump">
        <a href="#">Main Page</a><i class="icon-right"></i>
        <a href="#">Developers</a><i class="icon-right"></i>
        <a href="#">NRG Group</a><i class="icon-right"></i>
        <a href="#" class="active">NRG Oybek</a>
    </div>
    <div class="title-flex">
        <div class="title-informations">
            <h1 class="page-title text-align-left m-bottom-15">{{$project->title}}</h1>
            <p class="subtitle"><i class="icon-map"></i>{{$project->address}}</p>
        </div>

        <div class="price-information">
            @if(isset($project->price))
                <p class="meter">sq. meter<span>from</span></p>
                <span class="summa-price">{{$project->price}}</span>
            @endif
            <a class="share" href="#" onclick="copyUrl()"><i class="icon-share"></i><span>Share</span></a>
        </div>

    </div>
</div>
<script>
    function copyUrl() {
        var inputc = document.body.appendChild(document.createElement("input"));
        inputc.value = window.location.href;
        inputc.focus();
        inputc.select();
        document.execCommand('copy');
        inputc.parentNode.removeChild(inputc);
        alert("URL Copied.");
    }

</script>