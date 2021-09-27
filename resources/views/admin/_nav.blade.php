<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link{{ $page === '' ? ' active' : '' }}" href="{{ route('admin.home') }}">Dashboard</a></li>
    @can ('manage-projects')
        <li class="nav-item"><a class="nav-link{{ $page === 'projects' ? ' active' : '' }}" href="{{ route('admin.projects.projects.index') }}">Projects</a></li>
    @endcan
    @can ('manage-banners')
        <li class="nav-item"><a class="nav-link{{ $page === 'banners' ? ' active' : '' }}" href="{{ route('admin.banners.index') }}">Banners</a></li>
    @endcan
    @can ('manage-regions')
        <li class="nav-item"><a class="nav-link{{ $page === 'regions' ? ' active' : '' }}" href="{{ route('admin.regions.index') }}">Regions</a></li>
    @endcan
    @can ('manage-projects-categories')
        <li class="nav-item"><a class="nav-link{{ $page === 'projects_categories' ? ' active' : '' }}" href="{{ route('admin.categories.index') }}">Categories</a></li>
    @endcan
    @can ('manage-pages')
        <li class="nav-item"><a class="nav-link{{ $page === 'pages' ? ' active' : '' }}" href="{{ route('admin.pages.index') }}">Pages</a></li>
    @endcan
    @can ('manage-users')
        <li class="nav-item"><a class="nav-link{{ $page === 'users' ? ' active' : '' }}" href="{{ route('admin.users.index') }}">Users</a></li>
    @endcan
    @can ('manage-tickets')
        <li class="nav-item"><a class="nav-link{{ $page === 'tickets' ? ' active' : '' }}" href="{{ route('admin.tickets.index') }}">Tickets</a></li>
    @endcan
</ul>