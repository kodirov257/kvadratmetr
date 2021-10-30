<div class="container">
    <div class="row">
        <div class="col-8">
            @if(isset($project->photos) && count($project->photos) > 0)
                <img src="{{$project->photos[0]->fileOriginal}}" alt="domtut-image" class="images-page-img">
            @endif
        </div>
        <div class="col-4">
            @if(isset($project->photos) && count($project->photos) > 1)
                <img src="{{$project->photos[1]->fileOriginal}}" alt="domtut-image" class="images-page-img mini">
            @endif
            @if(isset($project->photos) && count($project->photos) > 2)
                <img src="{{$project->photos[2]->fileOriginal}}" alt="domtut-image" class="images-page-img mini mb-0">
                <button class="btn image-detail-btn"><i class="icon-picture"></i>View all images</button>
            @endif
        </div>
    </div>
</div>