@foreach($categories as $category)
    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
@endforeach
