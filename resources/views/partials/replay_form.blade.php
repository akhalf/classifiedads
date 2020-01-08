
<form method="post" action="{{ route('comment.replay') }}">
    @csrf
    <input type="hidden" name="ad_id" value="{{ $ad->id }}">
    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" name="content" class="form-control" placeholder="إضافة رد">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">رد</button>
            </div>
        </div>
    </div>
</form>
