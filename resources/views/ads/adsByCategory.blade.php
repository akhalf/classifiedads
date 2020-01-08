@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($ads as $ad)
            @php
                $image_name = $ad->images->first();
                $image_name = $image_name['image'];
            @endphp
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card md-5 text-center">
                    <img class="card-img-top img-thumbnail" src="{{ $image_name ? '/storage/images/thumbs' . '/' . $image_name : '/app/storage/images/thumbs/default.png'}}"  alt="{{$image_name}}">
                    <div class="card-body">
                        <div><h6 class="card-title">{{$ad->title}}</h6></div>
                        <p class="card-text">{{$ad->price}}</p>
                        <a href="/ads/{{$ad->id}}/{{$ad->slug}}" class="btn btn-sm btn-outline-dark">التفاصيل</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
