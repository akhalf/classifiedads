<ul class="comment-container">
    @foreach($replies as $replay)
        <li>
            <div class="card bg-light">
                <div class="card-header">
                    <strong></strong>
                </div>
                <div class="card-body">
                    {{ $replay->content }}
                </div>
                @include('partials.replies', ['replies' => $replay->replies])
            </div>
        </li>
    @endforeach
</ul>
