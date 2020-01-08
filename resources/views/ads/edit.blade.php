@extends('layouts.app')

@section('content')
    <div class="col-lg-8">
        <h2>تعديل الإعلان</h2>

        @include('alerts.success')

        <form method="POST" action="{{ route('ads.update', $ad->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="country_id">الدولة</label>
                <select id="country_id" class="form-control" name="country_id">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $ad->country_id == $country->id ? 'selected':''  }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">التصنيف</label>
                <select id="category_id" class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $ad->category_id == $category->id ? 'selected':''  }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">العنوان</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $ad->title) }}">
            </div>
            <div class="form-group">
                <label for="details">التفاصيل</label>
                <textarea class="form-control" type="text" id="details" name="details" rows="3">{{ old('details', $ad->details) }}</textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-7">
                        <label class="col-lg-3" for="price">السعر</label>
                        <input id="price" type="number" class="form-control" value="{{ old('price', $ad->price) }}" name="price" step="any">
                    </div>
                    <div class="col-lg-5">
                        <label for="currency">العملة</label>
                        <select class="form-control" id="currency" name="currency_id">
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}" {{ $ad->currency_id == $currency->id ? 'selected':''  }}>{{ $currency->symbol }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="images" >أضف الصور</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>
            <button type="submit" class="btn btn-primary">أضف الإعلان</button>

        </form>
    </div>
@endsection
