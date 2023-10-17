<ul>
    @foreach($categories as $category)
    <li>
        <b>{{ $category->name }}</b>
        @if(count($category->allChildren))
        @include('_category', ['categories' => $category->allChildren])
        @endif
    </li>
    @endforeach
</ul>