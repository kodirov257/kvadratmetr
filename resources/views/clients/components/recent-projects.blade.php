<section class="latest-items">
    <div class="container">
        <h2 class="page-title">The Last Added Buildings</h2>
        <div class="latest-slider">
            @foreach($projects as $project)
                @include('clients.layout.project-card-main')
            @endforeach
        </div>
    </div>
</section>