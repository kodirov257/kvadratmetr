<section class="popular-items">
    <div class="container">
        <h1 class="page-title">The Most Popular Buildings</h1>
        <div class="popular-slider">
            @foreach($projects as $project)
                @include('clients.layout.project-card-main')
            @endforeach
        </div>
    </div>
</section>