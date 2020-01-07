<ul class="nav justify-content-center">
    @foreach($categories as $category)
        <li class="nav-item">
            <a class="nav-link active" href="/{{ $category->slug }}">{{ $category->category_name }}</a>
        </li>
    @endforeach
</ul>
