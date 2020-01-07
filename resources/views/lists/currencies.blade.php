@foreach($currencies as $currency)
    <option value="{{ $currency->id }}">{{ $currency->symbol }}</option>
@endforeach
