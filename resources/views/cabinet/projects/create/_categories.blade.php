<ul>
    @foreach($categories as $category)
        <li>
            <a href="{{ route('cabinet.projects.create.region', $category) }}">{{ $category->name }}</a>
            @include('cabinet.projects.create._categories', ['categories' => $category->children])
        </li>
    @endforeach
</ul>