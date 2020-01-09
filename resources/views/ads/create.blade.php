@extends('layouts.app')

@section('content')
<div class="col-lg-8">
    <h2>ادخل تفاصيل الإعلان</h2>

    @include('alerts.success')
    @include('alerts.error')



    <form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="country_id">الدولة</label>
            <select id="country_id" class="form-control" name="country_id">
                @include('lists.countries')
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">التصنيف</label>
            <select id="category_id" class="form-control" name="category_id">
                @include('lists.categories')
            </select>
        </div>
        <div class="form-group">
            <label for="title">العنوان</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="details">التفاصيل</label>
            <textarea class="form-control" type="text" id="details" name="details" rows="3">{{ old('details') }}</textarea>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-7">
                    <label class="col-lg-3" for="price">السعر</label>
                    <input id="price" type="number" class="form-control" value="{{ old('price') }}" name="price" step="any">
                </div>
                <div class="col-lg-5">
                    <label for="currency">العملة</label>
                        <select class="form-control" id="currency" name="currency_id">
                            @include('lists.currencies')
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
