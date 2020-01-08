@extends('layouts.app')

@section('content')

    <div class="col-lg-8">
        <h2>تفضيلاتي :</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>التاريخ</th>
                    <th>عنوان الإعلان</th>
                    <th>السعر</th>
                    <th>صفحةالإعلان</th>
                </tr>
            </thead>
            <tbody>
                @foreach($favorites as $ad)
                    <tr>
                        <th>{{ $ad->pivot->created_ar }}</th>
                        <th>{{ $ad->title }}</th>
                        <th>{{ $ad->price }}</th>
                        <th>
                            <div class="btn-group" role="group">
                                <a class="btn-sm btn-primary" href="/ads/{{ $ad->id }}/{{ $ad->slug }}" role="button">عرض الإعلان</a>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
