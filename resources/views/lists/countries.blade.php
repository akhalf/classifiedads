@foreach($countries as $country)
    <option value="{{ $country->id }}">{{ $country->name }}</option>
@endforeach
